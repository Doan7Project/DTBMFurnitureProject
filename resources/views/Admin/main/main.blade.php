<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Administation</title>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <meta name="theme-color" content="#712cf9">
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }
  </style>
</head>

<body>


  <main class="d-flex flex-nowrap" style="height:auto;">
    <div class="d-flex flex-column flex-shrink-0 py-4 border border-1" style="width: 250px;">
      <div class="text-center pb-4">
        <i class="bi bi-person-workspace fs-1"></i>
        <h5>Administration</h5>
      </div>
      <h6 class="px-4 py-3 bg-success text-light">Function Controller</h6>

      <ul class="list-group">
          <a href="{{url('/')}}" class="list-group-item border-0 px-4 list-group-item-action link-dark d-inline-flex text-decoration-none rounded">Home</a>
        <!-- Product Category -->
        <li class="mb-0 list-unstyled ">
          <button class="btn btn-toggle px-4 d-inline-flex align-items-center rounded border-0 list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#Category" aria-expanded="false">
            Product Category
          </button>
          <div class="collapse" id="Category">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="{{url('Admin/pages/Category_list')}}" class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">List Category</a></li>
              <li><a href="{{url('Admin/pages/Category_create')}}" class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">Create Category</a></li>
            </ul>
          </div>
        </li>
        <!-- End product category -->
        <!-- Product -->
        <li class="mb-0 list-unstyled ">
          <button class="btn btn-toggle  px-4 d-inline-flex align-items-center rounded border-0 list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#product" aria-expanded="false">
            Products
          </button>
          <div class="collapse" id="product">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="{{url('Admin/pages/Product_list')}}" class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">List Product</a></li>
              <li><a href="{{url('Admin/pages/Product_create')}}" class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">Create Product</a></li>
            </ul>
          </div>
        </li>
        <!-- End product -->
        <!-- Product Thumb -->
        <li class="mb-0 list-unstyled ">
          <button class="btn btn-toggle px-4 d-inline-flex align-items-center rounded border-0 list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#thumb" aria-expanded="false">
            Product Thumb
          </button>
          <div class="collapse" id="thumb">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="{{url('Admin/pages/Thumb_list')}}" class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">List Thumb</a></li>
              <li><a href="{{url('Admin/pages/Thumb_create')}}" class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">Create Thumb</a></li>
            </ul>
          </div>
        </li>
        <!-- End product thumb-->
        <!--about -->
        <li class="mb-0 list-unstyled ">
          <button class="btn btn-toggle  px-4 d-inline-flex align-items-center rounded border-0 list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#about" aria-expanded="false">
            About page
          </button>
          <div class="collapse" id="about">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="{{url('Admin/pages/About_list')}}" class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">List Information</a></li>
              <li><a href="{{url('Admin/pages/About_create')}}" class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">Create Information</a></li>
            </ul>
          </div>
        </li>
        <!-- End about-->
        <!-- Product contact -->
        <li class="mb-0 list-unstyled ">
          <button class="btn btn-toggle px-4 d-inline-flex align-items-center rounded border-0 list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#contact" aria-expanded="false">
            Contact page
          </button>
          <div class="collapse" id="contact">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="{{url('Admin/pages/Contact_list')}}" class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">List Contact</a></li>
              <li><a href="{{url('Admin/pages/Contact_create')}}" class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">Create Information</a></li>
            </ul>
          </div>
        </li>
        <!-- End contact-->
        <!-- Slide -->
        <li class="mb-0 list-unstyled mb-2">
          <button class="btn btn-toggle  px-4 d-inline-flex align-items-center rounded border-0 list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#slide" aria-expanded="false">
            Slides
          </button>
          <div class="collapse" id="slide">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="{{url('Admin/pages/Slider_list')}}" class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">List Slides</a></li>
              <li><a href="{{url('Admin/pages/Slider_create')}}" class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">Create Slides</a></li>
            </ul>
          </div>
        </li>
        <!-- End Slide-->
        <!-- information detail -->

        <h6 class="px-4 py-3 bg-success text-light">Information</h6>

        <li class="mb-0 list-unstyled ">
          <button class="btn btn-toggle  px-4 d-inline-flex align-items-center rounded border-0 list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#order" aria-expanded="false">
            Order Information
          </button>
          <div class="collapse" id="order">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="{{url('Admin/pages/Order_list')}}" class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">Order List</a></li>
            </ul>
          </div>
        </li>

        <li class="mb-0 list-unstyled ">
          <button class="btn btn-toggle px-4 d-inline-flex align-items-center rounded border-0 list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#feedback" aria-expanded="false">
            Feedback Information
          </button>
          <div class="collapse" id="feedback">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="{{url('Admin/pages/Feedback_list')}}" class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">Feedback List</a></li>
            </ul>
          </div>
        </li>
      </ul>
      <hr>
      <a href="" class="px-4 text-decoration-none text-secondary fw-bolder">Logout</a>
    </div>
    <div class="d-flex justify-content-center m-auto align-items-center">
      @yield('content')
    </div>
  </main>
</body>

</html>