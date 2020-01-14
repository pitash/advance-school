<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AcademicGroup;

class GroupDelete extends Controller
{
    public function academicgroupdelete($group_id)
    {
      AcademicGroup::where('id', "=", $group_id)->delete();
      return redirect()->route('academicgroup.index')
                      ->withstatus('Group Deleted successfully');
    }
}
