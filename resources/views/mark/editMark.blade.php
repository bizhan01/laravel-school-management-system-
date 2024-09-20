@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
	<div class="container-fluid">
    <nav class="navbar navbar-light bg-white b-a mb-2">
			<center><h3>بروزسازی نمرات مضامین</h3></center>
			<form method="post" action="{{ route('updateMark') }}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$mark['id']}}">
				<div class="row form-group">
					<input type="hidden" name="student_id" value="{{$mark['student_id']}}">
					<input type="hidden" name="sub_grade" value="{{$mark['sub_grade']}}">
				 <div class="col-md-4">
					 <div class="form-group">
					 <label>مضمون<span style="color: red">*</span></label>
					 	<input type="text" name="subject" value="{{$mark['subject']}}" class="form-control"  required>
				 </div>
				 </div>
					<div class="col-md-4">
							<div class="form-group">
								<label>نمره امتحان وسط سال<span style="color: red">*</span></label>
								<input type="number" name="midterm_score" value="{{$mark['midterm_score']}}" min="0" max="100" class="form-control"  required>
						 </div>
					</div>
					<div class="col-md-4">
							<div class="form-group">
								<label>نمره امتحان سالانه<span style="color: red">*</span></label>
								<input type="number" name="final_score" value="{{$mark['final_score']}}" min="0" max="100" class="form-control"  required>
						 </div>
					</div>
				</div>
         <div class="row form-group">
            <div class="col-md-4">
              <input type="submit" name="submit" value="ذخیره" class="btn btn-success " />
							<a href="../{{$mark['student_id']}}"><input type="button"  value="برگشت" class="btn btn-info " /></a>
            </div>
         </div>
         @include('layouts.errors')
      </form>
    </nav>
  </div>
</div>
@endsection
