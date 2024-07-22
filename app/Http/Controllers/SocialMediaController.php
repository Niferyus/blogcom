<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMediaModel;


class SocialMediaController extends Controller
{
    public function getlinks(){
        $socialmedialinks = SocialMediaModel::all();
        return $socialmedialinks;
    }
}
