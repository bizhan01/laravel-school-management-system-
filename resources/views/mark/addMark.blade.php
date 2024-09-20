@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
				<center><h3>افزودن نمرات مضامین این شاگرد</h3></center>
				<a href="/subClassDetails/studentSubjectMarks/<?php echo $member[0]->id; ?>/<?php echo $member[0]->main_class_id; ?>"><input value="نمایش لیست مضامین صنف مربوطه" class="btn btn-primary form-control" /></a><br></br>
				<form method="POST" action="{{route('addMark')}}" enctype="multipart/form-data">
           {{ csrf_field() }}
           <div class="row form-group">
						 <input type="hidden" name="student_id" value="<?php echo $member[0]->student_id; ?>">
						 <input type="hidden" name="sub_grade" value="<?php echo $member[0]->grade; ?>">
						<div class="col-md-4">
							<div class="form-group">
							<label>مضمون<span style="color: red">*</span></label>
							<select class="form-control"  name="subject" required>
								@foreach($subjects as $subject)
								 <option>{{$subject->subjectName}}</option>
							 @endforeach
							</select>
						</div>
						</div>
						 <div class="col-md-4">
							 <div class="form-group">
							 <label>نمره وسط سال<span style="color: red">*</span></label>
							 <input type="number" name="midterm_score" min="0" max="40" class="form-control"  required>
						 </div>
						 </div>
						 <div class="col-md-4">
							<div class="form-group">
							<label>نمره سالانه<span style="color: red">*</span></label>
							<input type="number" name="final_score" min="0" max="60" class="form-control"  required>
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
     <center><h3>لیست نمرات </h3></center>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>آی دی شاگرد</th>
            <th>صنف</th>
            <th>مضمون</th>
            <th>نمره وسط سال</th>
            <th>نمره سالانه</th>
            <th>جمله</th>
          </tr>
        </thead>
        <tbody>
					<?php $total = 0;?>
          @foreach($marks as $mark)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$mark->student_id}}</td>
            <td>{{$mark->sub_grade}}</td>
            <td>{{$mark->subject}}</td>
            <td>{{$mark->midterm_score}}</td>
            <td>{{$mark->final_score}}</td>
            <td>{{$sum = $mark->midterm_score + $mark->final_score}} <?php $total += $sum; ?>  </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
