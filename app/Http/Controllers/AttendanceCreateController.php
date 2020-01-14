<?php

namespace App\Http\Controllers;

use App\AttendanceCreate;
use Illuminate\Http\Request;

class AttendanceCreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('attendance.create');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AttendanceCreate  $attendanceCreate
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceCreate $attendanceCreate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AttendanceCreate  $attendanceCreate
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendanceCreate $attendanceCreate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AttendanceCreate  $attendanceCreate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttendanceCreate $attendanceCreate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AttendanceCreate  $attendanceCreate
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceCreate $attendanceCreate)
    {
        //
    }
}
