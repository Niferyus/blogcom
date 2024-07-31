@extends('Admin.admin-panel-layout')

@section('content')

<form action="/admin-panel/admin-contact-edit/{{ $contactinfo->id }}" method="POST">
    @csrf
    <div class="container">
        <div class="form-group">
            <label for="phonenumber" class="form-label">Telefon Numarası</label>
            <input name="phonenumber" id="phonenumber" class="form-control" pattern="\d*" required value="{{ $contactinfo->phonenumber }}"></input>
        </div>
        <div class="form-group">
            <label for="faxnumber" class="form-label">Fax Numaras</label>
            <input name="faxnumber" id="faxnumber" class="form-control" pattern="\d*" value="{{ $contactinfo->faxnumber }}" ></input>
        </div>
        <div class="form-group">
            <label for="firstmail" class="form-label">Mail</label>
            <input name="firstmail" id="firstmail" class="form-control" required value="{{ $contactinfo->firstmail }}"></input>
        </div>
        <div class="form-group">
            <label for="secondmail" class="form-label">2.Mail</label>
            <input name="secondmail" id="secondmail" class="form-control" value="{{ $contactinfo->secondmail }}"></input>
        </div>
        <div class="form-group">
            <label for="address" class="form-label">Adres</label>
            <input name="address" id="address" class="form-control" required value="{{ $contactinfo->address }}"></input>
        </div>
            
        <button style="margin-top: 1rem" type="submit" class="btn btn-primary">Kaydet</button>
    </div> 
</form>

@endsection