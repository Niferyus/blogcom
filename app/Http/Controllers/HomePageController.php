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
        if($blogs == null && $infos == null){
            abort(404);
        }
        else                
        return view("welcome",["blogs"=>$blogs])->with("info",$infos);                            
    }

    /**
     * Yeni kayıt oluşturma viewının görüntülenmesi için çalışır
     *  
     *
     * @param none
     * @return create view
     * @throws none
     **/
    public function getcreatehomepage(){
        return view("Admin/admin-homepage-create");
      }

    /**
     * Yeni kayıt oluşturur
     *  
     *
     * @param request
     * @return homepage list
     * @throws none
     **/
    public function createhomepage(Request $request){
        if($request->isMethod('post')){

            $request->validate([
                'title' => 'required|string|min:3',
                'text' => 'required|string|min:5',
                'image' => 'required',
            ]);

            $imageName = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName(); 
                $image->move(public_path('assets/images'), $imageName); 
            }

            $homepage = HomepageModel::create(
                [
                    'title' => $request->title,
                    'text' => $request->text,
                    'image' => $imageName,
                ]
            );
            return redirect('admin-panel/admin-homepage-list')->with('success', 'Kayıt başarıyla oluşturuldu!');
        }
        else{
            return redirect('admin-panel/admin-homepage-list')->with('error', 'Kayıt oluşturulamadı');
        }
    }

    /**
     * Bütün kayıtları alır liste viewına gönderir
     *  
     *
     * @param none
     * @return homepage list
     * @throws none
     **/
     public function homepagelist(){
         $info = HomepageModel::all();
         if($info == null){
            abort(404);
         }
         else
         return view("Admin/admin-homepage-list",["infos"=>$info]);
     }

     /**
     * Çektiği idye ait kaydın düzenleme sayfasını getirmeyi sağlar
     *  
     *
     * @param id
     * @return homepage edit
     * @throws none
     **/
     public function homepageedit($id){
        $info = HomepageModel::where("id",$id)
                                    ->first();
        if($info != null){
            return view("Admin.admin-homepage-edit")->with("infos",$info);
        }
        else{
            abort(404);
        }                            
     }

     /**
     * Çektiği idye ait kaydın değerlerini değiştirir ve kaydeder
     *  
     *
     * @param request
     * @return homepage list
     * @throws none
     **/
     public function homepageupdate(Request $request){
        $info = HomepageModel::where("id",$request->id)
        ->first();
        
        if($request->isMethod("post") && $info != null){
            $info->title = $request->title;
            $info->text = $request->text;
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName(); 
                $image->move(public_path('assets/images'), $imageName); 
                $info->image = $imageName;
            }

            $info->save();
            return redirect('admin-panel/admin-homepage-list');
        }                                    
     }

     /**
     * Çektiği idye ait kaydı siler
     *  
     *
     * @param id
     * @return error yada olumlu yanıt
     * @throws none
     **/
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

