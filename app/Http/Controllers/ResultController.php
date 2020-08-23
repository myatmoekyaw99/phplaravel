<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stu = DB::table('student')->get();
        $exam = DB::table('exam')->get();
        $question = DB::table('question')
                        ->select('id as question_id','question_name')
                        ->get();
        $answer=DB::table('answer')->select('id as answer_id','answer_name','question_id')->get();
        return view('results.create',compact('stu','exam','question','answer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stu = DB::table('student')->get();
        $exam = DB::table('exam')->get();
        $question = DB::table('question')->get();
        $answer=DB::table('answer')->get();
        $result=DB::table('result')->get();
        return view('results.showresult',compact('stu','exam','question','answer','result')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student' => 'required',
            'exam' => 'required',
        ]);
        $student=$request->get('student');
        $exam=$request->get('exam');
        $result=$request->get('result');
        for($i=0;$i<count($result);$i++){

            $mark=0;
            $answer=DB::table('answer')->where('id',"=", $result[$i]['answer_id'])->first();
           $question= DB::table('question')->where('id',"=", $result[$i]['question_id'])->first();
            if($answer->status==1){
                $mark=$question->mark;
            }
            DB::table('result')->insert(
                ['student_id' => $student , 'exam_id' => $exam, 'question_id' => $result[$i]['question_id'],'answer_id' => $result[$i]['answer_id'], 'mark'=> $mark]
            );
        }
        return redirect('/results')->with('status','Successful Insert!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
