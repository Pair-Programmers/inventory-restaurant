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
                        <h5>Registered Users</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{route('admin.login')}}">

                            <h1 class="no-margins">{{$noOfUsers}}</h1>
                            {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                            <small>Total No. Of Registered Users</small>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        {{-- <span class="label label-info pull-right">Annual</span> --}}
                        <h5>Candidate</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{route('admin.login')}}">
                            <h1 class="no-margins">{{$noOfCandidate}}</h1>
                            {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                            <small>Total No. Of Candidate</small>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        {{-- <span class="label label-info pull-right">Annual</span> --}}
                        <h5>Company</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">{{$noOfCompany}}</h1>
                        {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                        <small>Total No.Of Registered Company</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        {{-- <span class="label label-primary pull-right">Today</span> --}}
                        <h5>Contact Us Messeges</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{route('admin.login')}}">
                            <h1 class="no-margins">{{$noOfContactusMessages}}</h1>
                            {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                            <small>Total No. Of Contact Us Messeges</small>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        {{-- <span class="label label-danger pull-right">Low value</span> --}}
                        <h5>News</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{route('admin.login')}}">
                            <h1 class="no-margins">{{$noOfActiveNews + $noOfDeActiveNews}}</h1>
                            <!-- <div class="stat-percent font-bold">38% <i class="fa fa-level-down"></i></div>  -->
                            <!-- <small>Total No. Of News</small><br> -->
                            <small>Active <b>{{$noOfActiveNews}}</b> </small><br>
                            <small>InActive <b>{{$noOfDeActiveNews}}</b> </small>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        {{-- <span class="label label-danger pull-right">Low value</span> --}}
                        <h5>Categories</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"></h1>
                        {{-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div> --}}
                        <small>Total Categories</small>
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
