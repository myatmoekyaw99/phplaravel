<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub = DB::table('grade')->get();
        return view('subjects.create',compact('sub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = DB::table('subject')
            ->join('grade', 'grade.id', '=', 'subject.grade_id')
            ->select('subject.*', 'grade.name')
            ->get();
        return view('subjects.showsubjects',compact('sub'));
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
        ]);
        $name=$request->get('name');
        $gid=$request->get('select');
        DB::table('subject')->insert(
            ['subject_name' => $name , 'grade_id' => $gid]
        );
        return redirect('/subjects')->with('status','Successful Insert!');
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
        $s = DB::table('subject')->find($id);
        $sub = DB::table('grade')->get();
        //var_dump($name);
        //dd($s);
        //dd($sub);
        return view('/subjects/editsubjects',compact('s','sub'));
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
        ]);
        $name=$request->get('name');
        $gid=$request->get('select');
        DB::table('subject')->where('id', $id)
        ->update(
            ['subject_name' => $name , 'grade_id' => $gid]
        );
        return redirect('/subjects/create')->with('status','Successful Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('subject')->where('id', '=', $id)->delete();
        return redirect('subjects/create')->with('status','Successful delete!');
    }
}
