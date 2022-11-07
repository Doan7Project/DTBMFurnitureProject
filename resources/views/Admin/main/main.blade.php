@include('Admin.main.header')
<div class="position-relative p-3 shadow-sm d-flex justify-content-between">
  <!-- Nav tabs -->
  <div class="text-start">
    <label for="" class="fs-5">DMTB Furniture Project</label>
  </div>
  <div>
    <div class="btn-group">
      <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="bi bi-person-circle pe-2"></i>{{ session('user') }}
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{url('Admin/pages/Feedback_list')}}">Register</a></li>
        <li><a class="dropdown-item" href="{{url('Admin/pages/Feedback_list')}}">Change Password</a></li>

        <li>
          <hr class="dropdown-divider">
        </li>
        <a href="{{url('auth/logout')}}" class="dropdown-item"><i class="bi bi-box-arrow-left pe-2"></i>Logout</a>
        
      </ul>
    </div>
  </div>
</div>
<!-- ---------------------------End----------------------------- -->
<main class="d-flex flex-nowrap" style="height:100%;">
  <div class="d-flex flex-column flex-shrink-0 py-4 shadow-sm" style="width: 240px;">
    <div class="text-center pb-4">
      <i class="bi bi-person-workspace fs-1"></i>
      <h5>Administration</h5>
    </div>
    <h6 class="px-4 py-3 bg-primary bg-gradient text-light">Function Controller</h6>

    <ul class="list-group">
      <a href="{{url('Admin/index')}}"
        class="list-group-item border-0 px-4 list-group-item-action link-dark d-inline-flex text-decoration-none rounded"><i
          class="bi bi-house-door pe-2"></i>Home</a>
      <!-- Product Category -->
      <li class="mb-0 list-unstyled ">
        <button
          class="btn btn-toggle px-4 d-inline-flex align-items-center rounded border-0 list-group-item list-group-item-action"
          data-bs-toggle="collapse" data-bs-target="#Category" aria-expanded="false">
          <i class="bi bi-basket3 pe-2"></i>Category
        </button>
        <div class="collapse" id="Category">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{url('Admin/pages/Category_list')}}"
                class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">List Category</a></li>
            <li><a href="{{url('Admin/pages/Category_create')}}"
                class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">Create Category</a></li>
          </ul>
        </div>
      </li>
      <!-- End product category -->
      <!-- Product -->
      <li class="mb-0 list-unstyled ">
        <button
          class="btn btn-toggle  px-4 d-inline-flex align-items-center rounded border-0 list-group-item list-group-item-action"
          data-bs-toggle="collapse" data-bs-target="#product" aria-expanded="false">
          <i class="bi bi-box-seam pe-2"></i>Products
        </button>
        <div class="collapse" id="product">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{url('product/list')}}"
                class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">List Product</a></li>
            <li><a href="{{url('product/create')}}"
                class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">Create Product</a></li>
          </ul>
        </div>
      </li>
      <!-- End product -->
      <!-- Product Thumb -->
      <li class="mb-0 list-unstyled ">
        <button
          class="btn btn-toggle px-4 d-inline-flex align-items-center rounded border-0 list-group-item list-group-item-action"
          data-bs-toggle="collapse" data-bs-target="#thumb" aria-expanded="false">
          <i class="bi bi-card-image pe-2"></i>Product Thumb
        </button>
        <div class="collapse" id="thumb">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{url('image/list')}}"
                class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">List Thumb</a></li>
            <li><a href="{{url('image/create')}}"
                class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">Create Thumb</a></li>
          </ul>
        </div>
      </li>
      <!-- End product thumb-->
      <!--about -->
      <li class="mb-0 list-unstyled ">
        <button
          class="btn btn-toggle  px-4 d-inline-flex align-items-center rounded border-0 list-group-item list-group-item-action"
          data-bs-toggle="collapse" data-bs-target="#about" aria-expanded="false">
          <i class="bi bi-file-earmark-person pe-2"></i>Customer
        </button>
        <div class="collapse" id="about">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{url('/customer/list')}}"
                class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">List Information</a></li>
          </ul>
        </div>
      </li>

      <li class="mb-0 list-unstyled mb-2">
        <button
          class="btn btn-toggle  px-4 d-inline-flex align-items-center rounded border-0 list-group-item list-group-item-action"
          data-bs-toggle="collapse" data-bs-target="#slide" aria-expanded="false">
          <i class="bi bi-file-easel pe-2"></i>Slides
        </button>
        <div class="collapse" id="slide">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{url('Admin/pages/Slider_list')}}"
                class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">List Slides</a></li>
            <li><a href="{{url('Admin/pages/Slider_create')}}"
                class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">Create Slides</a></li>
          </ul>
        </div>
      </li>
      <!-- End Slide-->
      <!-- information detail -->

      <h6 class="px-4 py-3 bg-primary bg-gradient text-light">Information</h6>

      <li class="mb-0 list-unstyled ">
        <button
          class="btn btn-toggle  px-4 d-inline-flex align-items-center rounded border-0 list-group-item list-group-item-action"
          data-bs-toggle="collapse" data-bs-target="#order" aria-expanded="false">
          <i class="bi bi-info-square pe-2"></i>Order Information
        </button>
        <div class="collapse" id="order">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{url('Admin/pages/Order_list')}}"
                class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">Order List</a></li>
                <li><a href="{{url('Admin/pages/report')}}"
                  class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">Report</a></li>
          </ul>
        </div>
      </li>

      <li class="list-unstyled">
        <button
          class="btn btn-toggle px-4 d-inline-flex align-items-center rounded border-0 list-group-item list-group-item-action"
          data-bs-toggle="collapse" data-bs-target="#feedback" aria-expanded="false">
          <i class="bi bi-megaphone pe-2"></i>Feedback Information
        </button>
        <div class="collapse" id="feedback">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{url('Admin/pages/Feedback_list')}}"
                class="link-dark px-5 pt-2 d-inline-flex text-decoration-none rounded">Feedback List</a></li>
          </ul>
        </div>
      </li>
    </ul>
    <hr>


  </div>
  <div class="mt-5 m-auto">
    @yield('content')
  </div>
</main>
@include('Admin.main.footer')