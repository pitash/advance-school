<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicSection extends Model
{
  protected $fillable =  ['section_name','added_by'];
  function getUserInfo()
  {
    return $this->hasOne('App\User', 'id', 'added_by');
  }
}
