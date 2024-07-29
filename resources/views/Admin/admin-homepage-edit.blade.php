@extends('Admin.admin-panel-layout')

@section('content')

<form action="{{ url('/admin-panel/admin-homepage-edit/' .$infos->id) }}" method="POST">
    @csrf
    <div class="container">
      <div class="form-group">
          <label for="title" class="form-label">Hakkında Metin</label>
          <textarea name="title" id="title" class="form-control" cols="30" rows="10">{{ $infos->title }}</textarea>
      </div>
      <div class="container">
        <div class="form-group">
            <label for="text" class="form-label">Hakkında Metin</label>
            <textarea name="text" id="text" class="form-control" cols="30" rows="10">{{ $infos->text }}</textarea>
        </div>
      <div class="form-group">
          <label for="image" class="form-label">Hakkında Resim İsmi</label>
          <textarea name="image" id="image" class="form-control" cols="30" rows="1">{{ $infos->image }}</textarea>
      </div>
        <button type="submit" class="btn btn-primary">Kaydet</button>
  </div> 
  </form>

@endsection