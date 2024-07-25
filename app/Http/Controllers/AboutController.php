<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
      if($info){
        return view("Admin/admin-about-edit")->with("info",$info);
      }
      
    }

    public function createabout(Request $request){
      $about = new AboutModel;
      $about->abouttext = $request->abouttext;
      $about->aboutimg = $request->aboutimg;
      $about->save();
      return redirect('admin-panel/admin-about-list');
    }
    
    public function deleteabout($id){
      $about = AboutModel::where("id",$id)
                                ->first();
      if ($about) {
        $about->delete();
      }
      return redirect('admin-panel/admin-about-list');
    }

    public function updateabout(Request $request){
      $about = AboutModel::where("id",$request->id)
                                          ->first();
      $about->abouttext = $request->abouttext;
      $about->aboutimg = $request->aboutimg;
      $about->save();
      return redirect('admin-panel/admin-about-list');                      
    }

    public function activateselectedabout($id){
      $about = AboutModel::where("id",$id)
                                    ->first();
      $about->updated_at = Carbon::now();
      $about->save();
      return redirect('admin-panel/admin-about-list');

    }

}
