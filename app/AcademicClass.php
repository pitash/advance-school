<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicClass extends Model
{
    protected $fillable =  ['class_name', 'added_by'];
    function getUserInfo()
    {
      return $this->hasOne('App\User', 'id', 'added_by');
    }
}
