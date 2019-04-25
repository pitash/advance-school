<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicGroup extends Model
{
  protected $fillable =  ['group_name'];
  function getUserInfo()
  {
    return $this->hasOne('App\User', 'id', 'added_by');
  }
}
