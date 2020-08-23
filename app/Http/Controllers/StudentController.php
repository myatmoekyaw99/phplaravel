<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub = DB::table('grade')->get();
        return view('students.create',compact('sub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = DB::table('student')
            ->join('grade', 'grade.id', '=', 'student.grade_id')
            ->select('student.*', 'grade.name as gname')
            ->get();
        return view('students.showstudent',compact('sub'));
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
            'rolno' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',

        ]);
        $name=$request->get('name');
        $roll=$request->get('rolno');
        $gender=$request->get('gender');
        $phone=$request->get('phone');
        $email=$request->get('email');
        $address=$request->get('address');
        $gid=$request->get('select');
        DB::table('student')->insert(
            ['name' => $name , 'rollno' => $roll,'gender' => $gender, 'phone' => $phone, 'email' => $email, 'address' => $address,'grade_id' => $gid]
        );
        return redirect('/students')->with('status','Successful Insert!');
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
        $s = DB::table('student')->find($id);
        $sub = DB::table('grade')->get();
        //var_dump($name);
        //dd($s);
        //dd($sub);
        return view('/students/editstudent',compact('s','sub'));
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
            'rolno' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $name=$request->get('name');
        $roll=$request->get('rolno');
        $gender=$request->get('gender');
        $phone=$request->get('phone');
        $email=$request->get('email');
        $address=$request->get('address');
        $gid=$request->get('select');
        DB::table('student')->where('id', $id)
        ->update(
            ['name' => $name ,  'rollno' => $roll,'gender' => $gender, 'phone' => $phone, 'email' => $email, 'address' => $address ,'grade_id' => $gid]
        );
        return redirect('/students/create')->with('status','Successful Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('student')->where('id', '=', $id)->delete();
        return redirect('students/create')->with('status','Successful delete!');
    }
}
