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

    public function aboutlist(){
      $infos = AboutModel::all();
      return view("Admin/admin-about-list",["infos" => $infos]);
    }
    
    public function aboutedit($id){
      $info = AboutModel::where("id",$id)
                                  ->first();
      return view("Admin/admin-about-edit")->with("info",$info);
    }
    
    //-post
    //add
    //resim- metin


    //-get
    //update
    //id

    //post
    //update
    //id-resim-metin
    //

    //get
    //delete
    //id
}
