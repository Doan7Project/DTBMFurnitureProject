<style>
    .bodyfilter>div {
        background: rgba(10, 130, 199, 0.767);

        border: none;

    }

    .btns {
        background-color: white;
        border: none;
        color: rgb(65, 65, 65);
    }

    .btns:hover {
        background-color: rgb(150, 151, 148);
        box-shadow: 2px 2px 10px 0px gray;
        color: white;
        transition: 0.4s ease-in-out;
    }

    .input-group:hover {
        box-shadow: 2px 2px 10px 0px gray;
        transition: 0.4s ease-in-out;
    }

    .input-group-text,
    .form-control {
        border: none;
        cursor: pointer;
    }


    .form-check-label {
        color: white;
    }
</style>
<div></div>
<div class="py-4">
    <form action="" name="sortProducts" id="sortProducts">
        <div class="d-flex justify-content-end">
            <button class="btn btn-outline-secondary shadow-none mx-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#filter" aria-expanded="false" aria-controls="collapseExample">
                <i class="bi bi-funnel"></i> Filter
            </button>
            <a href="{{ route('product') }}" class="btn btn-secondary text-decoration-none shadow-none ">All</a>
        </div>
        <div class="bodyfilter collapse pt-1" id="filter">
            <div class="filter card card-body bg-gradient d-flex">
                <div>
                    <h5 class="text-white text-center fw-bolder px-1">Quickly Searching</h4>
                        <div class="row">
                            <div class="text-start m-1" style="width: 300px ;">
                                <label for="sort" class="form-label px-1 text-white fw-bolder">Sort by price</label>
                                <select class="form-select p-2  shadow-none" name="price_sort" id="price_sort">
                                    <option selected value="">-- Please choose something --</option>
                                    <option value="price_a">$0 - $300</option>
                                    <option value="price_b">$300 - $600</option>
                                    <option value="price_c">$600 - $900</option>
                                    <option value="price_d">$900 - $1200</option>
                                    <option value="price_e">$1500 - $1800</option>
                                    <option value="price_f">$1800 - Over</option>
                                </select>
                            </div>
                        </div>
                </div>
                <hr>
                <div class="row">
                    <div class="text-start m-1" style="width: 300px ;">
                        <label for="sort" class="form-label px-1 text-white fw-bolder">Sort By</label>
                        <select class="form-select p-2  shadow-none" name="sort" id="sort">
                            <option selected value="">-- Please choose something --</option>
                            <option value="product_latest">Sort by: Latest</option>
                            <option value="product_new_arrival">Sort by: New arrival</option>
                            <option value="product_featured">Sort by: Featured</option>
                            <option value="product_trending">Sort by: Trending</option>
                            <option value="product_top">Sort by: The Best seller</option>
                            <option value="price_lowest">Sort by: Lowest Price</option>
                            <option value="price_highest">Sort by: Highest Price</option>
                            <option value="name_a_z">Sort by: A - Z</option>
                            <option value="name_z_a">Sort by: Z - A</option>
                        </select>
                    </div>
                </div>

                <hr>
                {{-- <div class="row">
                    <label class="form-label px-3 m-1 text-white fw-bolder">Sort by category</label>
                    <div class="col-lg-12 d-flex">

                        @foreach ( $category as $categorys )
                        <div class="boxCategory">
                            <a href="{{ url("link/{$categorys->id}") }}">{{ $categorys->CategoryName }}</a>
                        </div>
                        @endforeach

                    </div>

                </div> --}}
            </div>
        </div>
    </form>
</div>
@include('User.pages.product.js')