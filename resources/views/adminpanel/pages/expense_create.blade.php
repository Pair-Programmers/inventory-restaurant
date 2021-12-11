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
            <h2>Create News</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a>News</a>
                </li>
                <li class="active">
                    <strong>Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="ibox-content">
                <form method="post" class="form-horizontal" action="{{ route('admin.expense.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                        <label class="col-sm-2 control-label">Amount</label>

                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">Rs</span>
                                <input type="number" class="form-control" name="amount" required>
                            </div>
                        </div>

                        <label class="col-sm-2 control-label">Date</label>

                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>


                    </div>

                    <div class="form-group">


                        <label class="col-sm-2 control-label">Image</label>

                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="images[]" multiple="multiple">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-2 control-label">Category</label>

                        <div class="col-sm-4">
                            <select class="form-control" name="expense_category_id" required>
                                <option selected disabled>Select</option>
                                @foreach ($categories as $category)

                                    <option value="{{ $category->id }}">{{ $category->name }} </option>
                                @endforeach

                            </select>
                        </div>



                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Account</label>

                        <div class="col-sm-4">
                            <select class="form-control" name="account_id" required>
                                <option value="asd">aasd</option>

                            </select>
                        </div>



                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Note</label>
                        <div class="col-sm-4">
                            <textarea name="note" id="" cols="50" rows="5"></textarea>
                        </div>

                    </div>


                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">Save Changes</button>
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
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
@endsection
