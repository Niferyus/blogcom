<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\CategoryModel;

class BlogController extends Controller
{
    public function getdata(){
        $blogs = BlogModel::all();
        return $blogs;
    }

    public function showallBlogs(){
        $blogs = BlogModel::paginate(6);
        return view("blogs",['blogsarray' => $blogs]);
     }
     
    public function getblogdetails($id){
        $blogVeri = BlogModel::where("id", $id)->first();
        return view('blog-details',
        ['blog'=>$blogVeri]); 
     }
     
    public function createblog(Request $request){
        if($request->isMethod('post')){
            $blog = new BlogModel;
            $blog->title = $request->title;
            $blog->text = $request->text;
            $blog->image = $request->image;
            $blog->writer = $request->writer;
            $blog->categoryid = $request->categoryid;
            $blog->save();
            return redirect('admin-panel/admin-blogs-list');
        }
    }
    
    public function listblog(){
        $blogs = BlogModel::all();
        return view('Admin.admin-blogs-list',['blogs' => $blogs]);
    }

    public function editblogs($id){
        $blog = BlogModel::where("id",$id)
                                    ->first();
        $category = CategoryModel::all();
        return view('Admin.admin-blogs-edit')->with("blog",$blog)->with("categorys",$category);

    }

    public function updateblog(Request $request){
        $blog = BlogModel::where("id",$request->id)->first();
        if($request->isMethod('post')){
            $blog->title = $request->title;
            $blog->text = $request->text;
            $blog->image = $request->image;
            $blog->writer = $request->writer;
            $blog->categoryid = $request->categoryid;
            $blog->save();
            return redirect('admin-panel/admin-blogs-list');
        }
    }

    public function deleteblog($id){
        $blog = BlogModel::where("id",$id)->first();
        if($blog != null){
            $blog->delete();
        }
        else {
            return redirect('admin-panel/admin-blogs-list')->with('error', 'Kayıt silinemedi.');
        }
    
        return redirect('admin-panel/admin-blogs-list')->with('success', 'Kayıt başarıyla silindi.');
    }

    public function getcategories(){
        $category = CategoryModel::all();
        return view('Admin.admin-blogs-create',["categorys"=>$category]);
    }
}
