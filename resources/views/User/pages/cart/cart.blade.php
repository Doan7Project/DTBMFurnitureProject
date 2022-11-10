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
<form class="bg0 p-t-130 p-b-85" method="post">
    @include('User.alert')
    @if (count($products) != 0)
        @if(session('LoggedUser') == 0)
            @include('User.pages.login.login')
        @else
        <div class="container m-auto">
            <h2 class="text-center">Order Product</h2>
            <div class="row border-gray-500 border-0">
                <div class="m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            @php $total = 0; @endphp
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
                                @foreach($products as $key => $product)
                                    @php
                                        $priceEnd = $product->price * $carts[$product->id];
                                        $total += $priceEnd;
                                    @endphp
                                    <tr class="table_row col-12 border-bottom">
                                        <td class="column-1">
                                            <div class="how-itemcart1">
                                                <img src="{{ $product->images }}" alt="IMG" style="width: 100px">
                                            </div>
                                        </td>
                                        <td class="column-2">{{ $product->product_name }}</td>
                                        <td class="column-3">${{ number_format($product->price, 0, '', '.') }}</td>
                                        <td class="column-4">
                                            <div class="buttons_added">
                                                <input class="minus is-form" type="button" value="-">
                                                <input aria-label="quantity" class="input-qty" max="10" min="1" type="number" name="num_product[{{ $product->id }}]" value="{{ $carts[$product->id] }}">
                                                <input class="plus is-form" type="button" value="+">
                                              </div>
                                        </td> 
                                        <td class="column-5">${{ number_format($priceEnd, 0, '', '.') }}</td>
                                        <td class="p-r-15">
                                            <a href="/carts/delete/{{ $product->id }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 pt-18 p-b-15 p-lr-40 p-lr-15-sm ">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                
                                <div class="size-209 pt-1 d-flex justify-content-between">
                                    <input type="submit" value="Update Cart" formaction="/update-cart"
                                        class="pointer px-4 py-1 border rounded">
                                        <button id="clickOrder" class="pointer px-4 py-1 border rounded">
                                            Order
                                        </button>
                                    <span class="mtext-110 cl2">
                                        Total: ${{ number_format($total, 0, '', '.') }}
                                    </span>
                                </div>
                                <div>
                                    <label for="">Date required</label><br>
                                    <input type="date" name="txtDateOrder" placeholder="Date required"><br>
                                    <label for="">Note</label><br>
                                    <textarea name="txtNote" id="txtNote" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            @csrf
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @else
            <div class="text-center"><h2>Cart is empty</h2></div>
        @endif
</form>

{{-- <script type="text/javascript" src="{{ URL::asset('/resources/js/cart.js') }}"> --}}
<script>
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