@extends('Admin.main.main')
@section('content')
<style>
    .txtback {
        color: gray;
        transition: 0.4s;

    }
</style>
<div class="" style="width:400px;">
    <h4 class="text-center bg-gradient pt-5 pb-3 text-muted fw-bolder">Creating Product Thumds</h4>
    

    <form action="" class=" shadow-sm card card-body" method="post">
        <p class="text-center text-black-50">Create the information to Product Image</p>
        @csrf
        <div class=" text-end">
            <a class="text-decoration-none btn btn-success text-light" href="{{route('listimage')}}">
                List Item
            </a>
        </div>
        @if (Session::has('success'))
        <div class="alert alert-success opacity-100">
            {{Session::get('success')}}
        </div>
        @endif

        <div class="row-cols-md py-2">
            <label for="productid" class="form-label text-muted fw-bolder">Product Name<span class="text-danger">(*)</span></label>
            <select class="form-select shadow-none" name="txtProductID" id="productid">
                <option value="">Please choose product name...</option>
                @foreach($productname as $productnames)
                <option value="{{$productnames->id}}" {{ old('txtProductID') == $productnames->id ? 'selected' : '' }}>{{$productnames->product_name .' - '. $productnames->product_code}}</option>
                @endforeach
            </select>
            @error('txtProductID')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="row-cols-md pt-2">
            <label for="upload" class="form-label text-muted fw-bolder">Image<span class="text-danger">(*)</span></label>
            <input type="file" class="form-control shadow-none" name="txtImage" id="upload" onchange="loadFile(event)" value="{{ old('txtImage') }}">
            <div class="shadow-sm d-flex position-relative rounded border-0 mt-2" style="width: 100% ; height:180px;">
                <span style="z-index: 1 ;" class="align-self-center text-black-50 position-absolute top-50 start-50 translate-middle fs-4">Image Review...</span>
                <img class="w-100" src="{{ old('txtImage') }}" class="p-1" id="output" style="z-index: 2;">
            </div>
            <input type="hidden" name="txtImage" id="file" value="{{ old('txtImage') }}">
            @error('txtImage')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="row-cols-md  pt-2">
            <label for="content" class="form-label text-muted fw-bolder">Content<span class="text-danger">(*)</span></label>
            <textarea class="form-control shadow-none" name="txtContent" id="content" cols="30" rows="3">{{ old('txtContent') }}</textarea>
            @error('txtContent')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="py-2 d-flex">
            <div class="">
                <input type="submit" value="Create" class="btn btn-primary ">
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
    })
</script>
@endsection