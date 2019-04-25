<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AcademicClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = AcademicClass::with('getUserInfo')->paginate(4);
        return view('academic/class/view', compact('classes'));
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
        'class_name'=> 'required|unique:academic_classes,class_name',
      ]);
       AcademicClass::insert([
         'class_name' => $request->class_name,
         'added_by' => Auth::id(),
         'created_at' => Carbon::now()
       ]);
       return back()->withpitash('Class Add Successfully !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AcademicClass  $academicClass
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicClass $academicClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AcademicClass  $academicClass
     * @return \Illuminate\Http\Response
     */
    public function edit($class_id)
    {
      $old_information = AcademicClass::findOrFail($class_id);
      return view('academic/class/edit', compact('old_information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AcademicClass  $academicClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $class_id)
    {

      $request->validate([
        'class_name'=> 'required|unique:academic_classes,class_name',
      ]);
       AcademicClass::find($class_id)->update($request->all());

        return redirect()->route('academicclass.index')
                        ->withstatus('Class updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AcademicClass  $academicClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicClass $academicClass)
    {
        //
    }
}
