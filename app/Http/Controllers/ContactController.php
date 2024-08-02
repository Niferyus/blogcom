<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;
use App\Models\MessageModel;

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
        $number1 = random_int(0,99);
        $number2 = random_int(0,99);
        return view("contact")->with("contactinfo",$contactinfos)->with("number1",$number1)->with("number2",$number2);
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

            $request->validate([
                'name'=>'required|string',
                'mail' => 'required|email',
                'topic' => 'required|string',
                'message' => 'required'
            ]);

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

            $request->validate([
                'phonenumber' => 'required|numeric',
                'faxnumber' => 'nullable|numeric',
                'firstmail' => 'required|email',
                'secondmail' => 'nullable|email',
                'address' => 'required|string',
            ]);

            $contact = ContactModel::create(
                [
                    'phonenumber' => $request->phonenumber,
                    'faxnumber' => $request->faxnumber,
                    'firstmail' => $request->firstmail,
                    'secondmail' => $request->secondmail,
                    'address' => $request->address,
                ]
                );
                return redirect('admin-panel/admin-contact-list')->with('success', 'Kayıt başarıyla oluşturuldu!');         
        }
        else{
            return redirect('admin-panel/admin-contact-list')->with('error', 'Kayıt başarıyla oluşturuldu!');
        }
    }

    public function createmessage(Request $request){
        if($request->isMethod('post') && $request->total == $request->totalclient){

             $request->validate([
                 'name'=>'required|string',
                 'mail' => 'required|email',
                 'topic' => 'required|string',
                 'message' => 'required'
             ]);

            $message = MessageModel::create(
            [
                'name'=>$request->name,
                'mail'=>$request->mail,
                'topic'=>$request->topic,
                'message'=>$request->message,
            ]
            );
            return redirect('contact')->with('success','Mesajınız gönderildi');
        }
        return redirect('contact')->with('error','Mesajınız gönderilemedi');
    }

    public function deletemessage($id){
        $message = MessageModel::where("id",$id)->first();

        if($message != null){
           $message->delete(); 
        }
        else{
            return redirect('admin-panel/admin-message-list')->with('error', 'Kayıt silinemedi');
        }
        return redirect('admin-panel/admin-message-list')->with('success', 'Kayıt başarıyla silindi.');
    }

    public function listmessage(){
        $message = MessageModel::all();

        return view("Admin/admin-message-list",["messages"=>$message]);
    }

    public function readmessage($id){
        $message = MessageModel::where("id",$id)->first();

        if($message != null){
            return view("Admin/admin-message-read")->with('message',$message);
        }
        else{
            abort(404);
        }
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function createnumber()
    {   
        $number1 = random_int(0,99);
        $number2 = random_int(0,99);
        $total = $number1 + $number2;
        
        return $total; 
        // view("contact")->with("number1",$number1)->with("number2",$number2)->with("total",$total);
    }
}
