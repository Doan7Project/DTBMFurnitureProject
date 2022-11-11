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
   .view {
        color: green;
        font-size: 20px;
    }
</style>

<div class="container">
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
            <h4>Customer List</h3>
        </div>
    </div>
    <div class="table-responsive">
        <table id="table" class="table  table-lg">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">birthday</th>
                    <th scope="col">Function</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customerList as $key => $customerLists)
                <?php 
                if($customerLists->gender == 1):
                    $gender = "Male";
                    elseif($customerLists->gender == 2):
                    $gender = "Female";
            else:
            $gender = "Rather not to say";
               endif;
            ?>
                <tr>
                    <td>{{ $key+1}}</td>
                    <td>{{ $customerLists->first_name .' '. $customerLists->last_name }}</td>
                    <td>{{ $gender }}</td>
                    <td>{{ $customerLists->email}}</td>
                    <td>{{ $customerLists->phone}}</td>
                    <td>{{ $customerLists->birthday}}</td>
                    <td class="text-center"><a class="view" href="{{ url("/viewCustomerDetail/{$customerLists->id}") }}"><i class="bi bi-eye-fill"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection