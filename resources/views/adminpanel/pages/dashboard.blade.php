@extends('adminpanel.layout.master')
<!-- ================================== EXTEND TITLE AND META TAGS ============================= -->
@section('title-meta')
<title>Bizblanca | Dashboard</title>
<meta name="description" content="this is description">
@endsection
<!-- ====================================== EXTRA CSS LINKS ==================================== -->
@section('other-css')
@endsection
<!-- ======================================== BODY CONTENT ====================================== -->
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">

            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        {{-- <span class="label label-success pull-right">Monthly</span> --}}
                        <h5>Cash in Counter</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{route('admin.login')}}">

                            <h1 class="no-margins">{{$account1->balance}}</h1>
                            {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                            <small>Total cash available</small>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        {{-- <span class="label label-info pull-right">Annual</span> --}}
                        <h5>Cash in Bank Account</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{route('admin.login')}}">
                            <h1 class="no-margins">{{$account2->balance}}</h1>
                            {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                            <small>Total cash available in Bank</small>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        {{-- <span class="label label-primary pull-right">Today</span> --}}
                        <h5>Total Sale</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{route('admin.sale_invoice.index')}}">
                            <h1 class="no-margins">{{$totalSale}}</h1>
                            {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                            <small>Total Amount of Sale Invoices</small>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        {{-- <span class="label label-primary pull-right">Today</span> --}}
                        <h5>Total Purchase</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{route('admin.purchase_invoice.index')}}">
                            <h1 class="no-margins">{{$totalPurchase}}</h1>
                            {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                            <small>Total Amount of Purchase Invoices</small>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        {{-- <span class="label label-primary pull-right">Today</span> --}}
                        <h5>Total Expense</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{route('admin.expense.index')}}">
                            <h1 class="no-margins">{{$totalExpense}}</h1>
                            {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                            <small>Total Expense Amount</small>
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        {{-- <span class="label label-primary pull-right">Today</span> --}}
                        <h5>Total Products</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{route('admin.product.index')}}">
                            <h1 class="no-margins">{{$totalProducts}}</h1>
                            {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                            <small>Total Products Registered</small>
                        </a>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            @if ($paymentIn > $paymentOut)
            <div class="col-lg-3">
                <div class="ibox">
                    <div class="ibox-content">
                        <h5>Profit</h5>
                        <h2>{{$paymentIn-$paymentOut}} Rs.</h2>
                        <div id="sparkline1"></div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-3">
                <div class="ibox">
                    <div class="ibox-content">
                        <h5>Loss</h5>
                        <h2>{{$paymentIn-$paymentOut}} Rs.</h2>
                        <div id="sparkline3"></div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-3">
                <div class="ibox">
                    <div class="ibox-content">
                        <h5 class="m-b-md">Payment In</h5>
                        <h2 class="text-navy">
                            <i class="fa fa-play fa-rotate-270"></i> {{$paymentIn}}
                        </h2>
                        <small>All Payments</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="ibox">
                    <div class="ibox-content">
                        <h5 class="m-b-md">Payment Out</h5>
                        <h2 class="text-danger">
                            <i class="fa fa-play fa-rotate-90"></i> {{$paymentOut}}
                        </h2>
                        <small>All Payments</small>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
<!-- ======================================== FOOTER PAGE SCRIPT ======================================= -->
@section('other-script')
<script>
    $(document).ready(function(){
        function sendMarkRequest(id = null) {
            return $.ajax("", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id
                }
            });
        }
        $(function() {
            $('.mark-as-read').click(function() {
                alert('asdf')
                let request = sendMarkRequest($(this).data('id'));
                request.done(() => {
                    $(this).parents('div.alert').remove();
                });
            });
            $('#mark-all').click(function() {
                let request = sendMarkRequest();
                request.done(() => {
                    $('div.alert').remove();
                })
            });
        });


    });
</script>

@endsection
