<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ManageStudent;
use App\AcademicClass;
use App\Guardian;
use Carbon\Carbon;
use Auth;
use DB;

class ManageStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $classes = AcademicClass::all();
      $students = DB::table('manage_students')
          ->join('guardians', 'manage_students.id', '=', 'guardians.id')
          ->select('manage_students.*', 'guardians.student_father_name')
          ->get();

      return view('managestudent/view', compact('students','classes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // print_r($request->all());

      $idFormDB = ManageStudent::insertGetId([
        // 'user_id' => $user_info->id,
        'student_name' => $request->student_name,
        'student_name' => $request->student_name,
        'dob' => $request->dob,
        'student_gender' => $request->student_gender,
        'blood_group' => $request->blood_group,
        'admission_date' => $request->admission_date,
        'student_phone_no' => $request->student_phone_no,
        'class_name' => $request->class_name,
        'group' => $request->group,
        'section' => $request->section,
        'class_roll' => $request->class_roll,
        'rfid_no' => $request->rfid_no,
        'religion' => $request->religion,
        'student_present_address' => $request->student_present_address,
        'student_parmanent_address' => $request->student_parmanent_address,
        // 'added_by' => Auth::id(),
        'created_at' => Carbon::now()
      ]);
      if($request->hasFile('student_photo')){
        $path = $request->file('student_photo')->store('student_image');
       ManageStudent:: find($idFormDB)->update([
         "student_image" => $path
       ]);
       // return back();
      }

      Guardian::insert([
        'student_father_name' => $request->student_father_name,
        'student_mother_name' => $request->student_mother_name,
        'guardian_phone_no' => $request->guardian_phone_no,
        'guardian_email' => $request->guardian_email,
        'guardian_nid_no' => $request->guardian_nid_no,
        'added_by' => Auth::id(),
        'created_at' => Carbon::now()
      ]);
     return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ManageStudent  $manageStudent
     * @return \Illuminate\Http\Response
     */
    public function show(ManageStudent $manageStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ManageStudent  $manageStudent
     * @return \Illuminate\Http\Response
     */
    public function edit($student_id)
    {
      $old_information = ManageStudent::findOrFail($student_id);
      return view('managestudent/edit', compact('old_information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ManageStudent  $manageStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManageStudent $manageStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ManageStudent  $manageStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManageStudent $manageStudent)
    {
        //
    }
}
