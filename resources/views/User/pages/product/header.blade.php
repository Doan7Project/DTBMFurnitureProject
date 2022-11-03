<style>
     .boxCategory .active {
        border: 1px solid rgb(233, 233, 233);
        background-color: rgba(255, 160, 160, 0.342);
        /* box-shadow: 0px 0px 20px 0px rgb(148, 148, 148); */

    }
    .boxCategory .bate {
        padding: 10px 20px;
        margin: 4px;
        text-decoration: none;
        color: rgb(97, 97, 97);
    }

    .boxCategory .bate:hover {
        color: rgb(133, 133, 133);
        transition: 0.4s ease-in-out;
    }

  
    .Category-body{
        /* border: 1px solid rgb(245, 244, 244);  */
        padding: 20px;
        /* background-color: rgb(41, 108, 124); */
    }
</style>

<div class="row Category-body container m-auto rounded">
    <div class="col-lg-12 d-flex">
        @foreach ( $category as $categorys )
        <div class="boxCategory">
            @if (Session::get('link') == $categorys->id)
            <a class="active bate text-decoration-none rounded text-black-50" id="active" href="{{ url("searchProduct/{$categorys->id}")
                }}">{{
                $categorys->CategoryName }}</a>
            @else
            <a class="bate text-decoration-none rounded" id="active" href="{{ url("searchProduct/{$categorys->id}") }}">{{
                $categorys->CategoryName }}</a>
            @endif
        </div>
        @endforeach

    </div>

</div>