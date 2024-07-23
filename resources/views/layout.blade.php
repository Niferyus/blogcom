<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>Stand Blog Posts</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/assets/css/user-layout.css">
    {{-- <link rel="stylesheet" href="assets/css/templatemo-stand-blog.css"> --}}
    {{-- <link rel="stylesheet" href="assets/css/owl.css"> --}}
</head>
<body>

    <!-- Header -->
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/" style="color: white">Anasayfa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/blogs" style="color: white">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about" style="color: white">Hakkımızda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact" style="color: white">İletişim</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <main>
        @yield("content")
    </main>

    <footer class="navbar sticky-bottom bg-dark bg-body-tertiary" style="margin-top: 1rem">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <div>
                @foreach ($socialmedialinks as $socialmedialink )  
                    <a style="margin-right: 0.5rem; font-size:1.5rem" href="{{ $socialmedialink->facebooklink }}" ><i class="bi bi-facebook"></i></a>
                    <a style="margin-right: 0.5rem; font-size:1.5rem" href="{{ $socialmedialink->twitterlink }}"><i class="bi bi-twitter"></i></a>
                    <a style="font-size:1.5rem" href="{{ $socialmedialink->instagramlink }}"><i class="bi bi-instagram"></i></a>
                @endforeach  
            </div>
        </div>
    </footer> 

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>   