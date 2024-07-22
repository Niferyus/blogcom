<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutModel;

class AboutController extends Controller
{
    public function getaboutdata(){ // About tablosundaki verileri çeker ve about viewa gönderir 
        $aboutdata = AboutModel::latest()
                                  ->first();
        
        return view("about")->with("aboutdata",$aboutdata);
      }
}
