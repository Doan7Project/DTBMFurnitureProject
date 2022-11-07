@extends('Admin.main.main')
@section('content')
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0;
        margin: 1px;
        border: none;
        padding: 0px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        border: none;
        box-shadow: none;


    }

    .dataTables_wrapper .dataTables_paginate .paginate_button .page-link {
        box-shadow: none;
        border: none;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button .page-link:hover {
        border: none;
        box-shadow: none;

    }

    #report_filter {
        display: none;
    }

    .header {
        text-align: center;
        font-size: 30px;
        padding-top: 30px;
    }

    #time {
        font-size: 12px;
        border: none;
    }
</style>

<link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.css') }}">

<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                @include('Admin.pages.order.filter')
            </div>
            <!-- /.card-header -->
            <div class="header" id="header">
                <div>
                    <h3>DTBM Furniture</h3>
                    <h4>The daily revenue report</h2>
                </div>
                <div class="text-end">
                    <span class=" text-muted fs-6 px-4">{{ session('user') }}</span>
                </div>
            </div>
            <div class="card-body">
                <table id="report" class="table table-bordered ">

                    <thead>

                        <tr>
                            <th>Order Number</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Booking Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderDetaiData as $orderDetaiDatas)
                        @foreach ($getCategory as $getCategorys)
                        @if($getCategorys->id == $orderDetaiDatas->products->category_id)
                        <tr>
                            <td>{{ $orderDetaiDatas->order_masters->order_number}}</td>
                            <td>{{ $getCategorys->CategoryName}}</td>
                            <td>{{ $orderDetaiDatas->products->product_name}}</td>
                            <td>{{ $orderDetaiDatas->quantity}}</td>
                            <td>${{ $orderDetaiDatas->products->price}}</td>
                            <th>${{ $orderDetaiDatas->quantity*$orderDetaiDatas->products->price}}</th>
                            <td>{{ $orderDetaiDatas->order_masters->created_at}}</td>

                        </tr>
                        @endif
                        @endforeach
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>

                            <th></th>
                            <th>Total:</th>
                            <th></th>
                            <th id="totalQuanity"></th>
                            <th></th>
                            <th id="total"></th>
                            <th></th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>

    </section>


</div>



<!-- ./wrapper -->

<script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>


<script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>

<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

<script src="{{ asset('template/plugins/jszip/jszip.min.js') }}"></script>

<script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js') }}"></script>

<script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js') }}"></script>

<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>

<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function () {
    var table = $('#report').DataTable({
      "paging": true,
      "lengthChange": false,
 
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    'footer':true,
      "autoWidth": false,
      "responsive": true,
      "dom": 'Bfrtip',
      "buttons": [ 
        {
                extend: 'csv',
                title: 'Data export',
                titleAttr: 'CSV',
                text:'<i class="bi bi-filetype-csv"></i>',
                messageTop: 'This print was produced using the Print button for DataTables'
            },
            {
                extend: 'excelHtml5',
                title: 'Data export',
                text:'<i class="bi bi-file-earmark-spreadsheet"></i>',
                titleAttr: 'Excel',
                messageTop: 'This print was produced using the Print button for DataTables'
            },
            {
                extend: 'pdfHtml5',
                text:'<i class="bi bi-filetype-pdf"></i>',
                titleAttr: 'PDF',
                title: 'Data export',
                messageTop: 'This print was produced using the Print button for DataTables'
            },
            {
                extend: 'print',
                text: '<i class="bi bi-printer"></i>',
                titleAttr: 'Print',
                title:'',
                footer:true,
              customize: function (win) {
             var test =  $("#header")
                $(win.document.body).prepend(test);
            },
    
            exportOptions: {
                columns: ':visible'
            }
            
            },
],
       
      initComplete: function () {
            this.api()
                .columns([1])
                .every(function () {
                    var column = this;
                    var select = $('#searchCategory')
                        // .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
 
                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });
                });
                this.api()
                .columns([2])
                .every(function () {
                    var column = this;
                    var select = $('#searchProduct')
                        // .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
 
                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });
                });
                
        },
     //sum data 
     footerCallback: function (row, data, start, end, display) {
            var api = this.api();
 
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
 
            // Total over all pages
            total = api
                .column(5)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                //total quanity
                totalQuantity = api
                .column(3,{ page: 'current' })
                .data()
                .reduce(function(a,b){
                    return intVal(a) + intVal(b);
                },0);
            // Total over this page
            pageTotal = api
                .column(5, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            // Update footer
        //    $(api.column(5).footer()).html('$' + pageTotal + ' ( $' + total + ' total)');
        //    $(api.column(5).footer()).html('$' + pageTotal);
           $("#total").html('$' + pageTotal);
           $("#totalQuanity").html(totalQuantity);
        },
      
     }).buttons().container().appendTo('#report_wrapper .col-md-6:eq(0)');

  


    });


  
</script>
@endsection