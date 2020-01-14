<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ManageStudent extends Model
{
  protected $fillable =  ['student_image'];
  // function getUserInfo()
  // {
  //   return $this->hasOne('App\User', 'id', 'added_by');
  // }
  
}
