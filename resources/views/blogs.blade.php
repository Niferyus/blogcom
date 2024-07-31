@extends('layout')

@section('content')
<div class="container-fluid p-3" style="background-color: bisque;">
  <div class="d-flex justify-content-center align-items-center" style="height: 80px;">
    <p class="font-size: 2.5rem; h1 mb-0">Bloglar</p>
  </div>
</div>

<form class="d-flex justify-content-center" role="search" style="width: 50%">
  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<div class="container mt-4">
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach ($blogsarray as $blog)
    <div class="col-lg-4 col-md-6" style="margin-bottom: 1rem">
      <div class="card h-100 border-0 shadow-sm rounded-3">
        <a href="{{ route('blog-details-route', $blog->id) }}">
          <img src="/assets/images/{{ $blog->image }}" class="card-img-top" alt="{{ $blog->title }}">
        </a>
        <div class="card-body">
          <a href="{{ route('blog-details-route', $blog->id) }}" class="card-title text-dark text-decoration-none h4">{{ $blog->title }}</a>
          <p class="card-text">{!! Str::limit($blog->text, 100, '...') !!}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  
  <div class="d-flex justify-content-center mt-4">
    {{ $blogsarray->links('pagination::bootstrap-4') }}
  </div>
</div>
@endsection
