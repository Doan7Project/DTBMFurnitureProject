@extends('User.main.main')
@section('content')

<style>
  .card {
    box-shadow: 0 4px 8px 0 rgba(75, 74, 74, 0.2);
    margin: auto;
  }
.body-secsion{
  background-color: #e5e9f220;
}
  .about-section {
    padding: 50px;
    text-align: center;
    background-color: #434e66;
    color: white;
  }
  .section {

    text-align: center;

    color: rgb(38, 37, 37);
  }

  .container {
    padding: 0 16px;
  }

  .container::after,
  .row::after {
    content: "";
    clear: both;
    display: table;
  }

  .title {
    color: grey;
  }

  .button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
  }

  .button:hover {
    background-color: #555;
  }

  @media screen and (max-width: 650px) {
    .column {
      width: 100%;
      display: block;
    }
  }
</style>

<div class="body-secsion">
  <div class="about-section bg-gradient">
  
    <h1 class="fw-bolder">ABOUT US</h1>
  
    <p class="text-white-50 p-4">
  
      Furniture.com is the online store for some of the largest furniture retailers in the U.S. We offer a vast assortment
      of styles in an amazing variety of categories – furniture, rugs, art, lamps, home décor and more. Our stylish
      designer-picks are curated in an easy to browse way, allowing you quick and easy access to search all of our styles
      in the comfort of your home. This allows you to have the luxury of comparing furniture options, measuring exactly
      what will fit your space with delivery right to your door! We carry high end, high value, and everything in between.
    </p>
  
  </div>

  <h2 class="section pt-3 pb-3 text-center bg-gradient">Our Team</h2>
  
  <div class=" m-auto p-4">
    <div class="row">
      <div class="col-lg-3">
        <div class="card" style="width: 20rem;">
          <img src="{{ asset('images/doan.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Phạm Anh Đoàn</h5>
            <p class="card-text text-muted">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
  
          </div>
          <a href="#" class="btn btn-primary bg-gradient w-100">
            <div class="product-rating">
  
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-half"></i>
  
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card" style="width: 20rem;">
          <img src="{{ asset('images/thanh.png') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Khương Xuân Thanh</h5>
            <p class="card-text text-muted">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
  
          </div>
          <a href="#" class="btn btn-primary bg-gradient w-100">
            <div class="product-rating">
  
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-half"></i>
  
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card" style="width: 20rem;">
          <img src="{{ asset('images/bao.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Phan Như Bảo</h5>
            <p class="card-text text-muted">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
  
          </div>
          <a href="#" class="btn btn-primary bg-gradient w-100">
            <div class="product-rating">
  
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-half"></i>
  
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card" style="width: 20rem;">
          <img src="{{ asset('images/Minh.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Trần Nhật Minh</h5>
            <p class="card-text text-muted">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
  
          </div>
          <a href="#" class="btn btn-primary bg-gradient w-100">
            <div class="product-rating">
  
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-half"></i>
  
            </div>
          </a>
        </div>
      </div>
  
  
    </div>
  </div>
  
</div>

{{-- <h2 class="about-section pt-2 pb-2 text-center bg-gradient"></h2> --}}



@endsection