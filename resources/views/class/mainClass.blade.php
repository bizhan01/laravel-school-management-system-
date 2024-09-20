@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
				<center><h3>ایجاد صنف جدید</h3></center>
				<form method="POST" action="{{route('addMainClass')}}" enctype="multipart/form-data">
           {{ csrf_field() }}
           <div class="row form-group">
						  <div class="col-md-2"></div>
						 <div class="col-md-6">
							 <div class="form-group">
							 <label>صنف<span style="color: red">*</span></label>
							 <select class="form-control" name="grade" required>
								 <option value=""></option>
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


<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
   <div class="col-lg-12 box box-block bg-white">
     <center><h3>لیست صنوف</h3></center>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>صنف</th>
            <th>مضامین</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          @foreach($classes as $class)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$class->grade}}</td>
            <td>
              <a class="text-success" href="mainClassDetails/{{ $class->id }}"><i class="fa fa-info btn btn-rounded btn-info"></i></a>
            </td>
						<td>
							<a class="text-success" href="editMainClass/{{ $class->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
						</td>
            <td>
                <a class="text-danger" href="deleteMainClass/{{ $class->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
