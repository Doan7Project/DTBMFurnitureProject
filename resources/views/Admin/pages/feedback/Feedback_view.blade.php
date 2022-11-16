@extends('Admin.main.main')
@section('content')
<style>
.cardfeed {
    height: 500px;
    width: 500px;
    border: 10px solid #0d6efd;
    padding: 20px;


}
</style>
<div class="infoCs  shadow-sm cardfeed">
    <td><a class="btn btn-success back1 mb-3" href="{{url("Admin/pages/Feedback_list")}}">Back</a></td>
    <form action="{{ url("Admin/pages/Feedback_view_pro/$feeds->id") }}" method="get">

        <div class="row p-2">
            <div class="col-lg-12">



                <div class="pt-2">
                    <span><span class="fw-bolder pe-2">ID Product:</span>{{$feeds -> product_id}}</span>
                </div>
                <div class="pt-2">
                    <span><span class="fw-bolder pe-2">Evaluate:</span>{{$feeds -> evaluate}}</span>
                </div>
                <div class="pt-2">
                    <span><span class="fw-bolder pe-2">Status:</span>{{$feeds -> status}}</span>
                </div>
                <div class="pt-2">
                    <span><span class="fw-bolder pe-2">Content:</span>{{$feeds -> content}}</span>
                </div>
                <div class="pt-2">
                    <span><span class="fw-bolder pe-2">Day:</span>{{$feeds -> created_at}}</span>
                </div>

            </div>


        </div>
    </form>

</div>
@stop