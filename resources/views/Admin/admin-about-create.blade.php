@extends('Admin.admin-panel-layout')

@section('content')

<form name="createaboutform" id="createaboutform" method="POST" action="/admin-panel/admin-about-create" onsubmit= "return validateForm()" >
    @csrf
    <div class="container">
        <div class="form-group">
            <label for="abouttext" class="form-label">Hakkında Metin</label>
            <textarea name="abouttext" id="abouttext" cols="30" rows="10" class="ckeditor" required></textarea>
        </div>
        <div class="input-group">
            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onchange="updateImageName()">
        </div>
        <input type="hidden" name="aboutimg" id="aboutimg">
        <button type="submit" class="btn btn-primary" style="margin-top: 1rem">Kaydet</button>
    </div> 
</form>

<script>
     function validateForm() {
         const aboutText = document.getElementById('abouttext').value.trim();
         const aboutImg = document.getElementById('aboutimg').value.trim();

         if (!aboutText) {
             alert('Lütfen hakkında metni girin.');
             return false;
         }

         if (!aboutImg) {
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
                document.getElementById('aboutimg').value = fileName;
            } else {
                alert('Dosya jpg uzantılı değil. Lütfen jpg uzantılı bir dosya seçin.');
                fileInput.value = ""; 
            }
        }
    }
</script>

@endsection
