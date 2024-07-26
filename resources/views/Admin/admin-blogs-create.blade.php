@extends('Admin.admin-panel-layout')

@section('content')

    <form action="/admin-panel/admin-blogs-create" method="POST">
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="blogtitle" class="form-label">Blog Başlığı</label>
                <textarea name="blogtitle" id="blogtitle" class="form-control" cols="30" rows="2"></textarea>
            </div>
            <div class="form-group">
                <label for="blogtext" class="form-label">Blog Metini</label>
                <textarea name="blogtext" id="blogtext" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="blogimage" class="form-label">Blog Resim</label>
                <textarea name="blogimage" id="blogimage" class="form-control" cols="30" rows="1"></textarea>
            </div>
            <div class="form-group">
                <label for="blogwriter" class="form-label">Blog Yazarı</label>
                <textarea name="blogwriter" id="blogwriter" class="form-control" cols="30" rows="1"></textarea>
            </div>
                <label for="categoryname" class="form-label">Kategori</label>            
                <select name="categoryname" id="categoryname" class="form-select" aria-label="Default select example">
                    <option selected>Seçme menüsü</option>
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
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </div> 
    </form>
@endsection