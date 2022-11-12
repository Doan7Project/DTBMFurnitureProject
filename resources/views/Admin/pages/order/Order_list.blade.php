@extends('Admin.main.main')
@section('content')

<style>
    .lg {
        width: 992px
    }

    .status {
        width: 100px
    }
</style>
<div class="border-info">
    <h2 class="text-center">{{$title}}</h2>
    <!-- Nav tabs -->
    <div class="lg">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#pending">List Order Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#done">List Order Done</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#cancel">List Order Cancel</a>
            </li>
        </ul>
          
        <!-- Tab panes -->
        <div class="tab-content">
        <div class="tab-pane container active" id="pending">
            @include('User.alert')
                <table class="table table-hover">
                    <tr class="px-0">
                        <th class="px-0 w-8">#</th>
                        <th class="px-0 col-2">Fullname</th>
                        <th class="px-0 col-3">Email</th>
                        <th class="px-0 col-2">Number order</th>
                        <th class="px-0 col-2">Status</th>
                        <th class="px-0 col-2">Date order</th>
                    </tr>
                    @foreach($items as $key=>$value)
                        @php
                        $status = $value['status'];
                        $status = 'Pending';
                        @endphp
    
                        <form class="" action="/Admin/pages/order_edit/{{$value['order_master_id']}}" method="get">
                            <tr class="items-center">
                                <td class="px-0">{{ $key + 1 }}</td>
                                <td class="px-0">{{ $value['first_name']}} {{ $value['last_name']}}</td>
                                <td class="px-0">{{ $value['email']}}</td>
                                <td class="px-0">{{ $value['order_number'] }}</td>
                                <td class="px-0 ">
                                    <div class="d-flex">
                                        <select class="form-select status" name="txtStatus">
                                            <option selected>{{ $status }}</option>
                                            <option value="1">Done</option>
                                            <option value="2">Cancel</option>
                                        </select>
                                        <button type="submit" class="btn btn-info">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="px-0">{{ $value['created_at']}}</td>
                            </tr>
                        </form>
                    @endforeach
                </table>
        </div>
        <div class="tab-pane container fade" id="done">
            <table class="table table-hover">
                <tr class="px-0">
                    <th class="px-0 col-1"># </th>
                    <th class="px-0 col-3">Fullname</th>
                    <th class="px-0 col-3">Email</th>
                    <th class="px-0 col-2">Number order</th>
                    <th class="px-0 col-1">Status</th>
                    <th class="px-0 col-3">Date order</th>
                </tr>
                @foreach($items2 as $key=>$value)
                    @php
                    $status = $value['status'];
                    $status = 'Done';
                    @endphp
                    <tr class="">
                        <td class="px-0">{{ $key + 1 }}</td>
                        <td class="px-0">{{ $value['first_name']}} {{ $value['last_name']}}</td>
                        <td class="px-0">{{ $value['email']}}</td>
                        <td class="px-0">{{ $value['order_number'] }}</td>
                        <td class="px-0">{{ $status }}</td>
                        <td class="px-0">{{ $value['created_at']}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="tab-pane container fade" id="cancel">
            <table class="table table-hover">
                <tr class="px-0">
                    <th class="px-0 col-1">#</th>
                    <th class="px-0 col-3">Fullname</th>
                    <th class="px-0 col-3">Email</th>
                    <th class="px-0 col-2">Number order</th>
                    <th class="px-0 col-1">Status</th>
                    <th class="px-0 col-3">Date order</th>
                </tr>
                @foreach($items3 as $key=>$value)
                    @php
                    $status = $value['status'];
                    $status = 'Cancel';
                    @endphp
                    <tr class="">
                        <td class="px-0">{{ $key + 1 }}</td>
                        <td class="px-0">{{ $value['first_name']}} {{ $value['last_name']}}</td>
                        <td class="px-0">{{ $value['email']}}</td>
                        <td class="px-0">{{ $value['order_number'] }}</td>
                        <td class="px-0">{{ $status }}</td>
                        <td class="px-0">{{ $value['created_at']}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        </div>
    </div>
</div>

@endsection