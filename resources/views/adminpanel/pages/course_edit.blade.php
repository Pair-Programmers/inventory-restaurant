<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AcademyWorld | Course Edit</title>

    <link href="{{asset('adminpanel')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('adminpanel')}}/css/style.css" rel="stylesheet">

    <link href="{{asset('adminpanel')}}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

    <?=$sidebar; ?>

        <div id="page-wrapper" class="gray-bg">
            <?=$header; ?>            
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Add Course</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Course</a>
                        </li>
                        <li class="active">
                            <strong>Edit</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">

                <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="{{route('course.update', $course->id)}}" enctype="multipart/form-data">
                                @csrf
                                

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name" value="{{$course->name}}"> 
                                        </div>
                                    </div>

                                    
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Category</label>

                                    <div class="col-sm-4">
                                        <select class="form-control" name="category_id" required>
                                            
                                            @foreach ($categories as $category)
                                                @if ($course->category_id == $category->id)
                                                    <option selected value="{{$category->id}}">{{$category->name}}</option>
                                                @endif
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                           
                                        </select> 
                                    </div>
                                    

                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">For Package</label>

                                    <div class="col-sm-4">
                                        <select class="form-control" name="for_package" required>
                                            
                                            @foreach ($packages as $package)
                                            @if ($course->for_package == $package->id)
                                                <option selected value="{{$package->id}}">{{$package->name}}</option>
                                            @else
                                                <option value="{{$package->id}}">{{$package->name}}</option>
                                            @endif
                                            @endforeach
                                            
                                           
                                        </select> 
                                        
                                    </div>

                                    
                                </div>

                                

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-4">
                                        <textarea name="description" id="" cols="50" rows="5">{{$course->description}}</textarea>
                                    </div>
                                    
                                </div>
                                
                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br>
                
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

        </div>
        </div>

     <!-- Mainly scripts -->
    <script src="{{asset('adminpanel')}}/js/jquery-2.1.1.js"></script>
    <script src="{{asset('adminpanel')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('adminpanel')}}/js/inspinia.js"></script>
    <script src="{{asset('adminpanel')}}/js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="{{asset('adminpanel')}}/js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>

</body>

</html>
