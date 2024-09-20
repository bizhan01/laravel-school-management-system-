@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
	<div class="container-fluid">
    <nav class="navbar navbar-light bg-white b-a mb-2">
			<center><h3>بروزسازی اطلاعات شاگردان</h3></center>
			<form method="post" action="{{ route('updateMember') }}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$member['id']}}">
         <div class="row form-group">
					 <input type="hidden" name="sub_class_id" value="{{$member['sub_class_id']}}">
					 <div class="col-md-6">
						 <div class="form-group">
						 <label>شاگرد<span style="color: red">*</span></label>
						 <select class="form-control" name="student_id" required>
							 <option>{{$member['student_id']}}</option>
							 @foreach($students as $student)
							 	<option value="{{$student->id}}">{{$student->name}} - {{$student->lastName}} - {{$student->id}}</option>
							 @endforeach
						 </select>
					 </div>
					 </div>
					 <input type="hidden" name="main_class_id" value="{{$member['main_class_id']}}">
					 <div class="col-md-3">
						 <div class="form-group">
						 <label>ذخیره سازی تغییرات</label><br>
						 <input type="submit" name="submit" value="ذخیره" class="btn btn-success form-control" />
					 </div>
					 </div>
					 <div class="col-md-3">
						 <div class="form-group">
						 <label>برگشت به صفحه قبلی</label><br>
						 <a href="../{{$member['sub_class_id']}}"><input value="برگشت" class="btn btn-primary form-control" /></a>
					 </div>
					 </div>
         </div>
         @include('layouts.errors')
      </form>
    </nav>
  </div>
</div>
@endsection
