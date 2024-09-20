@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
	<div class="container-fluid">
    <nav class="navbar navbar-light bg-white b-a mb-2">
			<center><h3>بروزسازی اطلاعات مضامین</h3></center>
			<form method="post" action="{{ route('updateSubject') }}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$subject['id']}}">
         <div class="row form-group">
					 <input type="hidden" name="class_id" value="{{$subject['class_id']}}">
					 <div class="col-md-2"></div>
					 <div class="col-md-8">
						 <div class="form-group">
						 <label>مضمون<span style="color: red">*</span></label>
						 <input type="text" value="{{$subject['subjectName']}}"  class="form-control" name="subject" required>
					 </div>
					 </div>
         </div>
         <div class="row form-group">
					 <div class="col-md-2"></div>
            <div class="col-md-4">
              <input type="submit" name="submit" value="ذخیره" class="btn btn-success " />
							<a href="../{{$subject['class_id']}}"><input value="برگشت" class="btn btn-primary " /></a>
            </div>
         </div>
         @include('layouts.errors')
      </form>
    </nav>
  </div>
</div>
@endsection
