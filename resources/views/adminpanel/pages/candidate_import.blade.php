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
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Create Course Category</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Category</a>
            </li>
            <li class="active">
                <strong>Create</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="ibox-content">
            <form method="post" class="form-horizontal" action="{{route('admin.candidate.import')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-sm-2 control-label">File</label>
                    <div class="col-sm-4">
                        <input type="file" name="candidates" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="form-control" name="title" required>
                    </div>
                    {{-- <label class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-4">
                        <input type="text"   class="form-control" name="date" value="{{date('Y-m-d')}}" required>
                    </div> --}}
                </div>
                {{-- <div class="form-group">
                    <label class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-4">
                        <input type="file"   class="form-control" name="image"  required>

                    </div>
                </div> --}}
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-primary" type="submit">Import</button>
                    </div>
                </div>
            </form>
        </div>
        <br>
    </div>
</div>
@endsection
<!-- ======================================== FOOTER PAGE SCRIPT ======================================= -->
@section('other-script')

@endsection

