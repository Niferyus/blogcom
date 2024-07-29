@extends('Admin.admin-panel-layout')

@section('content')

<form action="/admin-panel/admin-homepage-create" method="POST" onsubmit= "return validateForm()">
    @csrf
    <div class="container">
      <div class="form-group">
          <label for="title" class="form-label">Başlık</label>
          <textarea name="title" id="title" class="form-control" cols="30" rows="10" required></textarea>
      </div>
      <div class="container">
        <div class="form-group">
            <label for="text" class="form-label">Metin</label>
            <textarea name="text" id="text" class="form-control" cols="30" rows="10" required></textarea>
        </div>
        <div class="input-group">
          <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onchange="updateImageName()">
      </div>
      <input type="hidden" name="image" id="image">
        <button type="submit" class="btn btn-primary" style="margin-top: 1rem">Kaydet</button>
  </div> 
  </form>


  <script>
    function validateForm() {
        const image = document.getElementById('inputGroupFile04').value.trim();

        if (!image) {
            alert('Lütfen bir resim seçin.');
            return false;
        }

        const fileExtension = aboutImg.split('.').pop().toLowerCase();
        if (fileExtension !== 'jpg') {
            alert('Dosya jpg uzantılı değil.');
            return false;
        }

        return true;
   }

   function updateImageName() {
       const fileInput = document.getElementById('inputGroupFile04');
       const file = fileInput.files[0];

       if (file) {
           const fileName = file.name;
           const fileExtension = fileName.split('.').pop().toLowerCase();

           if (fileExtension === 'jpg') {
               document.getElementById('image').value = fileName;
           } else {
               alert('Dosya jpg uzantılı değil. Lütfen jpg uzantılı bir dosya seçin.');
               fileInput.value = ""; 
           }
       }
   }
</script>

@endsection