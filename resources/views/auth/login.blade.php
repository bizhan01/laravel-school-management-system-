<!DOCTYPE html>
<html lang="en" dir="rtl">

<!-- Mirrored from big-bang-studio.com/neptune/neptune-rtl/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Jan 2017 11:12:31 GMT -->
<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title>ورود به سیستم کاربری</title>

		<!-- Vendor CSS -->
		<link rel="shortcat icon" type="image/x-icon" href="{{ asset('../img/logo/logo.png') }}">
		<link rel="stylesheet" href="{{asset('../vendors/bootstrap4-rtl/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('../vendors/themify-icons/themify-icons.css')}}">
		<link rel="stylesheet" href="{{asset('../vendors/font-awesome/css/font-awesome.min.css')}}">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="css/core.css">
	</head>
	<body class="img-cover" style="background-image: url(img/photos-1/5.jpg);">

		<div class="container-fluid">
			<div class="sign-form">
				<div class="row">
					<div class="col-md-4 offset-md-4 px-3">
						<div class="box b-a-0">
							<div class="p-2 text-xs-center">
								<img src="\img\logo\logo.png" height="60px" alt="" /><br></br>
								<h5>خوش آمدید</h5>
								<p>سیستم الکترونیکی مدیریتی مکتب لیسه نسوان عالی حوتقول انگوری</p>
							</div>
							<form class="form-material mb-1" method="POST" action="{{ route('login') }}">
                    @csrf

								<div class="form-group">
									<input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail" placeholder="ایمیل someone@domain.com" name="email" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                      <span class="invalid-feedback text-danger" role="alert" style="padding: 5px;">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
								<div class="form-group">
									<input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required id="exampleInputPassword" placeholder="پاسورد *******">
                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
								</div>
								<br>
								<div class="px-2 form-group mb-0">
									<button type="submit" class="btn btn-primary btn-block text-uppercase">ورود</button>
								</div>
							</form>
              <br></br>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Vendor JS -->
		<script type="text/javascript" src="{{asset('../vendors/jquery/jquery-1.12.3.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('../vendors/tether/js/tether.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('../vendors/bootstrap4-rtl/js/bootstrap.min.js')}}"></script>
	</body>

<!-- Mirrored from big-bang-studio.com/neptune/neptune-rtl/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Jan 2017 11:12:31 GMT -->
</html>
