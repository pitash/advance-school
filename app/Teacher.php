<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Teacher extends Model
{
    use softDeletes;
    protected $fillable = ['teacher_name','teacher_image','teacher_phone_no','teacher_email_address','teacher_gender','teacher_designation','joining_date','techer_nid','parmanent_address','present_address'];

    function getUserInfo()
    {
      return $this->hasOne('App\User', 'id', 'added_by');
    }
    public function desig()
      {
          return $this->belongsTo('App\Teacher', 'teacher_designation');
      }
}
