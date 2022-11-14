@extends('Admin.main.main')
@section('content')
<style>
.txtback{

color: gray;
transition: 0.4s;

}
</style>
<div class="shadow-sm mt-5 card" style="width: 700px; height: auto;">
    <h4 class="text-center bg-gradient pt-4 pb-2 text-secondary">Update Category</h4>
    <p class="text-center text-muted">{{$title}}</p>
    <form class="card-body" method="POST" action="">
    <div class="text-end">
            <a href="{{route('categorylist')}}" class="txtback fs-5 text-decoration-none"><i class="bi bi-reply-fill fs-4"></i>Back</a>
        </div>
    @csrf
        <div class="row-cols-md py-2">
            <label for="categoryName" class="form-label text-muted fw-bolder">Product ID</label>
            <input type="text" id="categoryName"  class="form-control shadow-none" value="{{$menu->id}}" readonly>
        </div>
        <div class="row-cols-md py-2">
            <label for="categoryName" class="form-label text-muted fw-bolder">Category Name</label>
            <input type="text" id="categoryName" name="txtCategoryName" class="form-control shadow-none" value="{{$menu->CategoryName}}" placeholder="Enter category name">
            @error('txtCategoryName')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="row-cols-md py-2">
            <label for="categorys" class="form-label text-muted fw-bolder">Description</label>
            <textarea rows="4" id="categorys" name="txtDescription" class="form-control shadow-none" placeholder="Description is not greater than 200 charater">{{$menu->Description}}</textarea>
            @error('txtDescription')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="row-cols-md py-2">
            <label for="content" class="form-label text-muted fw-bolder">Details</label>
            <textarea rows="5" class="form-control shadow-none"  name="txtDetail">{{$menu->Detail}}</textarea>
            @error('txtDetail')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="py-2 d-flex">
            <div class="">
                <input type="submit" value="Update Category" onclick="return confirm('Are you sure to update data')" class="btn btn-primary">
            </div>
            <div class="mx-2">
                <a href="{{route('index')}}" style="width:100px ;" type="submit" class="btn btn-secondary ">Close</a>
            </div>
        </div>
    </form>
</div>
@endsection