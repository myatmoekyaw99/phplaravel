<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = DB::table('student')
                        ->select('id as student_id','name')
                        ->get();
        return view('attendence.create',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = DB::table('attendence')
                ->join('student', 'student.id', '=', 'attendence.student_id')
                ->select('attendence.*', 'student.name')
                ->get();
        return view('attendence.showattendence',compact('sub'));
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
            'attend' => 'required',
            'd' => 'required',
        ]);
        $student=$request->get('attlist');
        $attend=$request->get('attend');
        $date=$request->get('d');

        for($i=0;$i<count($student);$i++){
            DB::table('attendence')->insert(
                ['student_id' => $student[$i]['student_id'],'student_attendence' => $attend , 'date'=> $date]
            );
        }
        return redirect('/attendence')->with('status','Successful Insert!');
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
        $sub = DB::table('attendence')->find($id);
        $s = DB::table('student')->get();
       // dd($sub);
        return view('/attendence/editattendence',compact('sub','s')); 
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
            'attend' => 'required',
            'd' => 'required',
        ]);
        $student=$request->get('attlist');
        $attend=$request->get('attend');
        $date=$request->get('d');
        $s=array();
        foreach($student as $key=>$value){
            $s=$value;
        }
         //dd($s);
           // echo($date);

            DB::table('attendence')->where('id',$id)
            ->update(
                ['student_id' => $s['student_id'],'student_attendence' => $attend , 'date'=> $date]
            );
        return redirect('/attendence/create')->with('status','Successful Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('attendence')->where('id', '=', $id)->delete();
        return redirect('attendence/create')->with('status','Successful delete!');
    }
}
