<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ManageStudent extends Model
{
  use softDeletes;
  protected $fillable = ['student_name','student_image','dob','student_gender','blood_group','admission_date','student_phone_no','class_name',
  'section','class_roll','rfid_no','religion','student_present_address','student_parmanent_address'];

  function getUserInfo()
  {
    return $this->hasOne('App\User', 'id', 'added_by');
  }
  public function class()
    {
        return $this->belongsTo('App\AcademicClass', 'class_name');
        // return $this->belongsTo('App\AcademicClass', 'id', 'class_name');
    }
}
