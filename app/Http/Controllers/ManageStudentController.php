<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ManageStudent;
use App\academicsection;
use App\AcademicClass;
use App\academicgroup;
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
     public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('checkroleid');
     }

    public function index()
    {
      $sections = academicsection::all();
      $groups = academicgroup::all();
      $classes = AcademicClass::all();
      $students = DB::table('manage_students')
          ->join('guardians', 'manage_students.id', '=', 'guardians.std_id')
          ->join('academic_classes', 'manage_students.class_name', '=', 'academic_classes.id')
          ->join('academic_sections', 'manage_students.section', '=', 'academic_sections.id')
          ->join('academic_groups', 'manage_students.group', '=', 'academic_groups.id')
          ->select('manage_students.*', 'guardians.student_father_name','academic_sections.section_name','academic_classes.class_name')
          ->get();

      return view('managestudent/view', compact('students','classes','groups','sections'));

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
      $request->validate([
        'student_name'=> 'required',
        'dob'=> 'required',
        'student_gender'=> 'required',
        'blood_group'=> 'required',
        'admission_date'=> 'required',
        // 'student_phone_no'=> 'required|unique:manage_students,student_phone_no',
        'class_name'=> 'required',
        'group'=> 'required',
        'section'=> 'required',
        'class_roll'=> 'required|unique:manage_students,class_roll',
        'rfid_no'=> 'required|unique:manage_students,rfid_no',
        'religion'=> 'required',
        'student_present_address'=> 'required',
        'student_parmanent_address'=> 'required',
      ]);

      $idFromDB = ManageStudent::insertGetId([
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
        'created_at' => Carbon::now(),
      ]);

      if ($request->hasFile('student_photo'))
      {
        $path = $request->file('student_photo')->store('student_images');
        ManageStudent:: find($idFromDB)->update([
           "student_image" => $path
         ]);
         // return back();
      }

      Guardian::insert([
        'std_id' => $idFromDB,
        'student_father_name' => $request->student_father_name,
        'student_mother_name' => $request->student_mother_name,
        'guardian_phone_no' => $request->guardian_phone_no,
        'guardian_email' => $request->guardian_email,
        'guardian_nid_no' => $request->guardian_nid_no,
        'added_by' => Auth::id(),
        'created_at' => Carbon::now(),
      ]);
      return redirect()->route('managestudent.index')
                      ->withstatus('Student Add successfully');
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
      $groups = academicgroup::all();
      $classes = AcademicClass::all();
      $sections = academicsection::all();
      $old_information=DB::table('manage_students')->where('id',$student_id)->first();
      return view('managestudent.edit', compact('old_information','groups','classes','sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ManageStudent  $manageStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $request->validate([
        'student_photo'=> 'required',
        'dob'=> 'required',
        'student_gender'=> 'required',
        'blood_group'=> 'required',
        'admission_date'=> 'required',
        'student_phone_no'=> 'required',
        'class_name'=> 'required',
        'group'=> 'required',
        'section'=> 'required',
        'class_roll'=> 'required',
        'rfid_no'=> 'required',
        'religion'=> 'required',
        'student_present_address'=> 'required',
        'student_parmanent_address'=> 'required',
      ]);

       $student_id=$request->id;
       $data=array();

       $data['student_name']= $request->student_name;
       $data['dob']= $request->dob;
       $data['student_gender']= $request->student_gender;
       $data['blood_group']= $request->blood_group;
       $data['admission_date']= $request->admission_date;
       $data['student_phone_no']= $request->student_phone_no;
       $data['class_name']= $request->class_name;
       $data['group']= $request->group;
       $data['section']= $request->section;
       $data['class_roll']= $request->class_roll;
       $data['rfid_no']= $request->rfid_no;
       $data['religion']= $request->religion;
       $data['student_present_address']= $request->student_present_address;
       $data['student_parmanent_address']= $request->student_parmanent_address;

       if ($request->hasFile('student_photo'))
       {
         $path = $request->file('student_photo')->store('student_images');
         ManageStudent:: find($idFromDB)->update([
            "student_image" => $path
          ]);
          // return back();
       }

       DB::table('manage_students')->where('id',$student_id)->update($data);

       $father =array();
       $father['student_father_name']= $request->student_father_name;
       $father['student_mother_name']= $request->student_mother_name;
       $father['guardian_phone_no']= $request->guardian_phone_no;
       $father['guardian_email']= $request->guardian_email;
       $father['guardian_nid_no']= $request->guardian_nid_no;

       DB::table('guardians')->where('std_id',$student_id)->update($father);

       return redirect()->route('managestudent.index')
                       ->withstatus('Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ManageStudent  $manageStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      {
        {
          ManageStudent::where('id', $id)->delete();
          return redirect()->route('managestudent.index')
                          ->withstatus('Student Deleted successfully');
        }
      }
    }
}
