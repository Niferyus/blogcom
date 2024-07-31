<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\CategoryModel;

class BlogController extends Controller
{   

    /**
     * Veritabanındaki bütün blogları çeker ve pagination uygular
     *
     * @param none
     * @return blogs viewına çekilen blogları gönderir
     * @throws none
     **/
    public function showallBlogs(){
        $blogs = BlogModel::latest()->paginate(6);
        if($blogs == null){
            abort(404);            
        }
        else{
          return view("blogs", ['blogsarray' => $blogs]);
        }
    }
     
    /**
     * Sitede basılan blogun idsini çeker eğer blogu bulabildiyse
     * blogun detay sayfasına gider
     * bulamadıysa 404 sayfasına döner 
     *       
     *
     * @param blog id
     * @return blog detay sayfasına yada 404 viewına döner
     * @throws none
     **/
    public function getblogdetails($id){
        $blogVeri = BlogModel::where("id", $id)->first();

        if ($blogVeri != null)
            return view('blog-details', ['blog' => $blogVeri]);
        else
            abort(404); 
    }

    
     /**
     * Admin panelinde yeni blog yazısını oluşturur. 
     *       
     *
     * @param request
     * @return bloglar sayfasına döner
     * @throws none
     **/
    public function createblog(Request $request){
        if($request->isMethod('post')){
            $blog = new BlogModel;
            $blog->title = $request->title;
            // if (Str::length($blog->title) > 250) copy(0, 250)
            $blog->text = $request->text;
            $blog->writer = $request->writer;
            $blog->categoryid = $request->categoryid;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName(); 
                $image->move(public_path('assets/images'), $imageName); 
                $blog->image = $imageName;
            }

            $blog->save();
            return redirect('admin-panel/admin-blogs-list');
        }
        else{
            abort(404);
        }
    }
    
    /**
     * Bütün blogları çeker blog listesi sayfasına gönderir 
     *       
     *
     * @param none
     * @return blog list viewına çekilen blogları gönderir
     * @throws none
     **/
    public function listblog(){
        $blogs = BlogModel::latest()->get();
        if($blogs == null){
            abort(404);
        }
        else{ 
            return view('Admin.admin-blogs-list', ['blogs' => $blogs]);
        }
    }


    
    /**
     *  Çektiği idye ait blogu ve kategorileri çeker 
     *  null olup olmadıklarını kontrol eder.  
     *  blog edit viewına gönderir
     *       
     *
     * @param id
     * @return kategoriler ve idsi alınan blogu gönderir
     * @throws none
     **/
    public function editblogs($id){
        $blog = BlogModel::where("id", $id)->first();
        $category = CategoryModel::all();
        if(!$blog && !$category){
            abort(404);
        }
        else{
            return view('Admin.admin-blogs-edit')->with("blog", $blog)->with("categorys", $category);
        }
    }

    /**
     *  Çektiği idye ait blogun update viewına gider 
     *  null olup olmadıklarını kontrol eder.  
     *  
     *       
     *
     * @param id
     * @return kategoriler ve idsi alınan blogu gönderir
     * @throws none
     **/
    public function updateblog(Request $request){
        $blog = BlogModel::where("id", $request->id)->first();
        if($request->isMethod('post')){
            $blog->title = $request->title;
            $blog->text = $request->text;
            $blog->writer = $request->writer;
            $blog->categoryid = $request->categoryid;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName(); 
                $image->move(public_path('assets/images'), $imageName); 
                $blog->image = $imageName;
            }

            $blog->save();
            return redirect('admin-panel/admin-blogs-list');
        }
    }

    /**
     * ID si gönderilen blog yazısını bulup null olup olmadığını kontrol edip siler
     * null ise error döndürür
     * null değilse blogu siler başarılı mesajı döndürür
     *
     * @param id
     * @return başarı yada error mesajı döndürür
     * @throws none
     **/
    public function deleteblog($id){
        $blog = BlogModel::where("id", $id)->first();
        if($blog != null){
            $blog->delete();
        } else {
            return redirect('admin-panel/admin-blogs-list')->with('error', 'Kayıt silinemedi.');
        }
    
        return redirect('admin-panel/admin-blogs-list')->with('success', 'Kayıt başarıyla silindi.');
    }

    /**
     * Kategori modelindeki bütün kayıtları getirir Blog oluşturma sayfasına yollar
     *
     *
     * @param none
     * @return kategoriler
     * @throws none
     **/
    public function getcategories(){
        $category = CategoryModel::all();
        if(!$category){
            abort(404);
        }
        else
        return view('Admin.admin-blogs-create', ["categorys" => $category]);
    }

}
