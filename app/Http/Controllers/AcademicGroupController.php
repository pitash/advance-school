<?php

namespace App\Http\Controllers;

use App\AcademicGroup;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class AcademicGroupController extends Controller
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

        $groups = AcademicGroup::all();
        return view('academic/group/view', compact('groups'));
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
        'group_name'=> 'required|unique:academic_groups,group_name',
      ]);
      AcademicGroup::insert([
        'group_name' => $request->group_name,
        'added_by' => Auth::id(),
        'created_at' => Carbon::now()
      ]);
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AcademicGroup  $academicGroup
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicGroup $academicGroup)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AcademicGroup  $academicGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($group_id)
    {

      $old_information = AcademicGroup::findOrFail($group_id);
      return view('academic/group/edit', compact('old_information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AcademicGroup  $academicGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $group_id)
    {

      $request->validate([
        'group_name'=> 'required|unique:academic_groups,group_name',
      ]);
       AcademicGroup::find($group_id)->update($request->all());

        return redirect()->route('academicgroup.index')
                        ->withstatus('Group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AcademicGroup  $academicGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($group_id)
    {
      // AcademicGroup::where('id', "=", $group_id)->delete();
      // return back();
      // return redirect()->route('academicgroup.index')
      //                 ->withstatus('Group updated successfully');
      echo "string";
    }
}
