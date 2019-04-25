<?php

namespace App\Http\Controllers;

use App\AcademicSubject;
use App\AcademicClass;
use Auth;
use Illuminate\Http\Request;

class AcademicSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = AcademicClass::all();
        $subjects = AcademicSubject::paginate(3);
        return view('academic/subject/view', compact('classes','subjects'));
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
        foreach ($request->subject_name as $subject_name_single) {
          AcademicSubject::insert([

            'class_name' =>$request->class_name,
            'subject_name' =>$subject_name_single,
            'added_by' => Auth::id(),
          ]);
        }
        return back()->withpitash('Class Add Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AcademicSubject  $academicSubject
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicSubject $academicSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AcademicSubject  $academicSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicSubject $academicSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AcademicSubject  $academicSubject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicSubject $academicSubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AcademicSubject  $academicSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicSubject $academicSubject)
    {
        //
    }
}
