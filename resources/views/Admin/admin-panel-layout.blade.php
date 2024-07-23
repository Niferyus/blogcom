<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
            <a href="#" class="nav-link active" aria-current="page">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
              Anasayfa
            </a>
          </li>
          <li>
            <a href="#" class="nav-link link-body-emphasis">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
              Bloglar
            </a>
          </li>
          <li>
            <a href="/admin-panel/admin-about" class="nav-link link-body-emphasis">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
              Hakkında
            </a>
          </li>
          <li>
            <a href="#" class="nav-link link-body-emphasis">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
              İletişim
            </a>
          </li>
        </ul>
        <hr>
      </div>

      <content>
        @yield("content")
      </content>

</body>  