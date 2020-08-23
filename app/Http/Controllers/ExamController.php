<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub = DB::table('subject')->get();
        $gd = DB::table('grade')->get();
        return view('exams.create',compact('sub','gd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = DB::table('exam')
        ->join('subject', 'subject.id', '=','exam.subject_id')
        ->join('grade', 'grade.id', '=', 'exam.grade_id')
        ->select('exam.*', 'subject.subject_name as sname', 'grade.name as gname')
        ->get();
    return view('exams.showexam',compact('sub'));
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
            'select' => 'required',
            'mark' => 'required',
            'grade' => 'required',
        ]);
        $name=$request->get('name');
        $mark=$request->get('mark');
        $grade=$request->get('grade');
        $sid=$request->get('select');
        DB::table('exam')->insert(
            ['exam_name' => $name , 'total_mark' => $mark, 'subject_id' => $sid,'grade_id' => $grade]
        );
        return redirect('/exams')->with('status','Successful Insert!');
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
        $s = DB::table('exam')->find($id);
        $sub = DB::table('subject')->get();
        $gd = DB::table('grade')->get();

        //var_dump($name);
        //dd($s);
        //dd($sub);
        return view('/exams/editexam',compact('s','sub','gd')); 
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
            'select' => 'required',
            'mark' => 'required',
            'grade' => 'required',
        ]);
        $name=$request->get('name');
        $mark=$request->get('mark');
        $grade=$request->get('grade');
        $sid=$request->get('select');
        DB::table('exam')->where('id', $id)
        ->update(
            ['exam_name' => $name , 'total_mark' => $mark, 'subject_id' => $sid,'grade_id' => $grade]
        );
        return redirect('/exams/create')->with('status','Successful Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('exam')->where('id', '=', $id)->delete();
        return redirect('exams/create')->with('status','Successful delete!');
    }
}
