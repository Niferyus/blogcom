@extends('Admin.admin-panel-layout')

@section('content')

<div class="form">
<div class="container">
    <div class="form-group">
        <label for="abouttext" class="form-label">Hakkında Metin</label>
        <textarea name="abouttext" id="abouttext" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label for="aboutimg" class="form-label">Hakkında Resim İsmi</label>
        <textarea name="aboutimg" id="aboutimg" class="form-control" cols="30" rows="1"></textarea>
    </div>
      <button type="submit" class="btn btn-primary">Kaydet</button>
</div> 
</div>

@endsection