<!DOCTYPE html>
<html lang="en" dir="rtl">

<!-- Mirrored from big-bang-studio.com/neptune/neptune-rtl/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Jan 2017 11:18:53 GMT -->
<head>
	<style media="screen">
			*{
				font-size: 12px;
			}
			th, td{
				text-align: center !important;
			}
	</style>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title>چاپ بیل</title>

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('../vendors/bootstrap4-rtl/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/themify-icons/themify-icons.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/font-awesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/animate.css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/jscrollpane/jquery.jscrollpane.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/waves/waves.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/switchery/dist/switchery.min.css') }}">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="css/core.css">

	</head>
	<body class="fixed-sidebar fixed-header skin-default">

		<div class="wrapper">
			<!-- Preloader -->
			<div class="preloader"></div>
			<!-- Sidebar -->
			<div class="site-overlay"></div>
			<div class="">
				<!-- Content -->
				<div class="content-area py-1">
					<div class="container-fluid">
						<center style="margin-top: -15px"><br>
							<img src="\img\logo\logo.png" height="60px" alt="" /><br>
							<h6><span> </span> لیسه عالی نسوان حوتقول انگوری</h6>
							<h6><span> </span> کارنامه دانش آموز</h6>
						</center>
						<div class="card">
							<div class="card-block">
								<table class="table table-striped table-bordered">
					        <thead>
					          @foreach($studentInfo as $student)
					          <tr>
					            <td><span> </span>اسم</td>
					            <th><span> </span>{{$student->name}}</th>
					            <td><span> </span>شماره دانش آموزی</td>
					            <th><span> </span>{{$student->id}}</th>
					            <th rowspan="4" style="width: 100px"><img src="{{ asset('UploadedImages/student').'/'.$student->photo}}" height="150px" /></th>
					          </tr>
					          <tr>
					            <td><span> </span>تخلص</td>
					            <th><span> </span>{{$student->lastName}}</th>
					            <td><span> </span>تلفن</td>
					            <th dir="ltr"><span> </span>{{$student->phone}}</th>
					          </tr>
					          <tr>
					            <td><span> </span>اسم پدر</td>
					            <th><span> </span>{{$student->fatherName}}</th>
					            <td><span> </span>سال شمولیت</td>
					            <th><span> </span>{{$student->year}}</th>
					          </tr>
					          <tr>
					            <td><span> </span>اسم پدر کلان</td>
					            <th><span> </span>{{$student->gfName}}</th>
					            <td><span> </span>آدرس</td>
					            <th><span> </span>{{$student->address}}</th>
					          </tr>
					          @endforeach
					        </thead>
					      </table><br></br>
								<table class="table table-bordered " style="margin-top: -30px;">
									<thead>
										<tr >
											<th><span> </span> شماره</th>
											<th><span> </span> صنف</th>
											<th><span> </span> مضمون</th>
											<th><span> </span> نمره وسط سال</th>
											<th><span> </span> نمره سالانه</th>
											<th><span> </span> جمله</th>
										</tr>
									</thead>
									<tbody>
					        <?php $ms = 0; $fs = 0; $subTotal = 0; $mainTotal = 0; ?>
					          @foreach($marks as $mark)
					          <tr>
					            <td>{{$subjctCount = $loop->iteration}} </td>
					            <td><span> </span>{{$mark->sub_grade}}</td>
					            <td><span> </span>{{$mark->subject}}</td>
					            <td>{{$midtermScore = $mark->midterm_score}}</td>
					            <td>{{$finalScore = $mark->final_score}}</td>
					            <td>{{$sum = $mark->midterm_score + $mark->final_score}} <?php $subTotal += $sum; ?>  </td>
					          </tr>
					          <?php $ms += $midtermScore; ?>
					          <?php $fs += $finalScore; ?>
					          <?php $mainTotal += $sum; ?>
					          @endforeach
					        </tbody>
					        <tfoot>
					          <tr>
					            <th colspan="3"><span> </span>مجموعه نمرات</th>
					            <th><?php echo $ms; ?></th>
					            <th><?php echo $fs; ?></th>
					            <th><?php echo $mainTotal; ?></th>
					          </tr>
										<tr>
											<th colspan="3"><span> </span>فیصدی اخذ شده  در این صنف</th>
											<th colspan="3" style="color: blue"><b><span>%</span> <?php echo $mainTotal / $subjctCount; ?> </b></th>
										</tr>
					        </tfoot>
								</table>
								<div class="row">
									<div class="col-lg-6">
										<div class="col-sm-4 col-xs-6">
											<div class="clearfix mb-0-25">
												<strong class="float-xs-left"><span> </span>مهر و امضای سرمعلمیت<br>
												</strong>
											</div>
										</div>
											<strong class="float-xs-left"><span> </span>مهر و امضای مدیریت</strong>
									</div>
								</div>
							</div>
							<div class="card-footer clearfix hidden-print">
                <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light">
  							<button type="button" class="btn btn-info hidden-print label-left float-xs-right mr-0-5">
									<span class="btn-label"><i class="ti-printer"></i></span>
									پرنت
								</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Vendor JS -->
		<script type="text/javascript" src="{{ asset('../vendors/jquery/jquery-1.12.3.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/tether/js/tether.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/bootstrap4-rtl/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/detectmobilebrowser/detectmobilebrowser.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/jscrollpane/jquery.mousewheel.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/jscrollpane/mwheelIntent.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/jscrollpane/jquery.jscrollpane.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/jquery-fullscreen-plugin/jquery.fullscreen-min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/waves/waves.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/switchery/dist/switchery.min.js') }}"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
	</body>


<!-- Mirrored from big-bang-studio.com/neptune/neptune-rtl/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Jan 2017 11:18:53 GMT -->
</html>
