@extends('User.main.main')
@section('content')
<style>
    .buttons_added {
    opacity:1;
    display:inline-block;
    display:-ms-inline-flexbox;
    display:inline-flex;
    white-space:nowrap;
    vertical-align:top;
    }
    .is-form {
        overflow:hidden;
        position:relative;
        background-color:#f9f9f9;
        height:2.2rem;
        width:1.9rem;
        padding:0;
        text-shadow:1px 1px 1px #fff;
        border:1px solid #ddd;
    }
    .is-form:focus,.input-text:focus {
        outline:none;
    }
    .is-form.minus {
        border-radius:4px 0 0 4px;
    }
    .is-form.plus {
        border-radius:0 4px 4px 0;
    }
    .input-qty {
        background-color:#fff;
        height:2.2rem;
        text-align:center;
        font-size:1rem;
        display:inline-block;
        vertical-align:top;
        margin:0;
        border-top:1px solid #ddd;
        border-bottom:1px solid #ddd;
        border-left:0;
        border-right:0;
        padding:0;
    }
    .input-qty::-webkit-outer-spin-button,.input-qty::-webkit-inner-spin-button {
        -webkit-appearance:none;
        margin:0;
    }
</style>
<form class="bg0 p-t-130 p-b-85" method="get">
    @include('User.alert')
    @if($order)
    <!-- Nav tabs -->
    <h2 class="text-center">{{$title}}</h2>
    <div class="container m-auto">
        <ul class="nav nav-tabs">
            <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#peding">Order Peding</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#done">Order Done</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#cancel">Order Cancel</a>
            </li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane container active" id="peding">
                @foreach($numOrder as $key=>$value)
                    @if($value['status']==0)
                        @php 
                            $total = 0;
                            $status = $value['status'];
                            $status = 'Pending';
                        @endphp
                        <div class="d-flex justify-content-between align-content-center">
                            <h5>Order number: {{ $value['order_number'] }}</h5>
                            <h6>Date order: {{ $value['created_at']}}</h6>
                        </div>
                        <table class="w-100">
                            <thead class="border-bottom">
                                <tr class="table_head col-12 ">
                                    <th class="px-0 col-1">Product</th>
                                    <th class="px-0 col-6"></th>
                                    <th class="px-0 col-1">Price</th>
                                    <th class="px-0 col-2">Quantity</th>
                                    <th class="px-0 col-1">Total</th>
                                    <th class="px-0 col-2">Function</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $key => $items)
                                    @if($value['order_number']==$items['order_number'])
                                        @php
                                            $priceEnd = $items['price'] * $items['quantity'];
                                            $total += $priceEnd;
                                        @endphp
                                        <tr class="table_row col-12 border-bottom">
                                            <td class="column-1">
                                                <div class="how-itemcart1">
                                                    <img src="{{ $items['images'] }}" alt="IMG" style="width: 100px">
                                                </div>
                                            </td>
                                            <td class="column-2">{{ $items['product_name'] }}</td>
                                            <td class="column-3">
                                                ${{ number_format($items['price'], 0, '', '.') }}
                                            </td>
                                            <td class="column-4">
                                                {{ $items['quantity'] }}
                                            </td>
                                            <td class="column-5 total">
                                                ${{ number_format($priceEnd, 0, '', '.') }}
                                            </td>
                                            <td class="p-r-15">
                                                <a href="#">Cancel</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                            <div class="size-209 pt-1 d-flex justify-content-between">
                                <span class="mtext-110 cl2">
                                    Total: ${{ number_format($total, 0, '', '.') }}
                                </span>
                            </div>
                        <hr class="border border-info">
                        <hr>
                        @endif
                    @endforeach
                @csrf
            </div>
            <div class="tab-pane container fade" id="done">
                @foreach($numOrder as $key=>$value)
                    @if($value['status']==1)
                        @php 
                        $total = 0;
                        $status = $value['status'];
                        $status = 'Done'
                        @endphp
                        <div class="d-flex justify-content-between align-content-center">
                            <h5>Order number: {{ $value['order_number'] }}</h5>
                            <h6>Date order: {{ $value['created_at']}}</h6>
                        </div>
                        <table class="w-100">
                            <thead class="border-bottom">
                                <tr class="table_head col-12 ">
                                    <th class="px-0 col-1">Product</th>
                                    <th class="px-0 col-6"></th>
                                    <th class="px-0 col-1">Price</th>
                                    <th class="px-0 col-2">Quantity</th>
                                    <th class="px-0 col-1">Total</th>
                                    <th class="px-0 col-2">Feedback</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($order as $key => $items)
                                    @if($value['order_number']==$items['order_number'])
                                        @php
                                            $priceEnd = $items['price'] * $items['quantity'];
                                            $total += $priceEnd;
                                        @endphp
                                        <tr class="table_row col-12 border-bottom">
                                            <td class="column-1">
                                                <div class="how-itemcart1">
                                                    <img src="{{ $items['images'] }}" alt="IMG" style="width: 100px">
                                                </div>
                                            </td>
                                            <td class="column-2">{{ $items['product_name'] }}</td>
                                            <td class="column-3">
                                                ${{ number_format($items['price'], 0, '', '.') }}
                                            </td>
                                            <td class="column-4">
                                                {{ $items['quantity'] }}
                                            </td>
                                            <td class="column-5 total">
                                                ${{ number_format($priceEnd, 0, '', '.') }}
                                            </td>
                                            <td class="pr-2">
                                                <a href="{{url("/orderdetail/{$items['product_id']}")}}">
                                                    <button type="button" class="btn btn-info">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex-w flex-sb-m bor15 pt-18 p-b-15 p-lr-40 p-lr-15-sm ">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                
                                <div class="size-209 pt-1 d-flex justify-content-between">
                                    <span class="mtext-110 cl2">
                                        Total: ${{ number_format($total, 0, '', '.') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <hr class="border border-info">
                        <hr>
                        @endif
                    @endforeach
                @csrf
            </div>
            <div class="tab-pane container fade" id="cancel">
                @foreach($numOrder as $key=>$value)
                    @if($value['status']==2)
                        @php 
                        $total = 0;
                        $status = $value['status'];
                        $status = 'Cancel';
                        @endphp
                        <div class="d-flex justify-content-between align-content-center">
                            <h5>Order number: {{ $value['order_number'] }}</h5>
                            <h6>Date order: {{ $value['created_at']}}</h6>
                        </div>
                        <table class="w-100">
                            <thead class="border-bottom">
                                <tr class="table_head col-12 ">
                                    <th class="px-0 col-1">Product</th>
                                    <th class="px-0 col-6"></th>
                                    <th class="px-0 col-1">Price</th>
                                    <th class="px-0 col-2">Quantity</th>
                                    <th class="px-0 col-1">Total</th>
                                    <th class="px-0 col-2">Function</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($order as $key => $items)
                                    @if($value['order_number']==$items['order_number'])
                                        @php
                                            $priceEnd = $items['price'] * $items['quantity'];
                                            $total += $priceEnd;
                                        @endphp
                                        <tr class="table_row col-12 border-bottom">
                                            <td class="column-1">
                                                <div class="how-itemcart1">
                                                    <img src="{{ $items['images'] }}" alt="IMG" style="width: 100px">
                                                </div>
                                            </td>
                                            <td class="column-2">{{ $items['product_name'] }}</td>
                                            <td class="column-3">
                                                ${{ number_format($items['price'], 0, '', '.') }}
                                            </td>
                                            <td class="column-4">
                                                {{ $items['quantity'] }}
                                            </td>
                                            <td class="column-5 total">
                                                ${{ number_format($priceEnd, 0, '', '.') }}
                                            </td>
                                            <td class="p-r-15">
                                                <a href="#">Edit</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex-w flex-sb-m bor15 pt-18 p-b-15 p-lr-40 p-lr-15-sm ">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                
                                <div class="size-209 pt-1 d-flex justify-content-between">
                                    <span class="mtext-110 cl2">
                                        Total: ${{ number_format($total, 0, '', '.') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <hr class="border border-info">
                        <hr>
                        @endif
                    @endforeach
                @csrf
            </div>
        </div>
    </div>
    @else
        <h1 class="text-center">Don't order</h1>
    @endif
</form>

<script>
    // date create order my customer.
    $( function() {
        $('.dateOrder').datepicker({
            format: 'mm/dd/yy'
        });        
    });
    
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

        $('.total',parent).text(qty*price);

        total();
    })
</script>
@endsection