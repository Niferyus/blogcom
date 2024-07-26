@extends('Admin.admin-panel-layout')

@section('content')

<form action="/admin-panel/admin-contact-edit/{{ $contactinfo->id }}" method="POST">
    @csrf
    <div class="container">
        <div class="form-group">
            <label for="phonenumber" class="form-label">Telefon Numarası</label>
            <textarea name="phonenumber" id="phonenumber" class="form-control" cols="30" rows="2">{{ $contactinfo->phonenumber }}</textarea>
        </div>
        <div class="form-group">
            <label for="faxnumber" class="form-label">Fax Numaras</label>
            <textarea name="faxnumber" id="faxnumber" class="form-control" cols="30" rows="10">{{ $contactinfo->faxnumber }}</textarea>
        </div>
        <div class="form-group">
            <label for="firstmail" class="form-label">Mail</label>
            <textarea name="firstmail" id="firstmail" class="form-control" cols="30" rows="1">{{ $contactinfo->firstmail }}</textarea>
        </div>
        <div class="form-group">
            <label for="secondmail" class="form-label">2.Mail</label>
            <textarea name="secondmail" id="secondmail" class="form-control" cols="30" rows="1">{{ $contactinfo->secondmail }}</textarea>
        </div>
        <div class="form-group">
            <label for="address" class="form-label">Adres</label>
            <textarea name="address" id="address" class="form-control" cols="30" rows="1">{{ $contactinfo->address }}</textarea>
        </div>
            
        <button style="margin-top: 1rem" type="submit" class="btn btn-primary">Kaydet</button>
    </div> 
</form>

@endsection