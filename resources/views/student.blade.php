<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>El-Gymnasio | Services</title>

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
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">

                <div class="ibox-content">
                            <form method="post" id="user_info" class="form-horizontal" action="{{route('student')}}" enctype="multipart/form-data">
                                @csrf
                   
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" >name</label>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="name" name="name" value="">
                                    </div>
                   
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-4">
                                        <input type="text"id="email" class="form-control" name="email" value="">
                                    </div>
                   
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">password</label>

                                    <div class="col-sm-4">
                                        <input type="password"id="password" class="form-control" name="password" value="">
                                    </div>
                   
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>

                                    <div class="col-sm-4">

                                          <textarea id="description" name="description" class="form-control" rows="4" cols="50">
                                          </textarea>
                                    </div>
                   
                                </div>

                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" id="button" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br>
                
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


        <!-- <script>
            $(document).ready(function(){
                $("#submit").on('click',function(e){
                    // console.log("yes");
                    e.preventDefault();
                    var data={
                            _token: "{{ csrf_token() }}" ,
                            name: $('#name').val(),
                            email: $('#email').val(),
                            password: $('#password').val(),
                            type: $('#type').val(),

                            
                        }
                   
                    $.ajax({
                        headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                 },

                        method:"post",
                        url:`{{route('committe.store')}}`,
                        data: data,
                        success:function(res){
                            console.log(res);
                            if(res==1)
                            alert("your data is saved")
                        },
                        error:function(error){
                            console.log(error);
                        }
                    })


                });

            });


        </script> -->




</body>

</html>
