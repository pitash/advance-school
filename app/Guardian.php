<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Guardian extends Model
{
    use softDeletes;
    function getUserInfo()
    {
      return $this->hasOne('App\User', 'id', 'added_by');
    }
}
