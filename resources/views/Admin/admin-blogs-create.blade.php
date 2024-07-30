@extends('Admin.admin-panel-layout')

@section('content')
       
    <form name="createblogform" id="createblogform" action="/admin-panel/admin-blogs-create" method="POST" onsubmit="return validateform()">
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="title" class="form-label">Blog Başlığı</label>
                <textarea name="title" id="title" class="form-control ckeditor" cols="30" rows="2" required></textarea>
            </div>
            <div class="form-group">
                <label for="text" class="form-label">Blog Metini</label>
                <textarea name="text" id="text" class="form-control ckeditor" cols="30" rows="10" required></textarea>
            </div>

            <div class="input-group">
            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onchange="updateImageName()">
        </div>
        <input type="hidden" name="image" id="image">

            <div class="form-group">
                <label for="writer" class="form-label">Blog Yazarı</label>
                <textarea name="writer" id="writer" class="form-control ckeditor" cols="30" rows="1" required></textarea>
            </div>
                <label for="categoryid" class="form-label">Kategori</label>            
                <select name="categoryid" id="categoryid" class="form-select" aria-label="Default select example">
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

    <script>
        function updateImageName(){
            const fileInput = document.getElementById('inputGroupFile04');
            const file = fileInput.files[0];

            if(file){
                const filename = file.name;
                const fileExtension = filename.split('.').pop().toLowerCase();

                if(fileExtension === 'jpg'){
                    document.getElementById('image').value = filename;
                }
                else{
                    alert('Dosya jpg uzantılı değil. Lütfen jpg uzantılı bir dosya seçin.');
                    fileInput.value = ""; 
                }
            }
        }

        function validateform(){
            const image = document.getElementById("image").value.trim();
       
            if(!image){
                alert("Lütfen bir resim seçiniz.")
                return false;
            }
            return true;
        }

    </script>
@endsection