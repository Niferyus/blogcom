@extends('Admin.admin-panel-layout')

@section('content')

<form action="{{ url('/admin-panel/admin-about-edit/' .$info->id) }}" method="POST" onsubmit="return validateform()">
  @csrf
  <div class="container">
    <div class="form-group">
        <label for="abouttext" class="form-label">Hakkında Metin</label>
        <textarea name="abouttext" id="abouttext" class="form-control ckeditor" cols="30" rows="10" required>{{ $info->abouttext }}</textarea>
    </div>
    <div class="input-group">
      <label for="inputGroupFile04" class="form-label">Hakkında Resim</label>
      <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onchange="updateImageName()">
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
     const fileExtension = filename.split('.').pop().toLowerCase();

    if(fileExtension === 'jpg'){
      document.getElementById('aboutimg').value = filename;
    }
    else{
      alert("Dosya uzantısı jpg değil");
      fileinput.value = "";
    }
    }
  }
  
  $(".images img").click(function(){
  $("#full-image").attr("src", $(this).attr("src"));
  $('#image-viewer').show();
});

$("#image-viewer .close").click(function(){
  $('#image-viewer').hide();
});

function checkit(){
  const aboutimg = document.getElementById("aboutimg");
  const image = document.getElementById("imageview");
  if(aboutimg.value === ''){

  }
  else{
    image.src = "/assets/images/" + aboutimg.value;
  }
}
</script>

@endsection