@extends('layout')

@section('content')

<div style="background-color: bisque; padding: 20px; text-align: center;">
 <h1 style="font-size: 2.5rem;">{{ $info->title }}</h1>
  <p style="font-size: 1.5rem;">{{$info->text}}</p>
  <img src="assets/images/{{$info->image}}" alt="Banner" style="width: 100%; margin-top: 20px;">
</div>


<div class="container mt-5">
  <div class="row">
    @foreach ($blogs as $blog)
      <div class="col-md-4 d-flex align-items-stretch" style="margin-top: 1rem; margin-bottom: 1rem ">
        <div class="card mb-4 h-100" >
          <a href="{{ route('blog-details-route', $blog->id) }}">
          <img src="/assets/images/{{ $blog->image }}" class="card-img-top" alt="{{ $blog->title }}" style="object-fit: cover; height: 200px;">
          <div class="card-body d-flex flex-column">
            <a href="{{ route('blog-details-route', $blog->id) }}" class="card-title text-dark text-decoration-none h4">{{ $blog->title }}</a>
            <p class="card-text">{{ $blog->summary }}</p>
            <a href="{{  route('blog-details-route', $blog->id)  }}" class="btn btn-primary mt-auto">Devamını Oku</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection