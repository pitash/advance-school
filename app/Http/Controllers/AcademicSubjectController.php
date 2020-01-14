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
     public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('checkroleid');
     }


    public function index()
    {
        // $old_information=DB::table('manage_students')->where('id',$student_id)->first();
        $classes = AcademicClass::all();
        $subjects = AcademicSubject::paginate(5);
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
    public function edit($subject_id)
    {
      $old_information = AcademicSubject::findOrFail($subject_id);
      return view('academic/subject/edit', compact('old_information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AcademicSubject  $academicSubject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subject_id)
    {
      $request->validate([
        // 'subject_name'=> 'required|unique:academic_subjects,subject_name',
      ]);
       AcademicSubject::find($subject_id)->update($request->all());

        return redirect()->route('academicsubject.index')
                        ->withstatus('Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AcademicSubject  $academicSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AcademicSubject::where('id',$id)->delete();
        return redirect()->route('academicsubject.index')
                        ->withstatus('Subject Deleted successfully');
    }
}
