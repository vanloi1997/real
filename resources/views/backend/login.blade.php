
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Đăng Nhập Trang Quản Lý</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('backend/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="{{asset('backend/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Đăng Nhập</h2>
    @if(session('msg'))
        <div class="alert alert-{{session('typeMsg')}} alert-dismissible text-center mt-5" style="position: absolute;right: 0;z-index: 5;top:80px">{{ session('msg') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif
		<form action="" method="post">
            {{ csrf_field() }}
			<input type="text" class="ggg" name="stringUser" placeholder="Nhập Username" required="">
			<input type="password" class="ggg" name="stringPass" placeholder="Nhập Password" required="">
			<span><input type="checkbox" name = "remember">Nhớ mật khẩu</span>
			<h6><a href="#">Quên mật khẩu?</a></h6>
			<div class="clearfix"></div>
			<input type="submit" value="Đăng Nhập" name="login">
		</form>
		@if($errors->has('stringUser'))
        	<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringUser') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif
		<p>Bạn chưa có tài khoản ?<a href="registration.html">Tạo tài khoản</a></p>
</div>
</div>
<script src="{{asset('backend/js/bootstrap.js')}}"></script>
<script src="{{asset('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('backend/js/scripts.js')}}"></script>
<script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('backend/js/jquery.scrollTo.js')}}"></script>
<script type="text/javascript">
        $(function(){
            window.setTimeout(function() {
                $(".alert").fadeOut(2000);
                $(".alert").setTimeout(function(){
                    $(this).remove();
                });
            }, 3000);
        });
</script>
</body>
</html>
