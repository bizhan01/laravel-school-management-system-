@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
				<center><h3>افزودن شاگرد جدید در صنف <?php echo $departement[0]->grade; ?> - <?php echo $departement[0]->group; ?></h3></center>
				<form method="POST" action="{{route('addMember')}}" enctype="multipart/form-data">
           {{ csrf_field() }}
           <div class="row form-group">
						 <div class="col-md-4">
							 <div class="form-group">
							 <label>صنف<span style="color: red">*</span></label>
							 <select class="form-control" readonly name="sub_class_id" required>
								 <option  value="<?php echo $departement[0]->id; ?>"><?php echo $departement[0]->grade; ?> - <?php echo $departement[0]->group; ?></option>
							 </select>
						 </div>
						 </div>
						 <input type="hidden" name="main_class_id" value="<?php echo $departement[0]->mainClassID; ?>">
						 <div class="col-md-4">
							 <div class="form-group">
							 <label>شاگرد<span style="color: red">*</span></label>
							 <select class="form-control" name="student_id" required>
								 <option></option>
								 @foreach($students as $student)
								 <option value="{{$student->id}}">{{$student->name}} - {{$student->lastName}} - {{$student->id}}</option>
								 @endforeach
							 </select>
						 </div>
						 </div>
						 <div class="col-md-4">
							 <div class="form-group">
							 <label>ذخیره سازی</label><br>
							   <input type="submit" name="submit" value="ذخیره" class="btn btn-success form-control" />
						 </div>
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
     <center><h3>لیست شاگردان صنف <?php echo $departement[0]->grade; ?> - <?php echo $departement[0]->group; ?></h3></center>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>اسم </th>
            <th>تخلص</th>
            <th>آی دی دانش آموز</th>
            <th>نمرات</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          @foreach($members as $member)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$member->name}}</td>
            <td>{{$member->lastName}}</td>
						<td>{{$member->student_id}}</td>
						<td>
							<a class="text-success" href="studentMarks/{{ $member->id}}"><i class="fa fa-info btn btn-rounded btn-primary"></i></a>
						</td>
						<td>
							<a class="text-success" href="editMember/{{ $member->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
						</td>
            <td>
                <a class="text-danger" href="deleteMember/{{ $member->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
