<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub = DB::table('question')->get();
        return view('answers.create',compact('sub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = DB::table('answer')
            ->join('question', 'question.id', '=', 'answer.question_id')
            ->select('answer.*', 'question.question_name')
            ->get();
        return view('answers.showanswer',compact('sub'));
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
            'name' => 'required',
            'stat' => 'required',
            'question' => 'required',
        ]);
        $name=$request->get('name');
        $stat=$request->get('stat');
        $question=$request->get('question');
        
        DB::table('answer')->insert(
            ['answer_name' => $name , 'status' => $stat, 'question_id' => $question]
        );
        return redirect('/answers')->with('status','Successful Insert!');
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
        $s = DB::table('attendence')->find($id);
        $stu = DB::table('student')->get();

        //var_dump($name);
        //dd($s);
        //dd($sub);
        return view('/answers/editanswer',compact('s','stu')); 
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
        $validatedData = $request->validate([
            'name' => 'required',
            'stat' => 'required',
            'question' => 'required',
        ]);
        $name=$request->get('name');
        $stat=$request->get('stat');
        $question=$request->get('question');
        
        DB::table('answer')->where('id', $id)
        ->update(
            ['answer_name' => $name , 'status' => $stat, 'question_id' => $question]
        );
        return redirect('/answers/create')->with('status','Successful Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('answer')->where('id', '=', $id)->delete();
        return redirect('answers/create')->with('status','Successful delete!');
    }
}
