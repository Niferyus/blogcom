@extends('Admin.admin-panel-layout')

@section('content')

<form action="/admin-panel/admin-blogs-edit/{{ $blog->id }}" method="POST">
    @csrf
    <div class="container">
        <div class="form-group">
            <label for="title" class="form-label">Blog Başlığı</label>
            <textarea name="title" id="title" class="form-control" cols="30" rows="2" required>{{ $blog->title }}</textarea>
        </div>
        <div class="form-group">
            <label for="text" class="form-label">Blog Metini</label>
            <textarea name="text" id="text" class="form-control ckeditor" cols="30" rows="10" required>{{ $blog->text }}</textarea>
        </div>
        <div class="input-group">
            <label for="inputGroupFile04" class="form-label">Blog Resmi</label>
            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onchange="updateImageName()">
        </div>
        <input type="hidden" name="image" id="image" value="{{ $blog->image }}">
        <div class="form-group">
            <label for="writer" class="form-label">Blog Yazarı</label>
            <textarea name="writer" id="writer" class="form-control" cols="30" rows="1" required>{{ $blog->writer }}</textarea>
        </div>
            <label for="categoryid" class="form-label">Kategori</label>            
            <select name="categoryid" id="categoryid" class="form-select" aria-label="Default select example">
                <option selected>{{ $blog->categoryid }}</option>
                @php
                    $index = 1;
                @endphp
                @foreach ($categorys as $category)
                <option value="{{ $index }}">{{$category->categoryname}}</option>
                @php
                    $index++;
                @endphp
                @endforeach
            </select>
        <button style="margin-top: 1rem" type="submit" class="btn btn-primary">Kaydet</button>
    </div> 
</form>

<div class="images" style="margin-top: 1rem">&times;
    <img id="imageview" src="/assets/images/{{ $blog->image }}" alt="" width="300" height="200">
  </div>
  Yeni eklenen resmi kontrol etmek için butona basınız.
  <div class="control" style="margin-top: 1rem">
  <button class="btn btn-primary" onclick="checkit()">Kontrol Et</button>
  </div>

<script>
    function validateform(){
      const blogimage = document.getElementById('image').value.trim();
      
      if(!blogimage){
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
        document.getElementById('image').value = filename;
      }
      else{
        alert("Dosya uzantısı jpg değil");
        fileinput.value = "";
      }
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
    const blogimg = document.getElementById("image");
    const image = document.getElementById("imageview");
    if(blogimg.value !== ''){
      image.src = "/assets/images/" + blogimg.value;
    }
  }
  </script>

@endsection