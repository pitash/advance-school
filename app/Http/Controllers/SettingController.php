<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SettingController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('checkroleid');
  }

    public function language()
    {
      return view('setting/language');
    }
    public function curentlocale()
    {
      App::setLocale(Auth::user()->user_lang);
    }
    public function languagechange(Request $request)
    {
      $user_info = Auth::user();
      $user_info->user_lang = $request->user_lang;
      $user_info->save();
      return back();
    }
}
