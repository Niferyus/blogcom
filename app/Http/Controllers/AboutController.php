<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutModel;

class AboutController extends Controller
{
    protected function getaboutdata(){ // About tablosundaki verileri çeker ve about viewa gönderir 
        $aboutdatas = AboutModel::all();
        return view("about",compact("aboutdatas"));
      }
}
