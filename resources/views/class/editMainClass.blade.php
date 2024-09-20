@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
        <center><h3>بروزسازی صنف</h3></center>
				<form method="post" action="{{ route('updateMainClass') }}" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="id" value="{{$class['id']}}">
					<div class="row form-group">
						 <div class="col-md-2"></div>
						<div class="col-md-6">
							<div class="form-group">
							<label>صنف<span style="color: red">*</span></label>
							<select class="form-control" name="grade" required>
								<option>{{$class['grade']}}</option>
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
						<div class="col-md-2">
							<label for="">ذخیره سازی</label><br>
						 <input type="submit" name="submit" value="ذخیره" class="btn btn-success form-control" />
					 </div>
					</div>
					@include('layouts.errors')
        </form>
      </nav>
  </div>
</div>
@endsection
