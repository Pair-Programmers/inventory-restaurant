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
            <h2>Create Employee</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a>Employee</a>
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
                <form method="post" class="form-horizontal" action="{{ route('admin.employee.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">



                        <label class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="name"  required>
                        </div>
                        <label class="col-sm-2 control-label">Image</label>

                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="profile_image" multiple="multiple">
                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-sm-2 control-label">Salary</label>

                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon">Rs</span>
                                <input type="number" class="form-control" name="salary" required>
                            </div>
                        </div>

                        <label class="col-sm-2 control-label">CNIC #</label>

                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="cnic"  placeholder="Optional">
                        </div>


                    </div>



                    <div class="form-group">
                        <label class="col-sm-2 control-label">Role</label>

                        <div class="col-sm-4">
                            <select class="form-control" name="role" required>
                                <option selected disabled>Select</option>
                                <option value="Manager">Manager</option>
                                <option value="Worker">Worker</option>
                                <option value="Cleaner">Cleaner</option>
                                <option value="Accountant">Accountant</option>
                                <option value="Waiter">Waiter</option>
                            </select>
                        </div>



                    </div>



                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="email" placeholder="Optional">
                        </div>

                        <label class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="phone" required>
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

    <script>
        var Success = `{{\Session::has('success')}}`;
        var Error = `{{\Session::has('error')}}`;

        if (Success) {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 7000
                };
                toastr.success('Success Message', `{{\Session::get('success')}}`);

            }, 1300);
        }
        else if(Error){
            setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.error('Failure Message', `{{\Session::get('error')}}`);

                }, 1300);
        }
    </script>
@endsection
