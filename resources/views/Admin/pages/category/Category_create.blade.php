@extends('Admin.main.main')
@section('content')
<style>
    .txtback {

        color: gray;
        transition: 0.4s;

    }
</style>
<div class="pt-5" style="width: 700px; height: 630px;">
    <h4 class="text-center bg-gradient pb-3 text-secondary">Creating Category</h4>
    <form action="" class="shadow-sm card card-body p-4" method="post">
        <p class="text-center text-black-50">Create the information to category</p>
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
            <label for="categoryName" class="form-label text-muted fw-bolder">Category Name<span class="text-danger">(*)</span></label>
            <input type="text" id="categoryName" name="txtCategoryName" class="form-control shadow-none" value="{{old('txtCategoryName')}}" placeholder="Enter category name">
            @error('txtCategoryName')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="row-cols-md py-2">
            <label for="categorys" class="form-label text-muted fw-bolder">Description<span class="text-danger">(*)</span></label>
            <textarea rows="4" id="categorys" name="txtDescription" class="form-control shadow-none" placeholder="Description is not greater than 200 charater">{{old('txtDescription')}}</textarea>
            @error('txtDescription')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="row-cols-md py-2">
            <label for="content" class="text-muted fw-bolder">Details</label>
            <textarea rows="4" class="form-control shadow-none"  name="txtDetail">{{old('txtDetail')}}</textarea>
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