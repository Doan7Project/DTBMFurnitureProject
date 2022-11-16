@extends('Admin.main.main')
@section('content')

<div class="m-5 rounded">
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    <div class="d-flex justify-content-between align-items-center  pb-3 ">

        <div>

            <h4 class="bg-gradient text-secondary rounded">Category list information</h4>
        </div>
        <div>

            <a class="btn btn-success" href="{{url("Admin/pages/Category_create")}}">
                <i class="bi bi-building-add text-white"></i> Add more
            </a>
        </div>
    </div>
    <div class="p-2 bg-white border border-1 rounded container">
        <table class="table   rounded" id="table">
            <thead>
                <tr>
                    <th class="px-3">No.</th>
                    <th class="px-3">
                        <div style="width: 150px ;">Category Name</div>
                    </th>
                    <th class="px-3">
                        <div style="width:250px ;">Detail</div>
                    </th>

                    <th class="px-3">
                        <div style="width: 80px ;">Edit</div>
                    </th>
                    <th class="px-3 text-center">
                        <div style="width: 80px ;">Delete</div>
                    </th>
                </tr>
            </thead>
            @foreach($category as $key => $data)
            <tbody class="p-2">
                <tr>
                    <td class="px-3" VALIGN=Middle Align=Left>{{$key+1}}</td>
                    <td class="px-3" VALIGN=Middle Align=Left>{{$data->CategoryName}}</td>
                    <td class="px-3" VALIGN=Middle Align=Left>{{$data->Detail}}</td>
                    <td VALIGN=Middle Align=Left>
                        <a class="btn btn-primary text-white" href="{{url("Admin/pages/Category_update/{$data->id}")}}">
                            <i class="bi bi-pencil-square pe-2"></i>Edit
                        </a>
                    </td>
                    <?php 
                      foreach ($product as $products):
                      if($products->category_id == $data->id):
                      $value = "d-none" ;
                      $invalid = "";
                      break;
                else:
                $value = "";
                $invalid = "d-none";
                endif;
                endforeach;
                    ?>

                    <td VALIGN=Middle Align=Center>
                        <a  class="{{ $value }} btn btn-danger text-white" href="{{url("Admin/pages/delete/{$data->id}")}}"
                            onclick="return confirm('Are you sure to delete {{$data->CategoryName}}')" style="color:
                            orangered;">
                            <i class="bi bi-trash3 pe-2"></i>Delete
                        </a>
                        <span class="{{ $invalid }} fw-bolder text-muted text-center">Invalid</span>
                    </td>
                </tr>
            </tbody>
        
            @endforeach
        </table>
    </div>
</div>

@endsection