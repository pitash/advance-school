<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentAttendanceRequest;
use Illuminate\Support\Facades\Input;
use Session;
use Auth;
use App\User;
use DB;

class StudentAttendanceController extends Controller
{
      /*------- Student Attendance Page --------*/
    public function index()
    {
        return view('attendance.manageAttendance');
    }
    /*------- Student Attendance Page Ends --------*/

    /*****************************************/

    /*------- Create Student Attendance Page --------*/
    public function create()
    {
    	$classes=DB::table('academic_classes')->where('status',1)->get();
        $sections=DB::table('academic_sections')->where('status',1)->get();
    	return view('attendance.createAttendance')
    	    ->with('classes',$classes)
            ->with('sections',$sections);
    }
    /*------- Create Student Attendance Page Ends --------*/

    /*****************************************/

    /*------- Get Student Page --------*/
    public function get_student()
    {
    	$class_id = Input::get('class_id');
    	$section_id = Input::get('section_id');
    	$date = Input::get('date');

// echo $class_id;

    	$students=DB::table('manage_students')->where('class_name',$class_id)->where('section',$section_id)->get();

// echo  $students;


      $teacher=DB::table('attendance_creates')->where('class_id',$class_id)->where('section_id',$section_id)->where('date',$date)->get()->count();

// echo  $teacher;

    	if($teacher>=1){
    		echo "Attendance Already Taken";
    	}else {
    		$data=array();
    		foreach ($students as $key => $value) {
    			$data['date']=$date;
    			$data['class_id']=$class_id;
    			$data['section_id']=$section_id;
    			$data['student_id']=$value->id;
    			$data['class_roll']=$value->class_roll;
    			$data['rfid_no']=$value->rfid_no;
    			$data['created_at']    = date('Y-m-d h:i:s');
    			DB::table('attendance_creates')->insert($data);
    		}
    		return view('attendance.ajaxStudent')
    		->with('students',$students)
    		->with('class_id',$class_id)
    		->with('section_id',$section_id)
    		// ->with('rfid_no',$rfid_no)
    		->with('date',$date);
    	}


    }






    public function get_att()
    {
        $class_id = Input::get('class_id');
        $section_id = Input::get('section_id');

// echo $section_id;

        $students=DB::table('manage_students')->where('class_name',$class_id)->where('section',$section_id)->get();
            return view('attendance.att')
            ->with('students',$students)
            ->with('class_id',$class_id)
            ->with('section_id',$section_id);

            // echo  $students;
        }










    /*------- Get Student Page Ends --------*/

    /*****************************************/

    /*---------- Present Student--------------*/
    public function present_student(){
    	$class_id = Input::get('class_id');
    	$section_id = Input::get('section_id');
    	$date = Input::get('date');
    	$id = Input::get('id');
    	$attendance=DB::table('attendance_creates')->where([['date','=',$date],['student_id','=',$id],['class_id','=',$class_id],['section_id','=',$section_id]])->get();
    	foreach ($attendance as $key => $value) {
    		$present_value=$value->present;
    	}
    	if ($present_value==0) {
    		DB::table('attendance_creates')->where([['date','=',$date],['student_id','=',$id],['class_id','=',$class_id],['section_id','=',$section_id]])->update(['present'=>1]);
    	}else {
    		DB::table('attendance_creates')->where([['date','=',$date],['student_id','=',$id],['class_id','=',$class_id],['section_id','=',$section_id]])->update(['present'=>0]);
    	}

    }


    /*---------- Present Student Ends--------------*/

 	/*****************************************/


        /*---------- Present all Student--------------*/
    public function present_all(){
        $class_id = Input::get('class_id');
        $section_id = Input::get('section_id');
        $date = Input::get('date');
        $attendance=DB::table('attendance_creates')->where([['date','=',$date],['class_id','=',$class_id],['section_id','=',$section_id]])->get();
        foreach ($attendance as $key => $value) {
            $present_value=$value->present;
        }
        if ($present_value==0) {
            DB::table('attendance_creates')->where([['date','=',$date],['class_id','=',$class_id],['section_id','=',$section_id]])->update(['present'=>1]);
        }else {
            DB::table('attendance_creates')->where([['date','=',$date],['class_id','=',$class_id],['section_id','=',$section_id]])->update(['present'=>0]);
        }

    }


    /*---------- Present all Student Ends--------------*/

    /*****************************************/

            /*---------- Late all Student--------------*/
    public function late_all(){
        $class_id = Input::get('class_id');
        $section_id = Input::get('section_id');
        $date = Input::get('date');
        $attendance=DB::table('attendance_creates')->where([['date','=',$date],['class_id','=',$class_id],['section_id','=',$section_id]])->get();
        foreach ($attendance as $key => $value) {
            $present_value=$value->late;
        }
        if ($present_value==0) {
            DB::table('attendance_creates')->where([['date','=',$date],['class_id','=',$class_id],['section_id','=',$section_id]])->update(['late'=>1]);
        }else {
            DB::table('attendance_creates')->where([['date','=',$date],['class_id','=',$class_id],['section_id','=',$section_id]])->update(['late'=>0]);
        }

    }


    /*---------- Late all Student Ends--------------*/

    /*****************************************/

    /*---------- Get Section --------------*/
    public function get_section(){
        $class_id = Input::get('id');
        $sections=DB::table('academic_sections')->where('class','=',$class_id)->get();
        foreach ($sections as $value) {
          echo '<option value="'.$value->section_id.'">'.$value->section.'</option>';
        }


    }


    /*---------- Get Section  Ends--------------*/

    /*****************************************/

 	    /*---------- Late Student--------------*/
    public function late_student(){
    	$class_id = Input::get('class_id');
    	$section_id = Input::get('section_id');
    	$date = Input::get('date');
    	$id = Input::get('id');
    	$attendance=DB::table('attendance_creates')->where([['date','=',$date],['student_id','=',$id],['class_id','=',$class_id],['section_id','=',$section_id]])->get();
    	foreach ($attendance as $key => $value) {
    		$present_value=$value->late;
    	}
    	if ($present_value==0) {
    		DB::table('attendance_creates')->where([['date','=',$date],['student_id','=',$id],['class_id','=',$class_id],['section_id','=',$section_id]])->update(['late'=>1]);
    	}else {
    		DB::table('attendance_creates')->where([['date','=',$date],['student_id','=',$id],['class_id','=',$class_id],['section_id','=',$section_id]])->update(['late'=>0]);
    	}

    }


    /*---------- Late Student Ends--------------*/

 /*****************************************/

    /*------- Store Student Attendance Page --------*/
    public function store(Request $request)
    {
    	// foreach ($request->present as $key => $value) {
    	// 	echo $key;
    	// }
    	// exit;
        try {
            $saveLocation = array();
            $saveLocation['location']         		= $request->location;
            $saveLocation['note'] 					= $request->note;
            $saveLocation['status']        			= $request->status;
            $saveLocation['created_at']   			= date('Y-m-d h:i:s');
            $saveLocation['fk_created_by'] 			= Session::get('user.id');

            $result = DB::table('locations')
                           ->insert($saveLocation);
            if($result){
                return redirect()->route('locations')->with('success', 'Location Saved
                        successfull...!');
            }else{
                return redirect()->route('locations')->with('error', 'Something Went Wrong...!');
            }

        } catch (\Exception $e) {
            $err_msg = \Lang::get($e->getMessage());
            return redirect()->route('create-location')->with('error', $err_msg);
        }

    }
    /*------- Store Student Attendance Page Ends --------*/

    /*****************************************/
}
