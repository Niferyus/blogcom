<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\AboutModel;


class AboutController extends Controller
{
    /**
     * Sayfada göstermek için about modelindeki son eklenen kaydı alır 
     * null kontrolü yapar about viewına gönderir 
     *
     * 
     * @param none
     * @return viewa son kaydı gönderir
     * @throws none
     **/
    public function getaboutdata(){ 
      $aboutdata = AboutModel::latest()
                              ->first();
      if($aboutdata == null){
        return abort(404);
      }
      else{
        return view("about")->with("aboutdata",$aboutdata);
      }
      
    }

     /**
     * About modelindeki bütün kayıtları çeker 
     * about list viewına gönderir
     * 
     *
     * @param none
     * @return about
     * @throws none
     **/
    public function aboutlist(){
      $infos = AboutModel::all();
      if($infos == null){
        return abort(404);
      }
      else{
        return view("Admin/admin-about-list",["infos" => $infos]);
      }
    }
    
    /**
     * Aldığı idli kaydı bulur null olup olmadığını kontrol eder ve 
     * Düzenleme sayfasına gönderir 
     *      
     * @param id
     * @return about
     * @throws none
     **/
    public function aboutedit($id){
      $info = AboutModel::where("id",$id)
                                  ->first();
      if($info != null){
        return view("Admin/admin-about-edit")->with("info",$info);
      }
      else{
        abort(404);
      }
      
    }

    /**
     * Admin panelinde yeni aboutu oluşturur.  
     *
     *
     * @param requet
     * @return aboutlist viewına döner
     * @throws none
     **/
    public function createabout(Request $request){
      if($request->isMethod('post')){

        $about = new AboutModel;
        $about->abouttext = $request->abouttext;
  
        if ($request->hasFile('aboutimg')) {
          $image = $request->file('aboutimg');
          $imageName = time() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('assets/images'), $imageName);
          $about->image = $imageName;
      }

        $about->save();
        return redirect('admin-panel/admin-about-list');
      }
    }
    
    /**
     * Aldığı idli kaydı bulur null olup olmadığını kontrol eder
     * Sonuca göre hata yada olumlu mesajı döndürür
     *
     * @param id
     * @return error yada olumlu mesaj
     * @throws none
     **/
    public function deleteabout($id){
      $about = AboutModel::where("id", $id)->first();
      
      if ($about != null && AboutModel::count() > 1) {
          $about->delete();
      } else {
          
          return redirect('admin-panel/admin-about-list')->with('error', 'Kayıt silinemedi çünkü yalnızca 1 kayıt kaldı.');
      }
  
      return redirect('admin-panel/admin-about-list')->with('success', 'Kayıt başarıyla silindi.');
  }
  
    /**
     * Aldığı idli kaydı bulur değişiklikleri yapar ve kaydeder
     *
     * @param request
     * @return about list
     * @throws none
     **/        
    public function updateabout(Request $request){
      $about = AboutModel::where("id",$request->id)
                                          ->first();
      if($request->isMethod('post') || $about != null){
        $about->abouttext = $request->abouttext;
        $about->aboutimg = $request->aboutimg;

        if ($request->hasFile('aboutimg')) {
          $image = $request->file('aboutimg');
          $imageName = time() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('assets/images'), $imageName);
          $blog->image = $imageName;
      }

        $about->save();
        return redirect('admin-panel/admin-about-list');                      
      }
    }

}
