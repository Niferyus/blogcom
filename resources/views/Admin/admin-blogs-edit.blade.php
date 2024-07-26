@extends('Admin.admin-panel-layout')

@section('content')

<form action="/admin-panel/admin-blogs-edit/{{ $blog->id }}" method="POST">
    @csrf
    <div class="container">
        <div class="form-group">
            <label for="title" class="form-label">Blog Başlığı</label>
            <textarea name="title" id="title" class="form-control" cols="30" rows="2">{{ $blog->title }}</textarea>
        </div>
        <div class="form-group">
            <label for="text" class="form-label">Blog Metini</label>
            <textarea name="text" id="text" class="form-control" cols="30" rows="10">{{ $blog->text }}</textarea>
        </div>
        <div class="form-group">
            <label for="image" class="form-label">Blog Resim</label>
            <textarea name="image" id="image" class="form-control" cols="30" rows="1">{{ $blog->image }}</textarea>
        </div>
        <div class="form-group">
            <label for="writer" class="form-label">Blog Yazarı</label>
            <textarea name="writer" id="writer" class="form-control" cols="30" rows="1">{{ $blog->writer }}</textarea>
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

@endsection