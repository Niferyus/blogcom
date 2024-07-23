
<body>
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary sidebar">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          <span class="fs-4">Admin-Panel</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page" onclick="loadContent('home')">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
              Anasayfa
            </a>
          </li>
          <li>
            <a href="#" class="nav-link link-body-emphasis" onclick="loadContent('dashboard')">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
              Bloglar
            </a>
          </li>
          <li>
            <a href="#" class="nav-link link-body-emphasis" onclick="loadContent('orders')">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
              Hakkında
            </a>
          </li>
          <li>
            <a href="#" class="nav-link link-body-emphasis" onclick="loadContent('products')">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
              İletişim
            </a>
          </li>
        </ul>
        <hr>
      </div>
      <div class="content" id="content">
        <h1>Welcome to the Admin Panel</h1>
        <p>Select an option from the sidebar to get started.</p>
      </div>

    <script>
        function loadContent(page) {
            const content = document.getElementById('content');
            let htmlContent = '';

            switch(page) {
                case 'home':
                    htmlContent = '<h1>Home</h1><p>This is the home page.</p>';
                    break;
                case 'dashboard':
                    htmlContent = '<h1>Dashboard</h1><p>This is the dashboard page.</p>';
                    break;
                case 'orders':
                    htmlContent = '<h1>Orders</h1><p>This is the orders page.</p>';
                    break;
                case 'products':
                    htmlContent = '<h1>Products</h1><p>This is the products page.</p>';
                    break;
                default:
                    htmlContent = '<h1>Welcome to the Admin Panel</h1><p>Select an option from the sidebar to get started.</p>';
            }

            content.innerHTML = htmlContent;
        }
    </script>
</body>
</html>
