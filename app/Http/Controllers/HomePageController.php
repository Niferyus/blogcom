<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomepageModel;
use App\Models\BlogModel;

class HomePageController extends Controller
{
    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function gethomepageinfo()
    {   
        $blogs = BlogModel::latest()
                                ->take(6)
                                ->get();

        $infos = HomepageModel::latest()
                               ->first();                          
        return view("welcome",["blogs"=>$blogs])->with("info",$infos);                            
    }

    public function getcreatehomepage(){
        return view("Admin/admin-homepage-create");
      }

    public function createhomepage(Request $request){
        if($request->isMethod('post')){
            $homepage = new HomepageModel;
            $homepage->title = $request->title;
            $homepage->text = $request->text;
            $homepage->image = $request->image;
            $homepage->save();
            return redirect("admin-panel/admin-homepage-list");
        }
    }

     public function homepagelist(){
         $info = HomepageModel::all();
         return view("Admin/admin-homepage-list",["infos"=>$info]);
     }

     public function homepageedit($id){
        $info = HomepageModel::where("id",$id)
                                    ->first();
        if($info != null){
            return view("Admin.admin-homepage-edit")->with("infos",$info);
        }                            
     }

     public function homepageupdate(Request $request){
        $info = HomepageModel::where("id",$request->id)
                                            ->first();
        if($request->isMethod("post") && $info != null){
            $info->title = $request->title;
            $info->text = $request->text;
            $info->image = $request->image;
            $info->save();
            return redirect('admin-panel/admin-homepage-list');
        }                                    
     }

     public function deletehomepage($id){
        $info = HomepageModel::where("id",$id)
                                        ->first();
        if($info != null && HomepageModel::count() > 1){
            $info->delete();
        }else {
          
            return redirect('admin-panel/admin-homepage-list')->with('error', 'Kayıt silinemedi çünkü yalnızca 1 kayıt kaldı.');
        }
    
        return redirect('admin-panel/admin-homepage-list')->with('success', 'Kayıt başarıyla silindi.');                              
     }
}   

