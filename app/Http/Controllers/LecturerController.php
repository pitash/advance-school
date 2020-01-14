<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\AcademicClass;
use App\AcademicSection;
use App\ManageStudent;
use Auth;

class LecturerController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }


  function index()
  {
    // $sections = AcademicSection::all();
    // $classes = AcademicClass::all();
    // $students = ManageStudent::all();
    // $teacher_info = Teacher::where('user_id', Auth::id())->first();
    return view('lecturer/view', compact('teacher_info','classes','sections','students'));
  }

  public function store(Request $request)
  {
    print_r($request->all());
  }
}
