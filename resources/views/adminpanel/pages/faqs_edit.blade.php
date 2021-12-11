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
        <h2>Update Faqs</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Faqs</a>
            </li>
            <li class="active">
                <strong>Update</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="ibox-content">
            <form method="post" class="form-horizontal" action="{{route('admin.faqs.update', $faqs->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-sm-2 control-label">Question</label>

                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="question" value="{{$faqs->question}}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="category" required>
                            <option {{ ($faqs->category) == 'A' ? 'selected' : '' }} value="A">A</option>
                            <option {{ ($faqs->category) == 'B' ? 'selected' : '' }} value="B">B</option>
                            <option {{ ($faqs->category) == 'C' ? 'selected' : '' }} value="C">C</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Answer</label>
                    <div class="col-sm-4">
                        <textarea name="answer" id="" cols="120" rows="10" required >{{$faqs->answer}}</textarea>
                    </div>

                </div>


                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-primary" type="submit">Update Faqs</button>
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
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
@endsection
