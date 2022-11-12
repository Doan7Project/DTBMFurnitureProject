@extends('Admin.main.main')
@section('content')
<style>
    .infoCs {

        width: 60%;
        padding: 40px;

    }

    .name {
        color: rgb(17, 104, 174);
        font-size: 16px;
        font-weight: bold;
    }
</style>
<?php 
if($customerDetail->gender == 1):
    $gender = "Male";
    elseif($customerDetail->gender == 2):
    $gender = "Female";
else:
$gender = "Rather not to say";
endif;
?>
<div class="infoCs card card-body shadow-sm">
    
    <div class="d-flex pb-2 align-items-center">
        <div class="mb-2">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="22" height="22"
                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff"
                    dy=".3em">32x32</text>

            </svg>
        </div>
        <div>
            <h4>Customer Information</h3>
        </div>
    </div>
    <div class="d-flex justify-content-between">
       <div>
        <span class="name">{{ $customerDetail->first_name.' '. $customerDetail->last_name }}</span>
       </div>
        <div>
            <a href="{{ route('customer.list') }}">Customer List</a>
        </div>
    </div>
    <hr>
    <div class="row p-2">
        <div class="col-lg-12">
            <div class="pt-2">
                <span><span class="fw-bolder pe-2">DOB:</span>{{
                    $customerDetail->birthday}}</span>
            </div>
            <div class="pt-2">
                <span><span class="fw-bolder pe-2">Gender:</span>{{ $gender}}</span>
            </div>
            <div class="pt-2">
                <span><span class="fw-bolder pe-2">Email:</span>{{ $customerDetail->email}}</span>

            </div>
            <div class="pt-2">
                <span><span class="fw-bolder pe-2">Phone:</span>{{ $customerDetail->phone}}</span>
            </div>
            <div class="pt-2">
                <span><span class="fw-bolder pe-2">City:</span>{{ $customerDetail->city}}</span>
            </div>
            <div class="pt-2">
                <span><span class="fw-bolder pe-2">Country:</span>{{ $customerDetail->country}}</span>
            </div>
            <div class="pt-2 pb-2">
                <span><span class="fw-bolder pe-2">Address:</span>{{ $customerDetail->address}}</span>
            </div>
        </div>
    </div>
    <hr>
    {{-- <H1>Code:{{ $customerDetail->id }}</H1>
    <H1>Code:{{ $customerDetail->first_name.' '. $customerDetail->last_name }}</H1>
    <H1>Code:{{ $customerDetail->email }}</H1>
    <H1>Code:{{ $customerDetail->phone }}</H1>
    <H1>Code:{{ $customerDetail->password }}</H1> --}}
</div>


@endsection