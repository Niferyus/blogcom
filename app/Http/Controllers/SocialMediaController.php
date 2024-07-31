<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMediaModel;


class SocialMediaController extends Controller
{   
    /**
     * Bütün kayıtları alır ve çıktı verir
     *
     *
     * @param none
     * @return links
     * @throws conditon
     **/
    public function getlinks(){
        $socialmedialinks = SocialMediaModel::all();
        return $socialmedialinks;
    }
}
