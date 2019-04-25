<?php

namespace App\Http\Controllers;

use App\AttendanceShow;
use Illuminate\Http\Request;

class AttendanceShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "show";
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
     * @param  \App\AttendanceShow  $attendanceShow
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceShow $attendanceShow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AttendanceShow  $attendanceShow
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendanceShow $attendanceShow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AttendanceShow  $attendanceShow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttendanceShow $attendanceShow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AttendanceShow  $attendanceShow
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceShow $attendanceShow)
    {
        //
    }
}
