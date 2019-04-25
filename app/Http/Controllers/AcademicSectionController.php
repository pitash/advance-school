<?php

namespace App\Http\Controllers;

use App\AcademicSection;
use App\AcademicClass;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class AcademicSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $classes = AcademicClass::all();
          $sections = AcademicSection::all();
          return view('academic/section/view', compact('sections','classes'));
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
      $request->validate([
        'section_name'=> 'required|unique:academic_sections,section_name',
      ]);
      AcademicSection::insert([
        'section_name' => $request->section_name,
        'added_by' => Auth::id(),
        'created_at' => Carbon::now()
      ]);
      return back()->withpitash('Section Add Successfully !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AcademicSection  $academicSection
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicSection $academicSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AcademicSection  $academicSection
     * @return \Illuminate\Http\Response
     */
    public function edit($section_id)
    {
      $old_information = AcademicSection::findOrFail($section_id);
      return view('academic/section/edit', compact('old_information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AcademicSection  $academicSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $section_id)
    {
      $request->validate([
        'section_name'=> 'required|unique:academic_sections,section_name',
      ]);
       AcademicSection::find($section_id)->update($request->all());

        return redirect()->route('academicsection.index')
                        ->withstatus('Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AcademicSection  $academicSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicSection $academicSection)
    {
        //
    }
}
