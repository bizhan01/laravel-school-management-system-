@extends('layouts.master')
@section('content')

<div class="content-area py-1">
	<div class="container-fluid">
		<h4>ثبت شاگرد جدید</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="">داشبورد</a></li>
			<li class="breadcrumb-item"><a href="">شاگردان</a></li>
			<li class="breadcrumb-item active">ثبت شاگرد جدید</li>
		</ol>
		<div class="box box-block bg-white">
			<h5>فورم ثبت نام شاگرد:</h5>
			<!-- <p class="font-90 text-muted mb-1">Use <code>data-mask</code> to the input element.</p> -->
			@include('layouts.errors')

			@if(session('student_id'))
			<div class="alert alert-success-fill alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<span>آیدی شاگرد جدید</span><br>
				<h1>{{ session('student_id') }}</h1>
			</div>
			@endif

			<form method="post" action="{{ route('saveStudent') }}" enctype="multipart/form-data">
				@csrf

				<input type="hidden" name="student_id" value="<?php date_default_timezone_set('asia/kabul')?>{{date('yHis')}}">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>اسم </label>
							<input type="text" class="form-control txt" name="name">
							<span class="font-90 text-muted"></span>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label>اسم فامیلی</label>
							<input type="text" class="form-control txt" name="lastName">
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>اسم پدر</label>
							<input type="text" class="form-control txt" name="fatherName">
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>اسم پدر کلان</label>
							<input type="text" class="form-control txt" name="gfName">
							<span class="font-90 text-muted"></span>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>آدرس</label>
							<input type="text" class="form-control txt" name="address">
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>تلفن </label>
							<input type="text" placeholder="" data-mask="(099) 999-9999" class="form-control" dir="ltr" name="phone" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						<label>سال شمولیت <span style="color: red">*</span></label>
						<select class="form-control" name="year" required>
							<option value=""></option>
							<?php
								for ($x = 1390; $x <= 1599; $x++) {?>
										<option><?php echo " $x "; ?></option>
							 <?php
								}	?>
						</select>
					</div>
					</div>
				</div>



				<div class="row">
					<div class="col-md-12">
						<label>عکس</label>
				        <input type="file" name="photo" id="input-file-now" class="dropify"/>
					</div>
				</div>

				<br>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
							<i class="ti-save"></i>
							<span>ذخیره</span>
						</button>
						<button type="reset" class="btn btn-outline-danger mb-0-25 waves-effect waves-light">
							<i class="ti-loop"></i>
							<span>لغو</span>
						</button>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>


@endsection
