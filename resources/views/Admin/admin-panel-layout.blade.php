<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script> --}}
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body>
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary sidebar">
        <a href="/admin-panel" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          <span class="fs-4">Admin-Panel</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <p class="nav-link dropdown-toggle bi" data-bs-toggle="dropdown" role="button" aria-expanded="false">Anasayfa</p>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/admin-panel/admin-homepage-list">Listeleme</a></li>
                <li><a class="dropdown-item" href="/admin-panel/admin-homepage-create">Yeni Oluştur</a></li>
            </ul>
          </li>
          <li>
            <p class="nav-link dropdown-toggle bi" data-bs-toggle="dropdown" role="button" aria-expanded="false">Bloglar</p>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/admin-panel/admin-blogs-list">Listeleme</a></li>
                <li><a class="dropdown-item" href="/admin-panel/admin-blogs-create">Yeni Oluştur</a></li>
            </ul>
          </li>
            <li class="dropdown">
              <p class="nav-link dropdown-toggle bi" data-bs-toggle="dropdown" role="button" aria-expanded="false">Hakkında</p>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/admin-panel/admin-about-list">Listeleme</a></li>
                <li><a class="dropdown-item" href="/admin-panel/admin-about-create">Yeni Oluştur</a></li>
              </ul>
          </li>
          <li class="dropdown">
            <p class="nav-link dropdown-toggle bi" data-bs-toggle="dropdown" role="button" aria-expanded="false">İletişim</p>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/admin-panel/admin-contact-list">Listeleme</a></li>
                <li><a class="dropdown-item" href="/admin-panel/admin-contact-create">Yeni Oluştur</a></li>
            </ul>
          </li>
        </ul>
        <hr>
      </div>

      <content>
        @yield("content")
      </content>

</body>  