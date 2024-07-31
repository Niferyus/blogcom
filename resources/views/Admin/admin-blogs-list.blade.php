@extends('Admin.admin-panel-layout')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">title</th>
        <th scope="col">text</th>
        <th scope="col">image</th>
        <th scope="col">writer</th>
        <th scope="col">categoryid</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $blog)
        <tr>
            <th scope="row">{{ $blog->id }}</th>
            <td>{{ $blog->title }}</td>
            <td>{!! Str::limit($blog->text, 10, '...') !!}</td>
            <td>{{ $blog->image }}</td>
            <td>{{ $blog->writer }}</td>
            <td>{{ $blog->categoryid }}</td>
            <td>
              <form action="{{ route('blogs-delete', $blog->id) }}" method="POST" onsubmit="return confirm('Bu kaydı silmek istediğinize emin misiniz?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Sil</button>
              </form>
            </td>
            <td>
              <a class="btn btn-primary" href="{{ route('blogs-edit', $blog->id) }}">Düzenle</a>
            </td>
        </tr>      
        @endforeach
      
    </tbody>
  </table>

@endsection