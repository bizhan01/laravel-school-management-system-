@extends('layouts.master')
@section('content')

<div class="content-area py-1">
	<div class="container-fluid">
		<h4>ویرایش معلومات شاگرد</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="">داشبورد</a></li>
			<li class="breadcrumb-item"><a href="">شاگردان</a></li>
			<li class="breadcrumb-item active">ویرایش معلومات شاگرد</li>
		</ol>
		<div class="box box-block bg-white">
			<h5>ویرایش معلومات شاگرد</h5>
			<!-- <p class="font-90 text-muted mb-1">Use <code>data-mask</code> to the input element.</p> -->

			@include('layouts.errors')

			<form method="post" action="{{ route('updateStudent') }}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$student['id']}}">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>اسم کامل</label>
							<input type="text" class="form-control" name="name" value="{{$student['name']}}">
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>تخلص</label>
							<input type="text" class="form-control" name="lastName" value="{{$student['lastName']}}">
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>اسم پدر</label>
							<input type="text" class="form-control" name="fatherName"  value="{{$student['fatherName']}}">
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>اسم پدر کلان</label>
							<input type="text" class="form-control" name="gfName"  value="{{$student['gfName']}}">
							<span class="font-90 text-muted"></span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>آدرس</label>
							<input type="text" class="form-control" name="address"  value="{{$student['address']}}">
							<span class="font-90 text-muted"></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>تلفن</label>
							<input type="text" placeholder="" data-mask="(099) 999-9999" class="form-control" dir="ltr" name="phone" value="{{$student['phone']}}">
							<span class="font-90 text-muted pull-left" dir="ltr" style="text-align: left;">(0xx) xxx-xxxx</span>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
						<label>سال شمولیت <span style="color: red">*</span></label>
						<select class="form-control" name="year" required>
							<option>{{$student['year']}}</option>
							<?php
								for ($x = 1400; $x <= 1599; $x++) {?>
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
