@extends('Admin.admin-panel-layout')

@section('content')

<form action="/admin-panel/admin-homepage-create" method="POST">
    @csrf
    <div class="container">
      <div class="form-group">
          <label for="title" class="form-label">Başlık</label>
          <textarea name="title" id="title" class="form-control" cols="30" rows="10"></textarea>
      </div>
      <div class="container">
        <div class="form-group">
            <label for="text" class="form-label">Metin</label>
            <textarea name="text" id="text" class="form-control" cols="30" rows="10"></textarea>
        </div>
      <div class="form-group">
          <label for="image" class="form-label">Resim</label>
          <textarea name="image" id="image" class="form-control" cols="30" rows="1"></textarea>
      </div>
        <button type="submit" class="btn btn-primary">Kaydet</button>
  </div> 
  </form>

@endsection