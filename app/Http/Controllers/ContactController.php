<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;

class ContactController extends Controller
{
    public function getContactInfo(){
        $contactinfos = ContactModel::latest()
                                     ->first();
        return view("contact")->with("contactinfo",$contactinfos);
    }

    public function listContact(){
        $infos = ContactModel::all();
        return view("Admin.admin-contact-list")->with("infos",$infos);
    }

    public function deletecontact($id){
        $info = ContactModel::where("id",$id)
                                    ->first();
        if($info != null){
            $info->delete();
        }
        return redirect("admin-panel/admin-contact-list");                            
    }

    public function updateContact(Request $request){
        $contact = ContactModel::where('id',$request->id)
                                                ->first();
        if($request->isMethod('post') && $request != null){
           $contact->phonenumber = $request->phonenumber;
           $contact->faxnumber = $request->faxnumber;
           $contact->firstmail = $request->firstmail;
           $contact->secondmail = $request->secondmail;
           $contact->address = $request->address;
           $contact->save();
           return redirect('admin-panel/admin-contact-list'); 
        }                                        
    }

    public function editcontact($id){
        $contact = ContactModel::where('id',$id)
                                      ->first();
        if($contact != null){
            return view("Admin.admin-contact-edit")->with("contactinfo",$contact);
        }
    }

    public function getcontactcreate(){
        return view('Admin.admin-contact-create');
    }

    public function createcontact(Request $request){
        if($request->isMethod('post')){
            $conatact = new ContactModel;
            $homepage->phonenumber = $request->phonenumber;
            $homepage->faxnumber = $request->faxnumber;
            $homepage->firstmail = $request->firstmail;
            $homepage->secondmail = $request->secondmail;
            $homepage->address = $request->address;
            $homepage->save();
            return redirect("admin-panel/admin-homepage-list");
        }
    }

}
