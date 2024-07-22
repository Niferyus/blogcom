<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;

class BlogController extends Controller
{
    public function getdata(){
        $blogs = BlogModel::all();
        return $blogs;
    }
    
     public function showBlogs(){
        //   $blogs = BlogModel::all();
        $blogs = BlogModel::latest()
                                ->take(6)
                                ->get();
         return view("welcome",['blogs' => $blogs]);
     }

    public function showallBlogs(){
        return view("blogs",['blogsarray' => $this->getdata()]);
     }
     
    public function getblogdetails($id){
        $blogVeri = BlogModel::where("id", $id)->first();
        return view('blog-details',
        ['blog'=>$blogVeri]); 
     } 
}
