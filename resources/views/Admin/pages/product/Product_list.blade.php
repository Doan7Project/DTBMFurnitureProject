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
        $('div.dataTables_filter input', table.table().container()).attr('class', 'txtInput');
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

    .dataTables_length label {
        color: #7C7C7C;
    }

    .dataTables_length label select {
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

<div class="container">
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    <div>
        @include('Admin.pages.product.ViewManagement')
    </div>
    <div class="d-flex mt-5 justify-content-between align-items-end">
        <div>
            <a class="btn btn-success mb-3" href="{{url("product/create")}}">
                <i class="bi bi-plus-square text-white pe-2"></i> Add more
            </a>
        </div>
        <div class="mb-3 pe-2">
            <a href="" class="text-secondary text-decoration-none" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample"><i class="bi bi-plus"></i>View Management</a>
         
        </div>

    </div>
   
    <div class="mt-6 border border-1 rounded">
        <h5 class="bg-primary bg-gradient text-white p-3">Product list information</h5>
        <div class="table-responsive p-3 shadow-sm container" style="width: 1000px;">
            <table class="table table-bordered display ui celled " id="table">
                <thead class="bg-primary bg-opacity-75 text-white">
                    <tr VALIGN=Middle Align=Middle>
                        <th VALIGN=Middle Align=Middle>No.</th>
                        {{-- <th VALIGN=Middle Align=Left>
                            <div style="width: 120px;">category Name</div>
                        </th> --}}
                        <th VALIGN=Middle Align=Left>
                            <div style="width: 200px;">Product Name</div>
                        </th>
                        {{-- <th VALIGN=Middle Align=Left>
                            <div style="width: 50px;">Price</div>
                        </th>
                        <th VALIGN=Middle Align=Left>
                            <div class="text-center" style="width: 50px;">Unit</div>
                        </th>
                        <th VALIGN=Middle Align=Middle>
                            <div class="text-center" style="width: 50px;">Qty</div>
                        </th> --}}
                        <th VALIGN=Middle Align=Middle>
                            <div class="text-center" style="width: 70px;">Status</div>
                        </th>
                        <th VALIGN=Middle Align=Left>
                            <div style="width: 100px;">Models</div>
                        </th>
                        {{-- <th VALIGN=Middle Align=Left>
                            <div style="width: 100px;">Made in</div>
                        </th> --}}
                        {{-- <th VALIGN=Middle Align=Middle>Category_id</th> --}}
                        <th VALIGN=Middle Align=Left>
                            <div class="text-center" style="width: 100px;">Image</div>
                        </th>
                        <th VALIGN=Middle Align=Middle>
                            <div class="text-center" style="width: 100px;">Edit</div>
                        </th>
                        <th VALIGN=Middle Align=Middle>
                            <div class="text-center" style="width: 100px;">Delete</div>
                        </th>
                    </tr>
                </thead>

                <tbody class="alldata">
                    @foreach($items as $key => $data)
                    <tr>
                        <td VALIGN=Middle Align=Middle>{{$key+1}}
                            <a href="{{url("product/show/{$data->id}")}}">
                                <i class="bi bi-pencil-square text-primary pe-2"></i>
                            </a>
                        </td>
                        {{-- <td VALIGN=Middle Align=Left>{{$data->product_categories->CategoryName}}</td> --}}
                        <td VALIGN=Middle Align=Left>{{$data->product_name}}</td>
                        {{-- <td VALIGN=Middle Align=Left>{{$data->price}}</td>
                        <td VALIGN=Middle Align=Middle>{{$data->unit}}</td>
                        <td VALIGN=Middle Align=Middle>{{$data->quantity}}</td> --}}
                        @if($data->status=="0")
                        <td VALIGN=Middle Align=Left>
                            <div class="text-center py-2 text-white rounded bg-success">{{ $data->status == 0 ? 'Active'
                                : 'Inative' }}</div>
                        </td>
                        @else
                        <td VALIGN=Middle Align=Left>
                            <div class="text-center py-2 text-white rounded bg-secondary">{{ $data->status == 0 ?
                                'Active' : 'Inative' }}</div>
                        </td>
                        @endif

                        <td VALIGN=Middle Align=Left>{{$data->models}}</td>
                        {{-- <td VALIGN=Middle Align=Left>{{$data->made_in}}</td> --}}
                        {{-- <td VALIGN=Middle Align=Middle>{{$data->category_id}}</td> --}}
                        <td VALIGN=Middle Align=Left><img src="{{$data->images}}" style="width: 100%;" alt=""></td>
                        <td VALIGN=Middle Align=Middle>
                            <a class="btn btn-primary" href="{{url("product/show/{$data->id}")}}">
                                <i class="bi bi-pencil-square text-white pe-2"></i>Edit
                            </a>
                        </td>
                        <td VALIGN=Middle Align=Middle>
                            <a href="{{url("product/destroy/{$data->id}")}}" class="btn btn-danger text-white"
                                onclick="return confirm('Are you sure to delete {{$data->product_name}}')">
                                <i class="bi bi-trash3 pe-2"></i>Delete
                            </a>

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- --modal delete -->
        <!-- Modal -->

    </div>
</div>

@endsection