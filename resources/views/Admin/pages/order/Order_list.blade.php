@extends('Admin.main.main')
@section('content')
<style>
    .lg {
        width: 992px
    }

    /*** PANEL INFO ***/
    .with-nav-tabs.panel-info .nav-tabs > li > a,
    .with-nav-tabs.panel-info .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > li > a:focus {
        color: #31708f;
    }
    .with-nav-tabs.panel-info .nav-tabs > .open > a,
    .with-nav-tabs.panel-info .nav-tabs > .open > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > .open > a:focus,
    .with-nav-tabs.panel-info .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > li > a:focus {
        color: #31708f;
        background-color: #bce8f1;
        border-color: transparent;
    }
    .with-nav-tabs.panel-info .nav-tabs > li.active > a,
    .with-nav-tabs.panel-info .nav-tabs > li.active > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > li.active > a:focus {
        color: #31708f;
        background-color: #fff;
        border-color: #bce8f1;
        border-bottom-color: transparent;
    }
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu {
        background-color: #d9edf7;
        border-color: #bce8f1;
    }
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a {
        color: #31708f;   
    }

    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
        background-color: #bce8f1;
    }

    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a,
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
        color: #fff;
        background-color: #31708f;
    }

    .status {
        font-size: 1.6rem;
        width: 100px
    }
</style>

    <div class="bor10 mt-5 pt-4 pb-4 lg">
        <h2 class="text-center">{{$title}}</h2>
        <div class="">
            <div class="panel with-nav-tabs panel-info">
                <div class="">
                        <ul class="nav nav-tabs">
                            <li><a href="#tabPending" data-toggle="tab">List Order Pending</a></li>
                            <li class="active"><a href="#tabDone" data-toggle="tab">List Order Done</a></li>
                            <li><a href="#tabCancel" data-toggle="tab">List Order Cancel</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">

                        <div class="tab-pane fade" id="tabPending">
                            @include('User.alert')
                            <table class="table">
                                <tr class="px-0">
                                    <th class="px-0 col-1">#</th>
                                    <th class="px-0 col-2">Fullname</th>
                                    <th class="px-0 col-3">Email</th>
                                    <th class="px-0 col-2">Number order</th>
                                    <th class="px-0 col-2">Status</th>
                                    <th class="px-0 col-2">Date order</th>
                                </tr>
                                @foreach($items as $key=>$value)
                                @php
                                $status = $value['status'];
                                if($status == 0)
                                    $status = 'Pending';
                                $index = 0;
                                $index += 1;
                                @endphp
                                <form class="" action="/Admin/pages/Order_list" method="post">
                                    <tr class="items-center">
                                        <td class="px-0">{{ $index }}</td>
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
                                                <button type="submit" class="btn border">Update</button>
                                                <input type="hidden" name="orderMasterId" value="{{ $value['order_master_id'] }}" />
                                            </div>
                                        </td>
                                        <td class="px-0">{{ $value['created_at']}}</td>
                                    </tr>
                                </form>
                                @endforeach
                            </table>
                        </div>

                        <div class="tab-pane fade in active" id="tabDone">
                            <form class="lg" method="get">
                                @include('User.alert')
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
                                    $status == 0 ? $status = 'Pending' : $status = 'Done';
                                    $a = 0;
                                    $a += 1;
                                    @endphp
                                    <tr class="">
                                        <td class="px-0">{{ $a }}</td>
                                        <td class="px-0">{{ $value['first_name']}} {{ $value['last_name']}}</td>
                                        <td class="px-0">{{ $value['email']}}</td>
                                        <td class="px-0">{{ $value['order_number'] }}</td>
                                        <td class="px-0">{{ $status }}</td>
                                        <td class="px-0">{{ $value['created_at']}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </form>
                        </div>
                        
                        <div class="tab-pane fade" id="tabCancel">
                            <form class="lg" method="get">
                                @include('User.alert')
                                <table class="table table-hover">
                                    <tr class="px-0">
                                        <th class="px-0 col-1">#</th>
                                        <th class="px-0 col-3">Fullname</th>
                                        <th class="px-0 col-3">Email</th>
                                        <th class="px-0 col-2">Number order</th>
                                        <th class="px-0 col-1">Status</th>
                                        <th class="px-0 col-3">Date order</th>
                                    </tr>
                                    @foreach($items2 as $key=>$value)
                                    @php
                                    $status = $value['status'];
                                    $status == 0 ? $status = 'Pending' : $status = 'Done';
                                    $index3 = 0;
                                    $index3 += 1;
                                    @endphp
                                    <tr class="">
                                        <td class="px-0">{{ $index3 }}</td>
                                        <td class="px-0">{{ $value['first_name']}} {{ $value['last_name']}}</td>
                                        <td class="px-0">{{ $value['email']}}</td>
                                        <td class="px-0">{{ $value['order_number'] }}</td>
                                        <td class="px-0">{{ $status }}</td>
                                        <td class="px-0">{{ $value['created_at']}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection