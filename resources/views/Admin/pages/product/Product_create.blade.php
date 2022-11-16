@extends('Admin.main.main')
@section('content')
<?php



$arrstatus = [
    [

        'id' => '1',
        'status' => '0',
        'descrip' => 'Active'
    ],
    [

        'id' => '2',
        'status' => '1',
        'descrip' => 'Inative'
    ]


];

$arrmodels = [
    [
        'id' => '1',
        'model' => 'Default'
    ],
    [
        'id' => '2',
        'model' => 'Trending'
    ],
    [
        'id' => '3',
        'model' => 'New arrival'
    ],
    [
        'id' => '4',
        'model' => 'Featured'
    ],
    [
        'id' => '5',
        'model' => 'Top'
    ]
    ,
    [
        'id' => '6',
        'model' => 'Featured_1'
],
    [
        'id' => '7',
        'model' => 'Featured_2'
    ]
    ,
    [
        'id' => '8',
        'model' => 'popular_1'
    ]
    ,
    [
        'id' => '9',
        'model' => 'popular_2'
    ]
    ,
    [
        'id' => '10',
        'model' => 'popular_3'
    ]
];

$arrmade = [
    [
        'id' => '1',
        'madein' => 'Viet Nam'
    ],
    [
        'id' => '2',
        'madein' => 'Thailand'
    ],
    [
        'id' => '3',
        'madein' => 'Singapore'
    ],
    [
        'id' => '4',
        'madein' => 'Japan'
    ],
    [
        'id' => '5',
        'madein' => 'China'
]
]
?>
<div class="card shadow-sm" style="width:100% ;">
    <h4 class="text-center bg-gradient pt-5 pb-2 text-muted fw-bolder">Create Product Table</h4>
    <p class="text-center text-black-50">Create the information to product</p>

    <form action="" method="post" class="card-body">
        <div class=" text-end">
            <a class="text-decoration-none btn btn-success text-light" href="{{route('list')}}">
                <i class="bi bi-card-list pe-2"></i>List Item
            </a>
        </div>
        @csrf
        <div class="row pt-2">
            <div class="col-md-4">
                <label for="categoryid" class="form-label text-muted fw-bolder">Category preferences<span class="text-danger">(*)</span></label>
                <select class="form-select shadow-none" name="txtCategoryID" id="categoryid">
                    <option value="">Please choose category...</option>
                    @foreach($category as $key=> $categorys)
                    <option value="{{$categorys->id}}" {{ old('txtCategoryID') == $categorys->id ? 'selected' : '' }}>{{$categorys->CategoryName}}</option>
                    @endforeach
                </select>
                @error('txtCategoryID')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="col-md-3 d-none">
                <label for="productCode" class="form-label text-black fw-bolder">Product Code</label>
                <input  type="text" id="productCode" class="form-control shadow-none" name="txtProductCode" placeholder="Enter product code" style="text-transform:uppercase;" value="{{old('txtProductCode')}}">
                @error('txtProductCode')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-5">
                <label for="productname" class="form-label text-muted fw-bolder">Product Name<span class="text-danger">(*)</span></label>
                <input type="text" id="productname" value="{{ old('txtProductName') }}" class="form-control shadow-none" name="txtProductName" placeholder="Enter product name">
                @error('txtProductName')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="price" class="form-label text-muted fw-bolder">Price - $<span class="text-danger">(*)</span></label>
                <input min="10" max="50000" type="number" id="price" class="form-control shadow-none" name="txtPrice" value="{{ old('txtPrice') }}">
                @error('txtPrice')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row pt-2">        
            <div class="col-md-2">
                <label for="unit" class="form-label text-muted fw-bolder">Unit<span class="text-danger">(*)</span></label>
                <input type="text" id="unit" class="form-control shadow-none" name="txtUnit" value="{{ old('txtUnit') }}">
                @error('txtUnit')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-2">
                <label for="quantity" class="form-label text-muted fw-bolder">Quantity<span class="text-danger">(*)</span></label>
                <input type="number" min="1" max="10000" id="quantity" class="form-control shadow-none" name="txtQuantity" value="{{ old('txtQuantity') }}">
                @error('txtQuantity')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="status" class="form-label text-muted fw-bolder">Status</label>
                <select class="form-select shadow-none" name="txtStatus" id="status">
                    @foreach($arrstatus as $value)
                    <option value="{{$value['status']}}">{{$value['descrip']}}</option>
                    @endforeach
                </select>

            </div>
            <div class="col-md-2">
                <label for="models" class="form-label text-muted fw-bolder">Models</label>
                <select class="form-select shadow-none" name="txtModel" id="models">

                    @foreach($arrmodels as $value)
                    <option value="{{$value['model']}}">{{$value['model']}}</option>
                    @endforeach
                </select>

            </div>
            <div class="col-md-3">
                <label for="madein" class="form-label text-muted fw-bolder">Made In<span class="text-danger">(*)</span></label>
                <select class="form-select shadow-none" name="txtMadein" id="madein">
                    <option value="">Please choose....</option>
                    @foreach($arrmade as $key => $value)
                    <option value="{{$value['madein']}}" {{ old('txtMadein') == $value['madein'] ? 'selected' : '' }}>{{$value['madein']}}</option>                 
                    @endforeach          
                </select>
                @error('txtMadein')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-md-6">
                <label for="upload" class="form-label text-muted fw-bolder">Image<span class="text-danger">(*)</span></label>
                <input type="file" class="form-control shadow-none" value="{{ old('txtImage') }}"  name="txtImage" id="upload" onchange="loadFile(event)">
                <div class="shadow-sm d-flex position-relative rounded border-0 mt-2" style="width: 100% ; height:280px;">
                    <span style="z-index: 1 ;" class="align-self-center text-black-50 position-absolute top-50 start-50 translate-middle fs-4">Image Review...</span>
                    <img class="w-100" class="p-1" id="output" style="z-index: 2;" src="{{ old('txtImage') }}">
                </div>
                <input type="hidden" name="txtImage" id="file" value="{{ old('txtImage') }}">
                @error('txtImage')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="content" class="form-label text-muted fw-bolder">Content<span class="text-danger">(*)</span></label>
                <textarea class="form-control shadow-none" name="txtContent" id="content" cols="30" rows="13">{{ old('txtContent') }}</textarea>
                @error('txtContent')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-md-12">
                <label for="content" class="form-label text-muted fw-bolder">Description<span class="text-danger">(*)</span></label>
                <textarea class="form-control shadow-none" name="txtDescription" id="editor1" cols="30" rows="3">{{ old('txtDescription') }}</textarea>
                @error('txtDescription')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="pt-3 d-flex">
            <div class="">
                <input type="submit" class="btn btn-primary p-2" name="" id="" value="Create Product">
            </div>
            <div class="mx-2">
                <a href="{{route('index')}}" style="width:100px ;" type="submit" class="btn btn-secondary p-2">Close</a>
            </div>


        </div>

    </form>


</div>
<script type="text/javascript">
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