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

    .primary-bg {
        background-color: #5ea0aa;
    }
</style>
<div class="container m-auto">
    @include('User.alert')
    @if (count($products) != 0)
        @if(session('LoggedUser') == 0)
        @include('User.pages.login.login')
        @else
        <div class="">
            <h2 class="text-center">{{$title}}</h2>
            <div class="row border-gray-500 border-0">
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
                                <td class="column-3 price">${{ number_format($product->price, 0, '', '.') }}</td>
                                <td class="column-4">

                                    <div class="buttons_added d-flex">
                                        <input 
                                            data-bs-toggle="tooltip" 
                                            data-bs-placement="top" title="Min 1!"
                                            class="minus is-form btn btn-outline-success" id="munis" 
                                            type="button" value="-">
                                        <input 
                                            aria-label="quantity" id="qty" class="input-qty" 
                                            max="20" min="1" type="number" name="num_product[{{ $product->id }}]" 
                                            value="{{ $carts[$product->id] }}" readonly>
                                        <input 
                                            data-bs-toggle="tooltip" 
                                            data-bs-placement="top" title="Max 20!"
                                            class="plus is-form btn btn-outline-success" 
                                            id="plus" type="button" value="+">
                                    </div>
                                </td> 
                                <td class="column-5" id="total">${{ number_format($priceEnd, 0, '', '.') }}</td>
                                <td class="p-r-15">
                                    <div class="d-flex">
                                        {{-- update number product on cart --}}
                                        <form action="" method="post">
                                            <button type="submit"
                                                data-bs-toggle="tooltip" 
                                                data-bs-placement="top" title="Update product!"
                                                {{-- formaction="" --}}
                                                formaction="/update-cart"
                                                class="pointer px-2 py-1 border rounded btn btn-outline-success">
                                                <i class="bi bi-arrow-up-square"></i>
                                            </button>
                                        </form>
                                        {{-- delete product on cart --}}
                                        <form action="/carts/delete/{{ $product->id }}" method="get">
                                            <button type="submit" 
                                                data-bs-toggle="tooltip" 
                                                data-bs-placement="top" title="Delete product!"
                                                {{-- formaction="" --}}
                                                class="pointer px-2 py-1 border rounded btn btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="size-209 pt-1 d-flex justify-content-between">
                    <button id="clickOrder" 
                        class="btn btn-outline-success">
                        Order
                    </button>
                    <span class="mtext-110 cl2" id="sum">
                        Total: ${{ number_format($total, 0, '', '.') }}
                    </span>
                </div>
                @csrf
            </div>
        </div>
        <div class="pb-5 pt-2">
            <label class="form-label" for="txtNote">Note</label><br>
            <textarea class="form-control" name="txtNote" id="txtNote" cols="60" rows="3"></textarea>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        @endif
    @else
        <div class="text-center"><h2>Cart is empty</h2></div>
    @endif
</div>
<script>
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

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endsection