@extends('Admin.main.main')
@section('content')
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#table').DataTable({
            // dom: 'Plfrtip',
            language: {
                search: '',
                searchPlaceholder: "Ready for searching......",
            }
        });
        // $('div.dataTables_filter input', table.table().container()).attr('class', 'txtInput');

    });
</script>

<style>
  .dataTables_filter {
        position: relative;
        float: left !important;
    }

    .dataTables_length {
        float: right !important;
    }
    .dataTables_length label{
        color: #7C7C7C;
    }
    .dataTables_length label select{
        outline: none;
        cursor: pointer;

    }
    .dataTables_filter input {
        width: 250px;
        height: 34px;
        background: #fcfcfc;
        border: 1px solid #aaba;
        border-radius: 5px;
        outline: none;
        text-indent: 10px;
        margin: 0px 0px 10px;
    }
    .dataTables_filter input:hover {
        box-shadow: 0px 0px 5px 1px #88888893;
        transition: 0.4s;
    }

    .dataTables_filter input:focus {
        box-shadow: 0px 0px 5px 1px #88888893;
        transition: 0.4s;
    }

</style>


<div class="mt-6  rounded" style="width: 100%;">
    @if (Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
 
    <div class="table-responsive pt-4 shadow-sm container" style="width: auto;">
        <div class="d-flex justify-content-between align-items-center pb-4">
    
            <div>
                <h5 class=" bg-gradient text-muted fw-bolder">Product images information</h5>
    
            </div>
            <div>
                <a class="btn btn-success" href="{{url("image/create")}}">
                   Add more
                </a>
                
            </div>
        </div>
        <table class="table table-bordered display ui celled " id="table">
            
            <thead class="bg-primary bg-opacity-75 text-white">
                <tr VALIGN=Middle Align=Middle>
                    <th VALIGN=Middle Align=Middle>No.</th>
                    <th VALIGN=Middle Align=Left>
                        <div style="width: 120px;">Product ID</div>
                    </th>
                    <th VALIGN=Middle Align=Left>
                        <div class="text-center">Image</div>
                    </th>

                    <th VALIGN=Middle Align=Middle>
                        <div class="text-center ">Edit</div>
                    </th>
                    <th VALIGN=Middle Align=Middle>
                        <div class="text-center ">Delete</div>
                    </th>
                </tr>
            </thead>

            <tbody class="alldata">
                @foreach($items as $key => $data)
                <tr>
                    <td VALIGN=Middle Align=Middle>{{$key+1}}</td>
                    <td VALIGN=Middle Align=Left>{{$data->products->product_name}}</td>
                    <td VALIGN=Middle Align=Left>
                        <div class="m-auto" style="width:150px ;">
                            <img src="{{$data->image}}" style="width: 100%;" alt="">
                        </div>
                    </td>
          
                    <td VALIGN=Middle Align=Middle>
                        <a class="btn btn-primary" href="{{url("image/show/{$data->id}")}}">
                            <i class="bi bi-pencil-square text-white pe-2"></i>Edit
                        </a>
                    </td>
                    <td VALIGN=Middle Align=Middle>
                        <a href="{{url("image/destroy/{$data->id}")}}" class="btn btn-danger text-white" onclick="return confirm('Are you sure to delete {{$data->product_name}}')">
                            <i class="bi bi-trash3 pe-2"></i>Delete
                        </a>

                    </td>
                </tr>

                @endforeach
            </tbody>

            <tbody id="Content" class="searchdata"></tbody>
        </table>
    </div>
    <!-- --modal delete -->
    <!-- Modal -->

</div>

@endsection