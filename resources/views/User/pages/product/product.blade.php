@extends('User.main.main')
@section('content')
<style>
  section {
    position: relative;
    margin-top: 90px;
  }

  .imgstyle {
    cursor: pointer;
    position: relative;
    overflow: hidden;

  }

  .card {
    height: auto;
    transition: 0.4s;
    border: 1px solid rgb(238, 238, 238);
    position: relative;
    cursor: pointer;
  }

  .cover {
    background-color: #158fb41e;

    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
  }

  .card:hover .cover {
    opacity: 1;
    z-index: 1;
    transition: 0.4s ease-in-out;
  }

  .card:hover {
    transition: 0.4s;


  }

  .card:hover img {
    transform: scale(1.05);
    transition: 0.4s ease-in-out;
  }

  .imgstyle .btn {
    position: absolute;
    left: 50%;
    top: 100%;
    transform: translate(-50%, -100%);
    border: none;
    background-color: transparent;
    border-radius: 5px;
    color: rgb(39, 131, 216);
    padding: 6px 10px;
    transition: 0.4s;
    opacity: 0;
  }



  .imgstyle .btn:hover {
    /* background-color: #50a4aff6; */
    color: rgb(13, 87, 172);
  }

  .card:hover .btn {
    opacity: 1;
    z-index: 2;
  }

  .boxLogo {
    width: 100px;
    height: auto;
    position: absolute;
    top: 0%;
    left: 10%;
    padding: 2px;
  }

  .cursor {
    cursor: pointer;
  }

  .cursor:hover {
    color: #4d9385;
    transition: 0.4s ease-in-out;
  }

  .mymove {
    position: relative;
    animation: mymoves 2s infinite;
    color: rgb(250, 250, 250);
    font-size: 18px;
  }

  @keyframes mymoves {
    from {
      left: 0px;
    }

    to {
      left: 20px;
    }
  }
  .body{
    background-color: #f3f3f310;
  }
</style>
<!-- feature -->
<div>
  <img class="w-100" src="{{ asset('images/salesoff4.jpg') }}" alt="">
 </div>
<div class="body pt-5 pb-5">
<div>
  @include('User.pages.product.header')
</div>
<div class="container bg-white">

  <div>
    @include('User.pages.product.search')
  </div>
  {{-- {{ $getproduct->links('User.pages.product.my-paginate')}} --}}
  <div class="row">
    @php $count = 0;
    @endphp
    @foreach ($getproduct as $key => $products)
    @if(Session::get('link') > 0)
    @if ($products->status == "0" && $products->category_id == Session::get('link'))
    <div class="col-md-3 mb-3">
      <div class="card shadow-none">
        <div class="cover">

        </div>
        @php $count++;
        @endphp
        <div class="imgstyle">
          <img class="img-fluid" alt="100%x280" src="{{ $products->images }}">

          <a href="{{url("/orderdetail/{$products->id}")}}" class="btn btn-success shadow-none">Shopping now

          </a>
        </div>
        <div class="card-body text-center">
          <div>
            <ul class="list-unstyled">
              <li>
                <h5>{{ $products->product_name }}</h5>
              </li>
              <li><small class="text-muted">{{ $products->product_categories->CategoryName  }}</small></li>
              <li>
                <h6 class="fw-bolder fs-5" style="color: rgb(61, 61, 61)"><span class="fw-bolder-none fs-6">$</span>{{
                  $products->price }}<span class="fw-bolder-none fs-6">.00</span> </h6>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    @endif

    @else
    <div class="col-md-3 mb-3">
      <div class="card shadow-none">

        <div class="cover">

        </div>
        <div class="imgstyle">
          <img class="img-fluid" alt="100%x280" src="{{ $products->images }}">

          <a href="{{url("/orderdetail/{$products->id}")}}" class="btn btn-success shadow-none">Shopping now

          </a>
        </div>
        <div class="card-body text-center">
          <div>
            <ul class="list-unstyled">
              <li>
                <h5>{{ $products->product_name }}</h5>
              </li>

              @foreach ($category as $categorys)
              @if ($products->category_id == $categorys->id)
              <li><small class="text-muted">{{ $categorys->CategoryName }}</small></li>
              @endif
              @endforeach
              <li>
                <h6 class="fw-bolder fs-5" style="color: rgb(61, 61, 61)"><span class="fw-bolder-none fs-6">$</span>{{
                  $products->price }}<span class="fw-bolder-none fs-6">.00</span> </h6>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>
    @endif
    @endforeach
    {{-- end repeat --}}

  </div>
  <div>


  </div>
</div>
</div>
@endsection