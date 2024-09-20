@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
					<center><h3>ایجاد صنف های جدید برای سال جاری</h3></center><br>
				<form method="POST" action="{{route('addSubClass')}}" enctype="multipart/form-data">
           {{ csrf_field() }}
           <div class="row form-group">
						 <div class="col-md-3">
							 <div class="form-group">
							 <label>صنف<span style="color: red">*</span></label>
							 <select class="form-control" name="grade" required>
								 <option value=""></option>
								 @foreach($classes as $class)
								 	<option value="{{$class->id}}">{{$class->grade}}</option>
								 @endforeach
							 </select>
						 </div>
						 </div>
						 <div class="col-md-3">
							 <div class="form-group">
							 <label>گروپ<span style="color: red">*</span></label>
							 <select class="form-control" name="group" required>
								 <option value=""></option>
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
								 <option value=""></option>
								 <option>پیش از ظهر</option>
								 <option>بعد از ظهر</option>
							 </select>
						 </div>
						 </div>
							<div class="col-md-3">
								<div class="form-group">
								<label>سال<span style="color: red">*</span></label>
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
     <center><h3>لیست صنوف</h3></center>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>صنف</th>
            <th>گروپ</th>
            <th>تایم</th>
            <th>سال</th>
            <th>شاگردان</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          @foreach($departements as $departement)
          <tr>
            <td>{{$departement->grade}}</td>
            <td>{{$departement->group}}</td>
            <td>{{$departement->shift}}</td>
            <td>{{$departement->year}}</td>
            <td>
              <a class="text-success" href="subClassDetails/{{ $departement->id }}"><i class="fa fa-info btn btn-rounded btn-info"></i></a>
            </td>
						<td>
							<a class="text-success" href="editSubClass/{{ $departement->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
						</td>
            <td>
                <a class="text-danger" href="deleteSubClass/{{ $departement->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
