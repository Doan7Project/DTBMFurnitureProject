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
</style>

<section class="pt-5 pb-3">
  <div class=" p-3 mb-5 bg-body rounded">
    <div class="boxLogo  rounded">
      <img style="width:130px; "  src="images/mim.png" alt="">
    </div>
    <div class="row">
      <div class="text-right pe-4">
        <a class="btn btn-outline-secondary shadow-none mb-3 mr-1" href="#carouselExampleIndicators2" role="button"
          data-slide="prev">
          <i class="bi bi-caret-left-fill"></i>
        </a>
        <a class="btn btn-outline-secondary shadow-none mb-3 " href="#carouselExampleIndicators2" role="button"
          data-slide="next">
          <i class="bi bi-caret-right-fill"></i>
        </a>
      </div>
      <!-- start -->
      <div class="col-lg-3">
        <div class="shadow-none px-4 py-4">
          <div class="cursor">
            <span class="fs-5 fw-bolder">FEATURED PRODUCTS</span>
            {{-- <span class="fs-5">Why we were are the best store</span> --}}
            <p class="py-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt
              atque unde
              est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!
            </p>
            <div class="d-flex">
              <div>
                <a href="{{ route('product') }}" class="text-decoration-none text-secondary">See all products</a>
              </div>

              <i class="mymove bi bi-arrow-right-short fw-bolder text-secondary"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9">

        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            {{-- formain --}}
            <div class="carousel-item active">
              <div class="row">
                {{-- --repeat --}}
                @foreach ($product as $key => $products)
                @if ($products->models == "Featured_1" && $products->status == "0") <div class="col-md-3 mb-3">
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
                          <li><small class="text-muted">{{ $products->product_categories->CategoryName }}</small></li>
                          <li>
                            <h6 class="fw-bolder fs-5" style="color: rgb(61, 61, 61)"><span
                                class="fw-bolder-none fs-6">$</span>{{ $products->price }}<span
                                class="fw-bolder-none fs-6">.00</span> </h6>
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
            </div>

            <div class="carousel-item">
              <div class="row ">
                @foreach ($product as $key => $products)
                @if ($products->models == "Featured_2" && $products->status == "0")
                <div class="col-md-3 mb-3">
                  <div class="card">
                    <div class="cover">

                    </div>

                    <div class="imgstyle">
                      <img class="img-fluid" alt="100%x280" src="{{ $products->images }}">
                      <a href="{{url("/orderdetail/{$products->id}")}}" class="btn btn-success shadow-none">Shopping Now</a>
                    </div>
                    <div class="card-body text-center">
                      <div>
                        <ul class="list-unstyled">
                          <li>
                            <h5>{{ $products->product_name }}</h5>
                          </li>
                          <li>
                          </li>
                          @foreach ($category as $categorys)
                          @if ($products->category_id == $categorys->id)
                          <li><small class="text-muted">{{ $categorys->CategoryName }}</small></li>
                          @endif
                          @endforeach
                          <li>
                            <h6 class="fw-bolder fs-5" style="color: rgb(61, 61, 61)"><span
                                class="fw-bolder-none fs-6">$</span>{{ $products->price }}<span
                                class="fw-bolder-none fs-6">.00</span> </h6>
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
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</section>