@extends('User.main.main')
@section('content')
<?php
$arrfeeds = [
    [
    
    'id' => '1',
    'evalue' => 'Good'
    ],
    [
    
    'id' => '2',
    'evalue' => 'Bad'
    ]
    
    
    ];
    
    $arrsta = [
        [
        
        'id' => '1',
        'sta' => 'Active'
        ],
        [
        
        'id' => '2',
        'sta' => 'Inative'
        ]
        
        
        ];?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');



    .card-wrapper {
        /* padding: 50px; */
        max-width: 1100px;

    }

    img {
        width: 100%;
        display: block;
        margin: auto;
    }

    .img-display {
        overflow: hidden;
        margin: 10px auto;
        width: 80%;
    }

    .img-showcase {
        display: flex;
        width: 100%;
        margin: auto;
        transition: all 0.5s ease;

        /* justify-content:center ; */
    }

    .img-showcase img {

        min-width: 100%;
    }

    .img-select {
        /* display: flex; */
        display: grid;
        grid-template-columns: auto auto auto auto;
    }

    .img-item {
        margin: 0.3rem;
    }

    .img-item:nth-child(1),
    .img-item:nth-child(2),
    .img-item:nth-child(3) {
        margin-right: 0;

    }

    .img-item:hover {
        opacity: 0.8;
    }

    .product-content {
        padding: 2rem 1rem;
    }

    .product-title {
        font-size: 2rem;
        text-transform: capitalize;
        font-weight: 700;
        position: relative;
        color: #3f3f3f;
        margin: 1rem 0;
    }

    .product-title::after {
        content: "";
        position: absolute;
        left: 0;
        top: 100%;
        border: none;
        border-radius: 10px;
        height: 5px;
        width: 50px;
        /* background: #0b81c5; */
    }

    .product-link {
        text-decoration: none;
        text-transform: uppercase;
        font-weight: 400;
        font-size: 0.9rem;
        display: inline-block;
        margin-bottom: 0.5rem;
        background: #256eff;
        color: #fff;
        padding: 0 0.3rem;
        transition: all 0.5s ease;
    }

    .product-link:hover {
        opacity: 0.9;
    }

    .product-rating {
        color: #ffc107;
    }

    .product-rating span {
        font-weight: 600;
        color: #252525;
    }

    .product-price {
        margin: 1rem 0;
        font-size: 1rem;
        font-weight: 700;
    }

    .product-price span {
        font-weight: 400;
    }

    .last-price span {
        color: #f64749;
        text-decoration: line-through;
    }

    .new-price span {
        color: #256eff;
    }

    .product-detail h2 {
        text-transform: capitalize;
        color: #12263a;
        padding-bottom: 0.6rem;
    }

    .product-detail p {
        font-size: 0.9rem;
        padding: 0.3rem;
        opacity: 0.8;
    }

    .product-detail ul {
        margin: 1rem 0;
        font-size: 0.9rem;
    }

    .product-detail ul li {
        margin: 0;
        list-style: none;
        background: url(shoes_images/checked.png) left center no-repeat;
        background-size: 18px;
        padding-left: 1.7rem;
        margin: 0.4rem 0;
        font-weight: 600;
        opacity: 0.9;
    }

    .product-detail ul li span {
        font-weight: 400;
    }

    .purchase-info {
        margin: 1.5rem 0;
    }

    .purchase-info input,
    .purchase-info .btn {
        border: 1.5px solid #ddd;
        border-radius: 10px;
        text-align: center;
        padding: 0.45rem 0.8rem;
        outline: 0;
        margin-right: 0.2rem;
        margin-bottom: 3px;
    }

    .purchase-info input {
        width: 60px;
    }

    .purchase-info .btn {
        cursor: pointer;
        color: #fff;
    }


    .purchase-info .btn:hover {
        opacity: 0.9;
    }

    .social-links {
        display: flex;
        align-items: center;
    }

    .social-links a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        color: #000;
        border: 1px solid #000;
        margin: 0 0.2rem;
        border-radius: 50%;
        text-decoration: none;
        font-size: 0.8rem;
        transition: all 0.5s ease;
    }

    .social-links a:hover {
        background: #000;
        border-color: transparent;
        color: #fff;
    }

    @media screen and (min-width: 992px) {
        .cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 1.5rem;
            margin: 20px auto;
        }

        .card-wrapper {

            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-imgs {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .product-content {
            padding-top: 0;
        }

        .an {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
    }

    .review {
        overflow: auto;
        max-height: 200px;
    }
</style>
<div class="card-wrapper">
    <div class="card cards">
        <!-- card left -->
        <div class="product-imgs">
            <div class="img-display">
                <div class="img-showcase">
                    <?php $count=1?>
                    <img src="{{ $productdetail->images }}" alt="shoe image">
                    @foreach ($imagedata as $imagedatas)
                    @if ($imagedatas->product_id == $productdetail->id)
                    <?php $count++?>
                    <img src="{{ $imagedatas->image }}" alt="shoe image">
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="img-select">
                @if ($count>1)
                <div class="img-item">
                    <a href="#" data-id="1">
                        <img class="img-fluid" src="{{ $productdetail->images }}" alt="shoe image">

                    </a>
                </div>
                @else
                <div class="img-item d-none">
                    <a href="#" data-id="1">
                        <img class="img-fluid" src="{{ $productdetail->images }}" alt="shoe image">
                    </a>

                </div>
                @endif
                <?php $i=1?>
                @foreach ($imagedata as $key=> $imagedatas)
                @if ($imagedatas->product_id == $productdetail->id)
                <?php $i++ ?>
                <div class="img-item">
                    <a href="#" data-id="<?= $i ?>">
                        <img class="img-fluid" src="{{ $imagedatas->image  }}" alt="shoe image">
                    </a>

                </div>
                @endif
                @endforeach
            </div>
        </div>
        <!-- card right -->
        <div class="product-content">
            <h2 class="product-title">{{ $productdetail->product_name }}</h2>
            <a href="{{ route('product') }}" class="product-link py-1 px-4 rounded btn btn-primary">visit
                furniture store</a>
            <div class="product-rating">

                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
                <span>4.7(21)</span>
            </div>
            <div class="product-price">
                <p class="new-price">New Price: <span>${{ $productdetail->price }}</span></p>
            </div>
            {{-- <span>{{ session('LoggedUserid') }}</span> --}}
            {{-- $productdetail->id == $feedbacks->product_id --}}


            <div class="product-detail">
                <h3>Product Information </h2>
                    <p>{{ $productdetail->content }}</p>
                    <div>{{ $productdetail->description }}</div>
                    <ul>
                        <li>Made in: <span>{{ $productdetail->made_in }}</span></li>
                        @foreach ($category as $categorys)
                        @if ($productdetail->category_id == $categorys->id)
                        <li>Category: <span>{{ $categorys->CategoryName }}</span></li>
                        @endif
                        @endforeach
                        <li>Product Code: <span>{{ $productdetail->product_code }}</span></li>
                        <li>Shipping Area: <span>All over the world</span></li>
                    </ul>
            </div>

            <div class="purchase-info">
                <form action="/add_cart" method="POST">

                    <div class="buttons_added d-flex pb-3">
                        <input class="minus is-form" id="munis" type="button" value="-">
                        <input aria-label="quantity" id="qty" class="input-qty" max="10" min="1" type="number"
                            name="num_product" value="1">
                        <input class="plus is-form" id="plus" type="button" value="+">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Add to Cart <i class="bi bi-cart-fill"></i>
                    </button>
                    <input type="hidden" name="product_id" value="{{ $productdetail->id }}">
                    @csrf
                </form>
            </div>

            <div class="social-links">

            </div>
        </div>
    </div>
</div>


<form action="{{ url('/orderdetail/{feeds}') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h2 class="modal-title" id="exampleModalLongTitle">{{ $productdetail->product_name }}</h2>


                    <input type="text " class="an" name="product_id" value="{{ $productdetail->id }}">
                    <input type="text" class="an" name="customer_id" value="{{ session('LoggedUserid') }}">
                    <h5 class="modal-title an" id="exampleModalLongTitle" name="customer_id">
                        {{ session('LoggedUserid') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea name="content" id="" cols="50" rows="5" required></textarea>
                    <select class="form-select" aria-label="Default select example" name="evaluate" required>

                        @foreach($arrfeeds as $value)

                        <option value="{{$value['evalue']}}">{{$value['evalue']}}</option>
                        <!-- <option value="0">Inactive</option> -->
                        @endforeach
                    </select>
                    <select class="form-select d-none" aria-label="Default select example" name="status" required>

                        @foreach($arrsta as $value)

                        <option value="{{$value['sta']}}">{{$value['sta']}}</option>
                        <!-- <option value="0">Inactive</option> -->
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="container pb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h4 class="text-start">Customer Comments
                <div class="product-rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                </div>
            </h4>
        </div>
        <?php 
    $counts = 0;

    foreach ($orderDetail as $key => $orderDetails):
      if(session('LoggedUserid')  && $orderDetails->order_masters->status == 1):
      $counts++;
  

          $disable = "";
    else:

$disable = "disabled";
    endif;
     
endforeach;

    
    
    ?>
        <div>
            <button {{ $disable }} type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#exampleModalCenter">
                <i class="bi bi-chat-left-dots-fill pe-2"></i>Give me a comment!
            </button>
        </div>
    </div>
    <?php $count = 1?>
    <div class="card card-body review">
        @foreach ($feedback as $key => $feedbacks)
        @if ($feedbacks->product_id == $productdetail->id)
        <div class="d-flex justify-content-start">
            <h5 class="fw-bolder pe-4">Review {{ $count }}</h5>
            <h6 class="text-muted">Guest: {{ $feedbacks->customers->first_name }} </h6>
        </div>
        <p>{{ $feedbacks->content }}</p>

        <?php $count++?>
        @endif
        @endforeach
    </div>

</div>
<script>
    const imgs = document.querySelectorAll('.img-select a');
    const imgBtns = [...imgs];
    let imgId = 1;

    imgBtns.forEach((imgItem) => {
        imgItem.addEventListener('click', (event) => {
            event.preventDefault();
            imgId = imgItem.dataset.id;
            slideImage();
        });
    });

    function slideImage(){
        const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

        document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
    }

    window.addEventListener('resize', slideImage);

    // up dow number
    $('input.input-qty').each(function() {
        var $this = $(this),
            qty = $this.parent().find('.is-form'),
            min = Number($this.attr('min')),
            max = Number($this.attr('max'))
        if (min == 0) {
            var d = 0
        } else d = min
        $(qty).on('click', function() {
            if ($(this).hasClass('minus')) {
            if (d > min) d += -1
            } else if ($(this).hasClass('plus')) {
            var x = Number($this.val()) + 1
            if (x <= max) d += 1
            }
            $this.attr('value', d).val(d)
        })
    })
</script>
@endsection