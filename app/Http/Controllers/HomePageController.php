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
    //  return view("welcome",['blogs' => $blogs]);

        $infos = HomepageModel::latest()
                                ->take(1)
                                ->get();                            
        return view("welcome",["infos" => $infos,"blogs"=>$blogs]);                            
    }
}
