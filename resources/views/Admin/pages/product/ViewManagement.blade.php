<style>
    .box {
        position: relative;
        width: 150px;
        height: 100px;
        background-color: rgba(29, 97, 214, 0.827);
        margin: 5px;
    }

    .box-number {
        position: absolute;
        top: 30%;
        left: 50%;
        transform: translate(-50%, -30%);
        color: white;
        font-weight: bold;
        font-size: 20px;
    }

    .box-buttom {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 5px;
        text-align: center;
        background-color: rgba(255, 255, 255, 0.124);
        color: rgb(255, 255, 255);
        font-weight: bold;
    }

    .box-color-0 {
        background-color: rgb(113, 165, 163);
    }
    .box-color-1 {
        background-color: rgb(29, 214, 205);
    }

    .box-color-2 {
        background-color: rgb(90, 235, 18);
    }

    .box-color-3 {
        background-color: rgb(235, 213, 18);
    }

    .box-color-4 {
        background-color: rgb(235, 18, 65);
    }
</style>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        {{-- <div class="row">
            <div class="col-md-3">featured</div>
            <div class="col-md-3">Popular</div>

        </div> --}}
        {{--
        <hr> --}}
        <?php
        $count = 0;
        $countDefault = 0;
        $countArrival = 0;
        $countTrending = 0;
        $countFeatured = 0;
        $countTop = 0;
        foreach ($items as $key => $item) {
          
         $count++;
           if( $item->models == "Default"):
         $countDefault++;
           elseif( $item->models == "New arrival"):
         $countArrival++;
           elseif( $item->models == "Trending"):
         $countTrending++;
           elseif( $item->models == "Featured"):
         $countFeatured++;
           elseif( $item->models == "Top"):
         $countTop++;
        endif;
        }
        ?>
        <div class="row m-auto">
            <div class="box col-md-2 rounded">
                <div class="box-number">
                    <span>{{ $count }}</span>
                </div>
                <div class="box-buttom">
                    <label for="">All</label>
                </div>
            </div>
            <div class="box col-md-2 rounded box-color-0">
                <div class="box-number">
                    <span>{{ $countDefault }}</span>
                </div>
                <div class="box-buttom">
                    <label for="">Default</label>
                </div>
            </div>
            <div class="box col-md-2 rounded box-color-1">
                <div class="box-number">
                    <span>{{ $countArrival }}</span>
                </div>
                <div class="box-buttom ">
                    <label for="">New Arrival</label>
                </div>
            </div>
            <div class="box col-md-2 rounded  box-color-2">
                <div class="box-number">
                    <span>{{ $countTrending }}</span>
                </div>
                <div class="box-buttom">
                    <label for="">Trending</label>
                </div>
            </div>
            <div class="box col-md-2 rounded box-color-3">
                <div class="box-number">
                    <span>{{ $countFeatured }}</span>
                </div>
                <div class="box-buttom ">
                    <label for="">Featured</label>
                </div>
            </div>
            <div class="box col-md-2 rounded box-color-4">
                <div class="box-number">
                    <span>{{ $countTop }}</span>
                </div>
                <div class="box-buttom ">
                    <label for="">Top</label>
                </div>
            </div>
        </div>
    </div>
</div>