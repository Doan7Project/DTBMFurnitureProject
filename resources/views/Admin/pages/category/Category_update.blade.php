@extends('Admin.main.main')
@section('content')
<style>
.txtback{

color: gray;
transition: 0.4s;

}
</style>
<div class="shadow-sm card" style="width: 700px; height: auto;">
    <h4 class="text-center bg-primary bg-gradient p-3 text-white">Update Category</h4>
    <p class="text-center text-black-50">{{$title}}</p>
    <form class="card-body" method="POST" action="">
    <div class="text-end">
            <a href="{{route('categorylist')}}" class="txtback fs-5 text-decoration-none"><i class="bi bi-reply-fill fs-4"></i>Back</a>
        </div>
    @csrf
        <div class="row-cols-md py-2">
            <label for="categoryName" class="form-label text-black fw-bolder">ID</label>
            <input type="text" id="categoryName"  class="form-control shadow-none" value="{{$menu->id}}" readonly>
        </div>
        <div class="row-cols-md py-2">
            <label for="categoryName" class="form-label text-black fw-bolder">Category Name</label>
            <input type="text" id="categoryName" name="txtCategoryName" class="form-control shadow-none" value="{{$menu->CategoryName}}" placeholder="Enter category name">
        </div>
        <div class="row-cols-md py-2">
            <label for="category" class="form-label text-black fw-bolder">Description</label>
            <textarea rows="4" id="category" name="txtDescription" class="form-control shadow-none" placeholder="Description is not greater than 200 charater">{{$menu->Description}}</textarea>

        </div>
        <div class="row-cols-md py-2">
            <label for="content" class="form-label text-black fw-bolder">Details</label>
            <textarea rows="5" class="form-control shadow-none"  name="txtDetail">{{$menu->Detail}}</textarea>
            <!-- <input type="text" id="content" name="txtContent " class="form-control shadow-none"> -->
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