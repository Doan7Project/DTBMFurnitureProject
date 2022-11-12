@extends('Admin.main.main')
@section('content')
<style>
    .txtback {

        color: gray;
        transition: 0.4s;

    }
</style>
<div class="shadow-sm card" style="width: 700px; height: 630px;">
    <h4 class="text-center bg-primary bg-gradient p-3 text-white">New Category Creating</h4>
    <p class="text-center text-black-50">Create the information to category</p>

    <form action="" class="card-body" method="post">
    <div class=" text-end">
        <a class="text-decoration-none btn btn-success text-light" href="{{route('categorylist')}}">
        <i class="bi bi-card-list pe-2"></i>List Item
        </a>
    </div>
        @if (Session::has('success'))
        <div class="alert alert-success opacity-100">
            {{Session::get('success')}}
        </div>
        @endif

        <div class="row-cols-md py-2">
            <label for="categoryName" class="form-label text-black fw-bolder">Category Name</label>
            <input type="text" id="categoryName" name="txtCategoryName" class="form-control shadow-none" value="{{old('txtCategoryName')}}" placeholder="Enter category name">
            @error('txtCategoryName')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="row-cols-md py-2">
            <label for="category" class="form-label text-black fw-bolder">Description</label>
            <textarea rows="3" id="category" name="txtDescription" class="form-control shadow-none" placeholder="Description is not greater than 200 charater">{{old('txtDescription')}}</textarea>
            @error('txtDescription')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="row-cols-md py-2">
            <label for="content" class="text-black fw-bolder">Details</label>
            <textarea rows="4" class="form-control shadow-none"  id="editor1" name="txtDetail">{{old('txtDetail')}}</textarea>
            <!-- <input type="text" id="content" name="txtContent " class="form-control shadow-none"> -->
        </div>
        <div class="py-2 d-flex">
            <div class="">
                <input type="submit" value="Create Category" class="btn btn-primary ">
            </div>
            <div class="mx-2">
                <a href="{{route('index')}}" style="width:100px ;" type="submit" class="btn btn-secondary ">Close</a>
            </div>

        </div>
        @csrf
    </form>
</div>

@endsection