<style>
      /* CSS Cart */
      :root {
        --white-color: #fff;
        --black-color: #000;
        --text-color: #333;
        --primary-color: #ee4d2d;
        --primary-color-rgba: rgba(238, 77, 43, 0.08);
        --border-color: #dbdbdb;
        --star-gold-color: #ffce3e;

        --header-height: 120px;
        --navbar-height: 34px;
        --header-with-search-height: calc(var(--header-height) - var(--navbar-height));
    }

  .header__cart {
        width: 40px;
        text-align: center;
    }

    .header__cart-notice {
        position: absolute;
        top: 1px;
        right: -10px;
        padding: 0px 5px;
        font-size: 0.7rem;
        color: var(--primary-color);
        background-color: var(--white-color);
        line-height: 1rem;
        border-radius: 10px;
        /* border: 2px solid #ee4d2d; */
    }

    .header__cart-wrap:hover .header__cart-list {
        display: block;
        text-decoration: none;
        background-color: #fff;
        color: #333;
    }

    .header__cart-icon {
        color: var(--white-color);
        font-size: 1rem;
        margin-top: 14px;
    }

    .header__cart-wrap {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    .header__cart-list {
        position: absolute;
        top: calc(100% + 2px);
        right: -14px;
        background-color: var(--white-color);
        width: 400px;
        border-radius: 2px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        display: none;
        animation: fadeIn ease-in 0.2s;
        cursor: default;
        z-index: 999;
    }

    .header__cart-list::after {
        content: "";
        position: absolute;
        right: 6px;
        top: -24px;
        border-width: 16px 22px;
        border-style: solid;
        border-color: transparent transparent var(--white-color) transparent;
        cursor: pointer;
    }

    .header__cart-list-msg {
        display: none;
        font-size: 1.4rem;
        margin-top: 14px;
        color: var(--text-color);
    }

    .header__cart-list-no-cart {
        padding: 24px 0 0 0;
    }

    .header__cart-no-cart-img {
        width: 52%;
        display: none;
    }
    /* CSS Cart item */

    .header__cart-heading {
        text-align: left;
        margin: 0 0 8px 12px;
        font-size: 1rem;
        color: #999;
        font-weight: 400;
    }

    .header__cart-list-item {
        padding-left: 0;
        list-style: none;
        max-height: 56vh;
        overflow-y: auto;
    }

    .header__cart-item {
        display: flex;
        align-items: center;
    }

    .header__cart-item:hover {
        background-color: #f8f8f8;
        text-decoration: none;
    }

    .header__cart-img {
        width: 42px;
        height: 42px;
        margin: 12px;
        border: 1px solid #e8e8e8;
    }

    .header__cart-item-info {
        width: 100%;
        margin-right: 12px;
    }

    .header__cart-item-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: darkgray;
    }

    .header__cart-item-price-wrap {

    }

    .header__cart-item-name {
        font-weight: 500;
        font-size: 1rem;
        max-height: 4rem;
        color: var(--text-color);
        line-height: 2rem;
        overflow: hidden;
        flex: 1;
        padding-right: 16px;
        margin: 0;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        text-align: left;
    }

    .header__cart-item-price {
        font-size: 1rem;
        font-weight: 400;
        color: var(--primary-color);
    }

    .header__cart-item-multiply {
        font-size: 0.9rem;
        margin: 0 4px;
        color: #757575;
    }

    .header__cart-item-qnt {
        font-size: 0.8rem;
        color: #757575;
    }

    .header__cart-item-body {
        display: flex;
        justify-content: space-between;
    }

    .header__cart-item-description {
        color: #757575;
        font-size: 1.3rem;
        font-weight: 300;
    }

    .header__cart-item-remove {
        color: var(--text-color);
        font-size: 1.4rem;
    }

    .header__cart-item-remove:hover {
        color: var(--primary-color);
        cursor: pointer;
        text-decoration: none;
    }

    .header__cart-view-cart {
    }

    .header__cart-view-cart:hover {
        background-color: rgba(254, 81, 34, 0.95);
        text-decoration: none;
    }
</style>
<div class="header__cart">
    <div class="header__cart-wrap">
      <div class="nav-link pointer">
        <i class="bi bi-cart-fill header__cart-icon"></i>
        <span class="header__cart-notice">{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}</span>
      </div>
        <div class="header__cart-list header__cart-list-no-cart">
            @if(is_null(\Session::get('carts')))
                <h4>Empty cart</h4>
                <img src="{{asset('/public/images/empty-cart.webp')}}"/>
            @else
                <h4 class="header__cart-heading">Product added</h4>
                <ul class="header__cart-list-item">
                    <!-- CSS Cart item -->
                    @foreach($products as $key => $product)
                    <li class="header__cart-item">
                        <img src="{{ $product->images }}" alt="" class="header__cart-img">
                        <div class="header__cart-item-info">
                            <div class="header__cart-item-head">
                                <h5 class="header__cart-item-name">{{ $product->product_name }}</h5>
                                <div class="header__cart-item-price-wrap">
                                    <span class="header__cart-item-price">${{ $product->price }}</span>
                                    <span class="header__cart-item-multiply">x</span>
                                    <span class="header__cart-item-qnt">{{ $carts[$product->id] }}</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <a href="{{url('/carts')}}" class="btn header__cart-view-cart">View cart</a>
            @endif
        </div>
    </div>
  </div>