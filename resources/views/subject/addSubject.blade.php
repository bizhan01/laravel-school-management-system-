@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
				<center><h3>افزودن مضمون در صنف {{$class['grade']}}</h3></center>
				<form method="POST" action="{{route('addSubject')}}" enctype="multipart/form-data">
           {{ csrf_field() }}
           <div class="row form-group">
						 <div class="col-md-6">
							 <div class="form-group">
							 <label>صنف<span style="color: red">*</span></label>
							 <select class="form-control" readonly name="class_id" required>
								 <option value="{{$class['id']}}">{{$class['grade']}}</option>
							 </select>
						 </div>
						 </div>
						 <div class="col-md-6">
							 <div class="form-group">
							 <label>مضمون<span style="color: red">*</span></label>
							 <input type="text"  class="form-control txt" name="subject" required>
						 </div>
						 </div>
           </div>
           <div class="row form-group">
              <div class="col-md-4">
                <input type="submit" name="submit" value="ذخیره" class="btn btn-success " />
              </div>
           </div>
           @include('layouts.errors')
        </form>
      </nav>
    </div>
  </div>


<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
   <div class="col-lg-12 box box-block bg-white">
     <center><h3>لیست مضامین صنف {{$class['grade']}}</h3></center>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>مضمون</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          @foreach($subjects as $subject)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$subject->subjectName}}</td>
						<td>
							<a class="text-success" href="editSubject/{{ $subject->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
						</td>
            <td>
                <a class="text-danger" href="deleteSubject/{{ $subject->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
