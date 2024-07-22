@extends('layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $blog->title }}</title>
    <style>
        .main-content {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            background-color: #f5f5f5;
            min-height: calc(100vh - 100px);
        }

        .blog-container {
            text-align: center;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            transition: transform 0.2s;
        }

        .blog-container:hover {
            transform: translateY(-5px);
        }

        .blog-container .title {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #333;
            font-weight: 700;
        }

        .blog-container .image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .blog-container .text {
            font-size: 1.2em;
            line-height: 1.8;
            color: #555;
            text-align: justify;
        }

        @media (max-width: 768px) {
            .blog-container .title {
                font-size: 2em;
            }

            .blog-container .text {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
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
</body>
</html>

@endsection