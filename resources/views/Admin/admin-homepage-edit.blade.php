@extends('Admin.admin-panel-layout')

@section('content')

<form name="createhomepageform" id="createhomepageform" action="{{ url('/admin-panel/admin-homepage-edit/' .$infos->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateform()">
    @csrf
    <div class="container">
      <div class="form-group">
          <label for="title" class="form-label">Anasayfa Başlık</label>
          <input name="title" id="title" class="form-control" cols="30" rows="10" required value="{{ $infos->title }}"></input>
      </div>
      <div class="container">
        <div class="form-group">
            <label for="text" class="form-label">Anasayfa Metin</label>
            <input name="text" id="text" class="form-control" cols="30" rows="10" required value="{{ $infos->text }}"></input>
        </div>
        <div class="input-group">
          <label for="inputGroupFile04" class="form-label">Anasayfa Resim</label>
          <input type="file" class="form-control" id="inputGroupFile04" accept="image/*" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onchange="updateImageName()">
      </div>
      <input type="hidden" name="image" id="image" value="{{ $infos->image }}">

        <button type="submit" class="btn btn-primary">Kaydet</button>
  </div> 
  </form>

  <div class="images" style="margin-top: 1rem">
    <img id="imageview" src="/assets/images/{{ $infos->image }}" alt="" width="300" height="200">
  </div>
  
  <div id="image-viewer">
    <span class="close">&times;</span>
    <img class="modal-content" id="full-image">
  </div>
  
  Yeni eklenen resmi kontrol etmek için butona basınız.
  <div class="control" style="margin-top: 1rem">
  <button class="btn btn-primary" onclick="checkit()">Kontrol Et</button>
  </div>

  <script>
    function validateform() {
      const image = document.getElementById('image').value.trim();
      if (!image) {
        alert("Lütfen resim seçiniz");
        return false;
      }
      return true;
    }

    function updateImageName() {
      const fileinput = document.getElementById("inputGroupFile04");
      const file = fileinput.files[0];

      if (file) {
        const filename = file.name;
        document.getElementById('image').value = filename;
      }
    }

    document.querySelector(".images img").addEventListener("click", function() {
      document.getElementById("full-image").src = this.src;
      document.getElementById('image-viewer').style.display = 'block';
    });

    document.querySelector("#image-viewer .close").addEventListener("click", function() {
      document.getElementById('image-viewer').style.display = 'none';
    });

    function checkit() {
      const image = document.getElementById("image").value;
      const imageview = document.getElementById("imageview");
      if (image !== '') {
        imageview.src = "/assets/images/" + image;
      }
    }
  </script>
@endsection
