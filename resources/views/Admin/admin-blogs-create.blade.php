@extends('Admin.admin-panel-layout')

@section('content')
<br><br><br>
    <form name="createblogform" id="createblogform" action="/admin-panel/admin-blogs-create" method="POST" enctype="multipart/form-data" onsubmit="return validateform()">
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="title" class="form-label">Blog Başlığı</label>
                <input type="text" name="title" id="title" class="form-control" maxlength="58" minlength="5" required></input>
            </div>
            <div class="form-group">
                <label for="text" class="form-label">Blog Metni</label>
                <textarea name="text" id="text" class="form-control ckeditor" cols="30" rows="10" minlength="100" required></textarea>
            </div>

            <div class="input-group">
                <input type="file" class="form-control" id="inputimg" name="image" accept="image/*" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onchange="updateImageName()">
            </div>
            <input type="hidden" name="image" id="image">

            <div class="form-group">
                <label for="writer" class="form-label">Blog Yazarı</label>
                <input name="writer" id="writer" class="form-control" maxlength="20" minlength="2" required></input>
            </div>
            <div class="form-group">
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
            </div>
            <button style="margin-top: 1rem" type="submit" class="btn btn-primary">Kaydet</button>
        </div> 
    </form>

    <script>
        function updateImageName(){
            const fileInput = document.getElementById('inputimg');
            const file = fileInput.files[0];

            if(file){
                const filename = file.name;
                document.getElementById('image').value = filename; 
            }
            else{
                alert("Lütfen resmi kontrol ediniz.")
            }
        }

        function validateform(){
            const image = document.getElementById("image").value.trim();
            const blogText = CKEDITOR.instances.text.getData().trim();
            
            if(!blogText){
                alert('Lütfen metni girin.');
                return false;
            }
            if(!image){
                alert("Lütfen bir resim seçiniz.")
                return false;
            }
            return true;
        }
    </script>
@endsection
