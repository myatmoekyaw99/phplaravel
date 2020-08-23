<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('questions.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = DB::table('question')
        ->select('question.*')
        ->get();
    return view('questions.showquestion',compact('sub'));
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
            'mark' => 'required',
        ]);
        $name=$request->get('name');
        $mark=$request->get('mark');
        DB::table('question')->insert(
            ['question_name' => $name , 'mark' => $mark]
        );
        return redirect('/questions')->with('status','Successful Insert!');
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
        $s = DB::table('question')->find($id);
        //var_dump($name);
        //dd($s);
        //dd($sub);
        return view('/questions/editquestion',compact('s')); 
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
            'mark' => 'required',
        ]);
        $name=$request->get('name');
        $mark=$request->get('mark');
        DB::table('question')->where('id', $id)
        ->update(
            ['question_name' => $name , 'mark' => $mark]
        );
        return redirect('/questions/create')->with('status','Successful Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('question')->where('id', '=', $id)->delete();
        return redirect('questions/create')->with('status','Successful delete!');
    }
}
