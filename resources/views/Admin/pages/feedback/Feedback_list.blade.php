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
    
    
    <div class="d-flex justify-content-between align-items-end mt-5">
        <div>
    
        </div>
    </div>
    <div class="mt-6  border border-1 rounded" style="width: 1000px;">
        <h5 class="bg-primary bg-gradient text-white p-3">Slide show list information</h5>
        <div class="table-responsive p-3 shadow-sm container" style="width: auto;">
    
            <table class="table table-bordered display ui celled " id="table">
    
                <thead class="bg-primary bg-opacity-75 text-white">
                    <tr VALIGN=Middle Align=Middle>
    
                        <th VALIGN=Middle Align=Left>
                            <div style="width: 120px;">ID Product</div>
                        </th>
                        <th VALIGN=Middle Align=Left>
                            <div class="text-center">Name Product</div>
                        </th>
    
                        <th VALIGN=Middle Align=Middle>
                            <div class="text-center ">Name customer</div>
                        </th>
                        <th VALIGN=Middle Align=Middle>
                            <div class="text-center ">status</div>
                        </th>
                        <th VALIGN=Middle Align=Middle>
                            <div class="text-center ">eValuate</div>
                        </th>
                        <th VALIGN=Middle Align=Middle>
                            <div class="text-center ">Content</div>
                        </th>
                        <!-- <th VALIGN=Middle Align=Middle>
                            <div class="text-center ">Edit</div>
                        </th> -->
                    </tr>
                </thead>
    
                <tbody class="alldata">
                    @foreach($feee as $data )
                    @foreach($pro as $pros )
                    @foreach($cus as $cuss )
    
                    @if($data -> product_id ==($pros -> id))
                    @if($cuss-> id ==($data -> customer_id))
                    <tr>
    
                        <td>{{$data -> product_id}}</td>
    <td>{{$pros -> product_name }}</td>
    
                        <td>{{$cuss -> last_name }} {{$cuss -> first_name }}</td>
                        <td>{{$data -> status}}</td>
                        <td>{{$data -> evaluate}}</td>
                        <td>{{$data -> content}}</td>
                        <!-- <td><a href="{{url("Admin/pages/Feedback_view/{$data->id}")}}" class=" btn btn-danger">View</a>
                        </td> -->
    
                    </tr>
                    <!-- //modal -->
    
                    @endif
                    @endif
                    @endforeach
                    @endforeach
                    @endforeach
    
                </tbody>
    
                <tbody id="Content" class="searchdata"></tbody>
            </table>
        </div>
        <!-- --modal delete -->
        <!-- Modal -->
    
    </div>
@endsection