<style>
    .boxout {
        display: grid;
        grid-template-columns: auto auto auto;
        justify-content: center;

    }

    .boxout .card {
        width: 370px;
        height: 600px;
        border: none;
        text-align: left;
    }

    .boxout div div {
        overflow: hidden;
    }

    .boxout div .boxcontent h4 {
        color: rgb(255, 255, 255);
    }

    .boxout div .boxcontent p {
        color: rgb(78, 78, 78);
    }

    .boxout div .boxcontent div div a {
        color: rgb(235, 235, 235);
        text-decoration: none;

    }

    .boxout div .boxcontent div div a:hover {
        color: rgb(255, 255, 255);
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




    img {
        transition: 0.4s;
    }

    .boxout>div:hover>div>img {
        transform: scale(1.05);
        transition: 0.4s ease-in-out;
    }

    .boxcard1 {
        transform: translateY(15%);
        background-color: rgb(43, 225, 238);
    }

    .boxcard2 {
        transform: translateY(15%);
        background-color: rgb(21, 203, 209);
    }

    .boxcard3 {
        transform: translateY(15%);
        background-color: rgb(20, 186, 192);
    }

    .boxcard1:hover {
        transform: translateY(0%);

    }

    .boxcard2:hover {
        transform: translateY(0%);
    }


    .boxcard3:hover {
        transform: translateY(0%);
    }

    .blur {
        filter: blur(8px);
        -webkit-filter: blur(8px);
    }

    .poplular {
        padding-bottom: 100px;
    }

    @media only screen and (max-width: 980px) {
        .boxout {

            grid-template-columns: auto;


        }

        .boxcard1,
        .boxcard2,
        .boxcard3 {
            transform: translateY(0%);
            margin-top: 5px;
        }
    }
</style>

<main>

    <section class="poplular text-center container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="fw-light">Popular Products</h1>
                <p class="lead text-muted text-center">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda quibusdam quidem dolor ea
                    quisquam fugit qui ratione. Ut eius sed perspiciatis labore eaque. Rerum sint quidem officiis sit
                    soluta dolore?
                </p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>

            </div>
            <div class="boxout">
                @foreach ($product as $key => $products)
                @if ($products->models == "popular_1" && $products->status == "0")
                <div id="boxcard1" class="boxcard1 shadow-none card bg-gradient">
                    <div>
                        <img class="img-fluid" src="{{ $products->images }}" alt="">
                    </div>
                    <div class="boxcontent pt-3 px-4">
                        <h4>{{ $products->product_name }}</h4>
                        <p class="text-justify">{{ $products->description }}</p>
                        <div class="d-flex">
                            <div>
                                <a href="{{ route('product') }}">Continue to shopping</a>
                            </div>

                            <i class="mymove bi bi-arrow-right-short fw-bolder"></i>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @foreach ($product as $key => $products)
                @if ($products->models == "popular_2" && $products->status == "0")
                <div id="boxcard2" class="boxcard2 shadow-none card bg-gradient">
                    <div>
                        <img class="img-fluid" src="{{ $products->images }}" alt="">
                    </div>
                    <div class="boxcontent pt-3 px-4">
                        <h4>{{ $products->product_name }}</h4>
                        <p class="text-justify">{{$products->description}}</p>
                        <div class="d-flex">
                            <div>
                                <a href="{{ route('product') }}">Continue to shopping</a>
                            </div>

                            <i class="mymove bi bi-arrow-right-short fw-bolder"></i>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @foreach ($product as $key => $products)
                @if ($products->models == "popular_3" && $products->status == "0")
                <div id="boxcard3" class="boxcard3 shadow-none card bg-gradient">
                    <div>
                        <img class="img-fluid" src="{{ $products->images }}" alt="">
                    </div>
                    <div class="boxcontent pt-3 px-4">
                        <h4>{{ $products->product_name }}</h4>
                        <p class="text-justify">{{ $products->description }}</p>
                        <div class="d-flex">
                            <div>
                                <a href="{{ route('product') }}">Continue to shopping</a>
                            </div>

                            <i class="mymove bi bi-arrow-right-short fw-bolder"></i>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
    </section>
</main>
<script>
    $(document).ready(function () {
        $("#boxcard1").mouseover(function () { 
        //    $(".boxcard2").css({"filter": "blur(1px)", " -webkit-filter": "blur(1px)"});
        //    $(".boxcard3").css({"filter": "blur(1px)", " -webkit-filter": "blur(1px)"});
           $(".boxcard2").css({"opacity": "0.5"});
           $(".boxcard3").css({"opacity": "0.5"});
        });
        $("#boxcard2").mouseover(function () { 
        //    $(".boxcard1").css({"filter": "blur(1px)", " -webkit-filter": "blur(1px)"});
        //    $(".boxcard3").css({"filter": "blur(1px)", " -webkit-filter": "blur(1px)"});
           $(".boxcard1").css({"opacity": "0.5"});
           $(".boxcard3").css({"opacity": "0.5"});
        });
        $("#boxcard3").mouseover(function () { 
        //    $(".boxcard2").css({"filter": "blur(1px)", " -webkit-filter": "blur(1px)"});
        //    $(".boxcard1").css({"filter": "blur(1px)", " -webkit-filter": "blur(1px)"});
           $(".boxcard1").css({"opacity": "0.5"});
           $(".boxcard2").css({"opacity": "0.5"});
        });
        $("#boxcard1").mouseout(function () { 
        //    $(".boxcard2").css({"filter": "blur(0px)", " -webkit-filter": "blur(0px)"});
        //    $(".boxcard3").css({"filter": "blur(0px)", " -webkit-filter": "blur(0px)"});
           $(".boxcard2").css({"opacity": "1"});
           $(".boxcard3").css({"opacity": "1"});
        });
        $("#boxcard2").mouseout(function () { 
        //    $(".boxcard1").css({"filter": "blur(0px)", " -webkit-filter": "blur(0px)"});
        //    $(".boxcard3").css({"filter": "blur(0px)", " -webkit-filter": "blur(0px)"});
        $(".boxcard1").css({"opacity": "1"});
           $(".boxcard3").css({"opacity": "1"});
        });
        $("#boxcard3").mouseout(function () { 
        //    $(".boxcard2").css({"filter": "blur(0px)", " -webkit-filter": "blur(0px)"});
        //    $(".boxcard1").css({"filter": "blur(0px)", " -webkit-filter": "blur(0px)"});
        $(".boxcard1").css({"opacity": "1"});
           $(".boxcard2").css({"opacity": "1"});
        });
    });
</script>