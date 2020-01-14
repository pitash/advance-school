<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecturerr;
use App\Teacher;
use App\AcademicClass;
use App\AcademicSection;
use App\ManageStudent;
use Carbon\Carbon;
use Auth;

class LecturerrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
      $sections = AcademicSection::all();
      $classes = AcademicClass::all();
      $students = ManageStudent::all();
      $lecturerrs = Lecturerr::all();
      $teacher_info = Teacher::where('user_id', Auth::id())->first();
      return view('lecturer/view', compact('teacher_info','classes','sections','students','lecturerrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        Lecturerr::insert([
          'class_name' => $request->class_name,
          'student_name' => $request->student_name,
          'section_name' => $request->section_name,
          'fast_term' => $request->fast_term,
          'second_term' => $request->second_term,
          // 'added_by' => Auth::id(),
          'created_at' => Carbon::now(),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lecturerr  $lecturerr
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturerr $lecturerr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lecturerr  $lecturerr
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturerr $lecturerr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lecturerr  $lecturerr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturerr $lecturerr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lecturerr  $lecturerr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturerr $lecturerr)
    {
        //
    }
}
