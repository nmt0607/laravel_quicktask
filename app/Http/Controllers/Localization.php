<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class Localization extends Controller
{
    public function locate($locale) 
    {
      	Session::put('locale', $locale);

      	return redirect()->back();
    }
}
