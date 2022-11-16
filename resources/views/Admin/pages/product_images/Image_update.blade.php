@extends('Admin.main.main')
@section('content')
<style>
    .txtback {
        color: gray;
        transition: 0.4s;

    }
    #productIdConference{
        font-size: 12px;
    }
</style>
<div class="shadow-sm card" style="width: 500px;">
    <h4 class="text-center bg-primary bg-gradient p-3 text-white">{{$title}}</h4>
    <p class="text-center text-black-50">Create the information to Product Image</p>

    <form action="" class="card-body" method="post">
        @csrf
        <div class=" text-end">
            <a class="text-decoration-none btn btn-success text-light" href="{{route('listimage')}}">
                <i class="bi bi-card-list pe-2"></i>List Item
            </a>
        </div>
        @if (Session::has('success'))
        <div class="alert alert-success opacity-100">
            {{Session::get('success')}}
        </div>
        @endif

        <div class="row-cols-md py-2">
            <label for="productid" class="form-label text-black fw-bolder">Product Name - </label>
            <span  id="productIdConference">{{ $productImage->product_id  }}</span>
            <select class="form-select shadow-none" name="txtProductID" id="productid">
                @foreach($productname as $productnames)
                    @if($productnames->id == $productImage->product_id )
                    <option value="{{$productnames->id}}" selected>{{$productnames->product_name}} - {{$productnames->product_code}}</option>
                    @else
                    <option value="{{$productnames->id}}">{{$productnames->product_name}} - {{$productnames->product_code}}</option>
                    @endif
                @endforeach
            </select>
            @error('txtProductID')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="row-cols-md pt-2">
            <label for="upload" class="form-label text-black">Image</label>
            <input type="file" class="form-control shadow-none" name="txtImage" id="upload" onchange="loadFile(event)" value="{{$productImage->image}}">
            <div class="shadow-sm d-flex position-relative rounded border-0 mt-2" style="width: 100% ; height:280px;">
                <span style="z-index: 1 ;" class="align-self-center text-black-50 position-absolute top-50 start-50 translate-middle fs-4">Image Review...</span>
                <img src="{{$productImage->image}}" class="w-100" class="p-1" id="output" style="z-index: 2;">
            </div>
            <input type="hidden" name="txtImage" id="file" value="{{$productImage->image}}">
            @error('txtImage')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="row-cols-md">
            <label for="content" class="form-label text-black">Content</label>
            <textarea class="form-control shadow-none" name="txtContent" id="content" cols="30" rows="5">{{$productImage->content}}</textarea>

        </div>

        <div class="py-2 d-flex">
            <div class="">
                <input type="submit" value="Edit" class="btn btn-primary ">
            </div>
            <div class="mx-2">
                <a href="{{route('index')}}" style="width:100px ;" type="submit" class="btn btn-secondary ">Close</a>
            </div>

        </div>

    </form>
</div>
<script>
    $.ajaxSetup({
        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }
    });
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
    $(document).ready(function() {
        $('#upload').change(function() {
            let form = new FormData();
            form.append('file', $(this)[0].files[0]);
            $.ajax({
                processData: false,
                contentType: false,
                dataType: 'JSON',
                type: 'POST',
                data: form,
                url: '/upload-images',
                success: function(results) {
                    if (results.error == false) {
                        $('#file').val(results.url);

                    } else {
                        alert('Upload error');
                    }


                }
            });
        });

        // $('#productid').change(function(){

        //     var productid = document.getElementById('productid').value;
        //     document.getElementById('productIdConference').innerHTML = productid;

        // })
    })
</script>
@endsection