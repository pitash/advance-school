<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Notifications\TeacherAccountNotification;
use App\User;
use Auth;
use DB;
use Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeacherController extends Controller
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
      $teachers = Teacher::all();
      $user_infos = DB::table('users')->where('role_id', '2')->get();
      return view('teacher/view', compact('teachers','user_infos'));
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
        'teacher_name'=> 'required',
        'teacher_phone_no'=> 'required|unique:teachers,teacher_phone_no',
        'teacher_email_address'=> 'required|unique:teachers,teacher_email_address',
        'techer_nid'=> 'required|unique:teachers,techer_nid',
        'teacher_gender'=> 'required',
        'teacher_designation'=> 'required',
        'joining_date'=> 'required',
        'parmanent_address'=> 'required',
        'present_address'=> 'required',
      ]);

      $random_pass = str_random(6);

      $teacher_info = User::create([
        'name' => $request->teacher_name,
        'email' => $request->teacher_email_address,
        'password' => bcrypt($random_pass)
      ]);

      $idFormDB = Teacher::insertGetId([

        'user_id' => $teacher_info->id,
        'teacher_phone_no' => $request->teacher_phone_no,
        'teacher_gender' => $request->teacher_gender,
        'teacher_designation' => $request->teacher_designation,
        'joining_date' => $request->joining_date,
        'techer_nid' => $request->techer_nid,
        'parmanent_address' => $request->parmanent_address,
        'present_address' => $request->present_address,
        'added_by' => Auth::id(),
        'created_at' => Carbon::now()
      ]);
      if($request->hasFile('teacher_photo')){
        $path = $request->file('teacher_photo')->store('teacher_image');
       Teacher:: find($idFormDB)->update([
         "teacher_image" => $path
       ]);
       // return back();
      }
       Notification::route('mail', $request->teacher_email_address)
            ->notify(new TeacherAccountNotification($random_pass));
            return redirect()->route('teacher.index')
                            ->withstatus('Teacher Add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */

     // email
    public function edit($teacher_id)
    {
      $old_information = Teacher::findOrFail($teacher_id);
      return view('teacher/edit', compact('old_information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $teacher_id)
    {
      $request->validate([
        'teacher_gender'=> 'required',
        'teacher_designation'=> 'required',
      ]);
       Teacher::find($teacher_id)->update($request->all());

        return redirect()->route('teacher.index')
                        ->withstatus('Teacher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      {
        Teacher::where('id', $id)->delete();
        return redirect()->route('teacher.index')
                        ->withstatus('Group Deleted successfully');
      }
    }
}
