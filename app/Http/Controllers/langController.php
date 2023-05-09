<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;

class langController extends Controller
{
    public function langChange(Request $request)
    {
        App::setLocale($request->lang);

        Session::put('locale',$request->lang);

        return redirect()->back();
    }
}
