@extends('Admin.admin-panel-layout')

@section('content')

<form name="createaboutform" id="createaboutform" method="POST" action="/admin-panel/admin-about-create" 
enctype="multipart/form-data"
onsubmit="return validateForm()">
    @csrf
    <div class="container">
        <div class="form-group">
            <label for="abouttext" class="form-label">Hakkında Metin</label>
            <textarea name="abouttext" id="abouttext" cols="30" rows="10" minlength="100" class="form-control ckeditor" required></textarea>
        </div>
        <div class="input-group">
            <input type="file" class="form-control" name="aboutimg" id="inputimg" accept="image/*" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onchange="updateImageName()" required>
        </div>
        <input type="hidden" name="aboutimg" id="aboutimg">
        <button type="submit" class="btn btn-primary" style="margin-top: 1rem">Kaydet</button>
    </div> 
</form>

<script>
    function validateForm() {
        const aboutText = CKEDITOR.instances.abouttext.getData().trim();
        const aboutImg = document.getElementById('inputimg').value.trim();

        if (!aboutText) {
            alert('Lütfen hakkında metni girin.');
            return false;
        }

        if (!aboutImg) {
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
            document.getElementById('aboutimg').value = fileName;
        } else {
            alert("Resmi kontrol ediniz.");
        }
    }
</script>

@endsection
