@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
        <center><h3>ویرایش ریاست</h3></center>
				<form method="post" action="{{ route('updateSubClass') }}" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="id" value="{{$departement['id']}}">
					<div class="row form-group">
						 <div class="col-md-3">
							 <div class="form-group">
							 <label>صنف<span style="color: red">*</span></label>
							 <select class="form-control" name="grade" required>
								 <option value="{{$departement['main_class_id']}}"></option>
								 <option>اول</option>
								 <option>دوم</option>
								 <option>سوم</option>
								 <option>چهارم</option>
								 <option>پنجم</option>
								 <option>ششم</option>
								 <option>هفتم</option>
								 <option>هشتم</option>
								 <option>نهم</option>
								 <option>دهم</option>
								 <option>یازدهم</option>
								 <option>دوازدهم</option>
							 </select>
						 </div>
						 </div>
						 <div class="col-md-3">
							 <div class="form-group">
							 <label>گروپ<span style="color: red">*</span></label>
							 <select class="form-control" name="group" required>
								 <option>{{$departement['group']}}</option>
								 <option>الف</option>
								 <option>ب</option>
								 <option>ت</option>
								 <option>ج</option>
								 <option>د</option>
							 </select>
						 </div>
						 </div>
						 <div class="col-md-3">
							 <div class="form-group">
							 <label>تایم<span style="color: red">*</span></label>
							 <select class="form-control" name="shift" required>
								<option>{{$departement['shift']}}</option>
								 <option>پیش از ظهر</option>
								 <option>بعد از ظهر</option>
							 </select>
						 </div>
						 </div>
							<div class="col-md-3">
								<div class="form-group">
								<label>سال<span style="color: red">*</span></label>
								<select class="form-control" name="year" required>
									<option>{{$departement['year']}}</option>
									<?php
										for ($x = 1400; $x <= 1599; $x++) {?>
												<option><?php echo " $x "; ?></option>
									 <?php
										}	?>
								</select>
							</div>

          </div>
          <div class="row form-group">
             <div class="col-md-4">
               <input type="submit" name="submit" value="ذخیره" class="btn btn-rounded btn-success " />
								<button type="reset" class="btn btn-rounded btn-warning"><li class="fa fa-remove"> لغو</li></button>
             </div>
          </div>
					@include('layouts.errors')
        </form>
      </nav>
    </div>
  </div>
@endsection
