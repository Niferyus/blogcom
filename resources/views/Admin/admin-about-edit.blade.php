@extends('Admin.admin-panel-layout')

@section('content')

<form action="{{ url('/admin-panel/admin-about-edit/' .$info->id) }}" method="POST" onsubmit="return validateform()" enctype="multipart/form-data">
  @csrf
  <div class="container">
    <div class="form-group">
        <label for="abouttext" class="form-label">Hakkında Metin</label>
        <textarea name="abouttext" id="abouttext" class="form-control ckeditor" minlength="100" cols="30" rows="10" required>{{ $info->abouttext }}</textarea>
    </div>
    <div class="input-group">
      <label for="inputGroupFile04" class="form-label">Hakkında Resim</label>
      <input type="file" class="form-control" id="inputGroupFile04" accept="image/*" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onchange="updateImageName()">
  </div>
  <input type="hidden" name="aboutimg" id="aboutimg" value="{{ $info->aboutimg }}">
      <button  type="submit" class="btn btn-primary" style="margin-top: 1rem">Kaydet</button>
</div> 
</form>

<div class="images" style="margin-top: 1rem">&times;
  <img id="imageview" src="/assets/images/{{ $info->aboutimg }}" alt="" width="300" height="200">
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
  function validateform(){
    const aboutimage = document.getElementById('aboutimg').value.trim();
    const aboutText = CKEDITOR.instances.abouttext.getData().trim();

    // if (!aboutText) {
    //         alert('Lütfen hakkında metni girin.');
    //         return false;
    // }

    if(!aboutimage){
      alert("Lütfen resim seçiniz");
      return false;
    }
  }

  function updateImageName(){
    const fileinput = document.getElementById("inputGroupFile04");
    const file = fileinput.files[0];

    if(file){
     const filename = file.name;
     document.getElementById('aboutimg').value = filename;
    }
  }
  
  
  document.querySelector(".images img").addEventListener("click", function() {
      document.getElementById("full-image").src = this.src;
      document.getElementById('image-viewer').style.display = 'block';
    });

    document.querySelector("#image-viewer .close").addEventListener("click", function() {
      document.getElementById('image-viewer').style.display = 'none';
    });

function checkit(){
  const aboutimg = document.getElementById("aboutimg");
  const image = document.getElementById("imageview");

  if(aboutimg.value !== ''){
    image.src = "/assets/images/" + aboutimg.value;
  }

}
</script>


@endsection