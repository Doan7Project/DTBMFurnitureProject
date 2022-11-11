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
<!-- @if (Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif -->


<div class="mt-6  rounded" style="width:100%;">
    <a class="btn btn-success mb-3" href="{{url("Admin/pages/Slider_create")}}">
        <i class="bi bi-plus-square text-white pe-3"></i> Add more
    </a>
    <h5 class="bg-primary bg-gradient text-white p-3">Slide show list information</h5>
    <div class="table-responsive p-3 shadow-sm container" style="width: auto;">

        <table class="table table-bordered display ui celled " id="table">

            <thead class="bg-primary bg-opacity-75 text-white">
                <tr VALIGN=Middle Align=Middle>

                    <th VALIGN=Middle Align=Left>
                        <div style="width: 120px;">Name</div>
                    </th>
                    <th VALIGN=Middle Align=Left>
                        <div class="text-center">Image</div>
                    </th>

                    <th VALIGN=Middle Align=Middle>
                        <div class="text-center ">Status</div>
                    </th>
                    <th VALIGN=Middle Align=Middle>
                        <div class="text-center ">Description</div>
                    </th>
                    <th VALIGN=Middle Align=Middle>
                        <div class="text-center ">Edit</div>
                    </th>
                </tr>
            </thead>

            <tbody class="alldata">
                @foreach($slide as $data)
                <tr class="text-center ">


                    <td>{{$data -> name}}</td>
                    <td><img src=" {{asset('/assets/images/slideshow/'.$data ->image)}}" style="width:100px " alt="">
                    </td>
                    <td>

                        <?php if($data->status == 'Active'){ ?>
                        <a href="#" class="btn btn-success">Active</a>
                        <?php }else{ ?>
                        <a href="#" class="btn btn-danger">Unative</a>
                        <?php } ?>

                    </td>
                    <td>{{$data -> description}}</td>



                    <td><a href="{{url('Admin/pages/Slider_delete/'.$data->id)}}" class=" btn btn-danger">Delete</a> |
                        <a href="{{url("Admin/pages/Slider_update/{$data-> id}")}}" class="btn btn-primary">Update</a>
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