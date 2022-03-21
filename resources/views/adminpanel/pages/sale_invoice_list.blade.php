@extends('adminpanel.layout.master')
<!-- ================================== EXTEND TITLE AND META TAGS ============================= -->
@section('title-meta')
<title>Inventory | Dashboard</title>
<meta name="description" content="this is description">
@endsection
<!-- ====================================== EXTRA CSS LINKS ==================================== -->
@section('other-css')
<link href="{{asset('adminpanel')}}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
@endsection
<!-- ======================================== BODY CONTENT ====================================== -->
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2 >List of Sale Invoices</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Sale Invoices</a>
            </li>
            <li class="active">
                <strong> List</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">


        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>All the Packages are listed here..</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>No.</th>
                <th>ID/Code</th>
                <th>Date</th>
                <th>Amount</th>
                <th># Items</th>
                <th>Customer</th>
                <th>Discount</th>
                <th>Cash Recieved</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @php
                $counter = 1;
            @endphp

            @foreach($invoices as $invoice)
                <tr class="gradeX" id="row-{{$invoice->id}}">
                    <td>{{$counter}}</td>
                    <td class="center">{{sprintf("%05d", $invoice->id)}}</td>
                    <td class="center">{{date('d-M-Y', strtotime($invoice->issue_date))}}</td>
                    <td class="center">{{$invoice->amount}}</td>
                    <td class="center">{{$invoice->no_of_items}}</td>
                    <td class="center">{{$invoice->customer->name}}</td>
                    <td class="center">{{$invoice->discount}}</td>
                    <td class="center">{{$invoice->cash_recieved}}</td>
                    <td class="center">{{$invoice->group}}</td>

                    <td>
                        <a href="{{route('admin.sale_invoice.show', $invoice->id)}}">
                            <small class="label label-warning"><i class="fa"></i>View</small>
                        </a>
                        {{-- <a href="{{route('admin.sale_invoice.show', $invoice->id)}}">
                            <small class="label label-primary"><i class="fa"></i>Edit</small>
                        </a> --}}
                        <a onclick="deleteSaleInvoice({{$invoice->id}})">
                            <small class="label label-danger"><i class="fa"></i>Delete</small>
                        </a>
                    </td>
                </tr>

                @php
                    $counter = $counter + 1;
                @endphp
            @endforeach


            </tbody>
            <tfoot>
            <tr>
                <th>No.</th>
                <th>ID/Code</th>
                <th>Date</th>
                <th>Amount</th>
                <th># Items</th>
                <th>Customer</th>
                <th>Discount</th>
                <th>Cash Recieved</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
            </tfoot>
            </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>

@endsection
<!-- ======================================== FOOTER PAGE SCRIPT ======================================= -->
@section('other-script')
<!-- Page-Level Scripts -->

<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [

                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ]

        });

        /* Init DataTables */
        var oTable = $('#editable').DataTable();

        /* Apply the jEditable handlers to the table */
        oTable.$('td').editable( '../example_ajax.php', {
            "callback": function( sValue, y ) {
                var aPos = oTable.fnGetPosition( this );
                oTable.fnUpdate( sValue, aPos[0], aPos[1] );
            },
            "submitdata": function ( value, settings ) {
                return {
                    "row_id": this.parentNode.getAttribute('id'),
                    "column": oTable.fnGetPosition( this )[2]
                };
            },

            "width": "90%",
            "height": "100%"
        } );


    });

    function fnClickAddRow() {
        $('#editable').dataTable().fnAddData( [
            "Custom row",
            "New row",
            "New row",
            "New row",
            "New row" ] );

    }
</script>
<script>
    function deleteSaleInvoice(id) {
    swal({

        title: "You really want to delete ？", // You really want to delete ?
        text: "Your will not be able to recover this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Delete",
        cancelButtonText: "No, Cancel",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                method: 'GET',
                url: "{{ route('admin.sale_invoice.destroy', '') }}/" + id,
                success: function(response) {
                    console.log(response);
                    if(response.success){
                        swal("Deleted!", "News has been deleted.", "success");
                        $("#row-"+id).remove();
                    }
                    else if(response.error){
                        swal("Coudnt Found!", "News not Found", "error");
                    }
                    else{
                        swal("Error!", "Not Authorize | Logical Error", "error");
                    }
                },
                error: function (response){
                    console.log(response);
                    swal("Error!", "Cannot delete !", "error");
                }
            });
        }
        else {
            swal("Cancelled", "News is safe :)", "error");
        }

    });
    }
</script>


@endsection
