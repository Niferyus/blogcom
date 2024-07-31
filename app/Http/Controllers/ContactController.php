<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;

class ContactController extends Controller
{
    /**
     * Sayfada göstermek için son eklenen kaydı bulur 
     *  
     *
     * @param none
     * @return contact
     * @throws none
     **/
    public function getContactInfo(){
        $contactinfos = ContactModel::latest()
                                     ->first();
        if($contactinfos == null){
            abort(404);
        }
        else
        return view("contact")->with("contactinfo",$contactinfos);
    }

    /**
     * Bütün kayıtları bulur liste viewına gönderir 
     *  
     *
     * @param none
     * @return contact
     * @throws none
     **/
    public function listContact(){
        $infos = ContactModel::all();
        if($infos == null){
            abort(404);
        }
        else
        return view("Admin.admin-contact-list")->with("infos",$infos);
    }

    /**
     * Aldığı idye ait kaydı bulur null olup olmadığını kontrol edip siler 
     *  
     *
     * @param id
     * @return list view
     * @throws none
     **/
    public function deletecontact($id){
        $info = ContactModel::where("id",$id)
                                    ->first();
        if($info != null && ContactModel::count() > 1){
            $info->delete();
        }
        else {
          
            return redirect('admin-panel/admin-contact-list')->with('error', 'Kayıt silinemedi çünkü yalnızca 1 kayıt kaldı.');
        }
    
        return redirect('admin-panel/admin-contact-list')->with('success', 'Kayıt başarıyla silindi.');                            
    }

    /**
     * Çektiği idnin değerlerini değiştirir ve kaydeder
     *  
     *
     * @param request
     * @return contact list
     * @throws none
     **/
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

    /**
     * Çektiği idli kaydın düzenleme sayfasına gitmesini sağlar
     *  
     *
     * @param id
     * @return contact
     * @throws none
     **/
    public function editcontact($id){
        $contact = ContactModel::where('id',$id)
                                      ->first();
        if($contact != null){
            return view("Admin.admin-contact-edit")->with("contactinfo",$contact);
        }
        else
            abort(404);
    }

    /**
     * Kayıt oluşturma ekranının görüntülenebilmesi için çalışır
     *  
     *
     * @param none
     * @return contact create view
     * @throws none
     **/
    public function getcontactcreate(){
        return view('Admin.admin-contact-create');
    }

    /**
     * Yeni kayıt oluşturmayı sağlar
     *  
     *
     * @param request
     * @return contact list
     * @throws none
     **/
    public function createcontact(Request $request){
        if($request->isMethod('post')){
            $contact = new ContactModel;
            $contact->phonenumber = $request->phonenumber;
            $contact->faxnumber = $request->faxnumber;
            $contact->firstmail = $request->firstmail;
            $contact->secondmail = $request->secondmail;
            $contact->address = $request->address;
            $contact->save();
            return redirect("admin-panel/admin-contact-list");
        }
    }

}
