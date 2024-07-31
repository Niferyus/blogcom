@extends('Admin.admin-panel-layout')

@section('content')

<form name="createhomepageform" id="createhomepageform" action="/admin-panel/admin-homepage-create" method="POST" enctype="multipart/form-data" onsubmit= "return validateForm()">
    @csrf
    <div class="container">
      <div class="form-group">
          <label for="title" class="form-label">Başlık</label>
          <input name="title" id="title" class="form-control" maxlength="20" minlength="5" required></input>
      </div>
        <div class="form-group">
            <label for="text" class="form-label">Metin</label>
            <input name="text" id="text" class="form-control" maxlength="50" minlength="10" required></input>
        </div>
        <div class="input-group">
          <input type="file" class="form-control" id="inputimg" name="image" accept="image/*" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onchange="updateImageName()">
      </div>
      <input type="hidden" name="image" id="image">
        <button type="submit" class="btn btn-primary" style="margin-top: 1rem">Kaydet</button>
  </div> 
  </form>


  <script>
    function validateForm() {
        const image = document.getElementById('inputimg').value.trim();

        if (!image) {
            alert('Lütfen bir resim seçin.');
            return false;
        }

        return true;
   }

   function updateImageName() {
       const fileInput = document.getElementById('inputimg');
       const file = fileInput.files[0];

       if (file) {
           const fileName = file.name;
           document.getElementById('image').value = fileName;
       }
   }
</script>

@endsection