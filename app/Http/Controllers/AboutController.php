<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\AboutModel;


class AboutController extends Controller
{
    public function getaboutdata(){ // About tablosundaki verileri çeker ve about viewa gönderir 
      $aboutdata = AboutModel::latest()
                              ->first();
      if($aboutdata == null){
        return redirect();
      }
      return view("about")->with("aboutdata",$aboutdata);
    }

    public function aboutlist(){
      $infos = AboutModel::all();
      return view("Admin/admin-about-list",["infos" => $infos]);
    }
    
    public function aboutedit($id){
      $info = AboutModel::where("id",$id)
                                  ->first();
      if($info != null){
        return view("Admin/admin-about-edit")->with("info",$info);
      }
      
    }

    public function createabout(Request $request){
      if($request->isMethod('post')){

        $about = new AboutModel;
        $about->abouttext = $request->abouttext;
        $about->aboutimg = $request->aboutimg;
        $about->save();
        return redirect('admin-panel/admin-about-list');
      }
    }
    
    public function deleteabout($id){
      $about = AboutModel::where("id", $id)->first();
      
      if ($about != null && AboutModel::count() > 1) {
          $about->delete();
      } else {
          
          return redirect('admin-panel/admin-about-list')->with('error', 'Kayıt silinemedi çünkü yalnızca 1 kayıt kaldı.');
      }
  
      return redirect('admin-panel/admin-about-list')->with('success', 'Kayıt başarıyla silindi.');
  }
  

    public function updateabout(Request $request){
      $about = AboutModel::where("id",$request->id)
                                          ->first();
      if($request->isMethod('post') || $about != null){
        $about->abouttext = $request->abouttext;
        $about->aboutimg = $request->aboutimg;
        $about->save();
        return redirect('admin-panel/admin-about-list');                      
      }
    }

    public function activateselectedabout($id){
      $about = AboutModel::where("id",$id)
                                    ->first();
      $about->updated_at = Carbon::now();
      $about->save();
      return redirect('admin-panel/admin-about-list');

    }

}
