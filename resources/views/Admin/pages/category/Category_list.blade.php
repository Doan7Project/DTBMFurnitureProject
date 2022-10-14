@extends('Admin.main.main')
@section('content')
@if (Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
<div class="m-5 rounded">
    <a class="btn btn-success mb-3" href="{{url("Admin/pages/Category_create")}}">
        <i class="bi bi-plus-square text-white" pe-3"></i> Add more
    </a>
    <h4 class="bg-primary bg-gradient text-white p-3 px-3 rounded">Category list information</h4>
    <div class="p-2 border border-1 rounded container">
        <table class="table border border-1 rounded display ui celled" id="table">
            <thead>
                <tr>
                    <th class="px-3">No.</th>
                    <th class="px-3"><div style="width: 150px ;">Category Name</div></th>
                    <th class="px-3"><div style="width:250px ;">Detail</div></th>
                    <th class="px-3"><div style="width: 50px ;">View</div></th>
                    <th class="px-3"><div style="width: 50px ;">Edit</div></th>
                    <th class="px-3"><div style="width: 50px ;">Delete</div></th>
                </tr>
            </thead>
            @foreach($rs as $key => $data)
            <tbody class="p-2">
                <tr>
                    <td class="px-3" VALIGN=Middle Align=Left>{{$key+1}}</td>
                    <td class="px-3" VALIGN=Middle Align=Left>{{$data->CategoryName}}</td>
                    <td class="px-3" VALIGN=Middle Align=Left>{{$data->Detail}}</td>
                    <td VALIGN=Middle Align=Left>
                        <a class="btn btn-success text-white" href="{{url("category/view/{$data->id}")}}">
                        <i class="bi bi-eye pe-2"></i>View
                        </a>
                    </td>
                    <td VALIGN=Middle Align=Left>
                        <a class="btn btn-primary text-white" href="{{url("Admin/pages/Category_update/{$data->id}")}}">
                            <i class="bi bi-pencil-square pe-2" pe-3"></i>Edit
                        </a>
                    </td>
                    <td VALIGN=Middle Align=Left>
                        <a class="btn btn-danger text-white" href="{{url("Admin/pages/delete/{$data->id}")}}" onclick="return confirm('Are you sure to delete {{$data->CategoryName}}')" style="color: orangered;">
                            <i class="bi bi-trash3 pe-2"></i>Delete
                        </a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>

@endsection