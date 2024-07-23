@extends('layout')
@section('content')

    <main class="main-content">
        <section class="blog-container">
            <div class="title">
                {{ $blog->title }}
            </div>
            <div class="image">
                <img src="{{ asset('assets/images/' . $blog->image) }}" alt="{{ $blog->title }}">
            </div>
            <div class="text">
                <p>{{ $blog->text }}</p>
            </div>
        </section>
    </main>  

@endsection