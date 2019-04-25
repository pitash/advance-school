<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicSubject extends Model
{
  function getUserInfo()
  {
    return $this->hasOne('App\User', 'id', 'added_by');
  }
}
