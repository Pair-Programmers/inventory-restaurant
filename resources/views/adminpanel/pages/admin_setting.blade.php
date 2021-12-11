<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bizblanca | Admin Settings</title>

    <link href="{{ asset('adminpanel') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('adminpanel') }}/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('adminpanel') }}/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="{{ asset('adminpanel') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('adminpanel') }}/css/style.css" rel="stylesheet">
    {{-- toaster --}}
    <link href="{{ asset('adminpanel') }}/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="{{ asset('adminpanel') }}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css"
        rel="stylesheet">


</head>

<body>

    <div id="wrapper">

        <?= $sidebar ?>

        <div id="page-wrapper" class="gray-bg">
            <?= $header ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Profile Setting</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Profile</a>
                        </li>
                        <li class="active">
                            <strong>Setting</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">

                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="{{ route('admin.setting') }}"
                            enctype="multipart/form-data">
                            @csrf



                            <div class="form-group">
                                <label class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control   @error('name') is-invalid  @enderror "
                                        name="name" required value="{{ Auth::user()->name }}">
                                    @error('name')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-4">
                                    <input type="email" class="form-control @error('password') is-invalid  @enderror"
                                        name="email" required value="{{ Auth::user()->email }}">
                                    @error('email')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Phone</label>

                                <div class="col-sm-4">
                                    <input type="number" class="form-control" name="phone" required
                                        value="{{ Auth::user()->phone }}">

                                </div>


                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Profile Image</label>

                                <div class="col-sm-4">
                                    <input type="file" class="form-control   @error('profile_image') is-invalid  @enderror "
                                        name="profile_image"  value="{{ Auth::user()->name }}">
                                    @error('profile_image')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Password</label>

                                <div class="col-sm-4">
                                    <input type="password" class="form-control  @error('password') is-invalid  @enderror"
                                        name="password" id="password" value="">
                                    @error('password')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Confirm Password</label>

                                <div class="col-sm-4">
                                    <input type="password" class="form-control  @error('password') is-invalid  @enderror"
                                        name="confirm_password" id="password" >
                                    @error('password')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>




                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary disabledbutton" id="submitbtn" type="submit">Update
                                        User</button>
                                </div>
                            </div>
                        </form>

                    </div>


                </div>
            </div>

            <?= $footer ?>


        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('adminpanel') }}/js/jquery-2.1.1.js"></script>
    <script src="{{ asset('adminpanel') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('adminpanel') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{ asset('adminpanel') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Toastr -->
    <script src="{{ asset('adminpanel') }}/js/plugins/toastr/toastr.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="{{ asset('adminpanel') }}/js/inspinia.js"></script>
    <script src="{{ asset('adminpanel') }}/js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="{{ asset('adminpanel') }}/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

    @if ($Status = Session::get('Status'))
    @endif
    @if ($Message = Session::get('Message'))
    @endif
    <script>
        var Status = '<?php echo $Status; ?>';
        var Message = '<?php echo $Message; ?>';

        if (Status) {
            if (Status == "Success") {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 7000
                    };
                    toastr.success('Success Message', Message);

                }, 1300);
            } else {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.error('Failure Message', Message);

                }, 1300);
            }
        }
    </script>
    <script>
        function copyToClipboard(text) {

            var textArea = document.createElement("textarea");
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                console.log('Copying text command was ' + msg);
            } catch (err) {
                console.log('Oops, unable to copy', err);
            }
            document.body.removeChild(textArea);
        }
        $('#copypassword').change(function() {
            var clipboardText = "";
            clipboardText = $('#password').val();
            copyToClipboard(clipboardText);
            // alert("Copied to Clipboard");

            if ($('input[type=checkbox]').prop('checked')) {
                $("#copymsg").html("<span class='text-success'>Password Copied!</span>");
                $("#submitbtn").removeClass('disabledbutton');
                $("#password").addClass('disabledbutton');
            } else {
                $("#copymsg").html("<span class=''>Copy Password</span>");
                $("#submitbtn").addClass('disabledbutton');
                $("#password").removeClass('disabledbutton');

            }
        });
    </script>

</body>

</html>
