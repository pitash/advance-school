<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicSubject extends Model
{
  protected $fillable =  ['subject_name','added_by'];

  function getUserInfo()
  {
    return $this->hasOne('App\User', 'id', 'added_by');
  }
  public function class()
  {
      return $this->belongsTo('App\AcademicClass', 'class_name');
  }
}
