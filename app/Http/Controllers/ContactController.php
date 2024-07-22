<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;

class ContactController extends Controller
{
    public function getContactInfo(){
        $contactinfos = ContactModel::all();
        return view("contact",['infosarray'=>$contactinfos]);
    }
}
