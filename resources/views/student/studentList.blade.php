@extends('layouts.master')
@section('content')

<div class="content-area py-1">
	<div class="container-fluid">
		<h4>لیست شاگردان</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="">داشبورد</a></li>
			<li class="breadcrumb-item"><a href="">شاگردان</a></li>
			<li class="breadcrumb-item active">لیست شاگردان</li>
		</ol>

		@include('layouts.errors')

		<div class="box box-block bg-white">
			<div class="overflow-x-auto">
				<table class="table table-striped table-bordered dataTable" id="table-3">
					<thead>
						<tr>
							<td>عکس</td>
							<th>شماره دانش آموزی</th>
							<th>اسم</th>
							<th>تخلص</th>
							<th>نام پدر</th>
							<th>ولدیت</th>
							<th>آدرس</th>
							<td>تلفن</td>
							<td>صنف</td>
							<td>سال شمولیت</td>
							<td>کارنامه</td>
							<td>ویرایش</td>
							<td>حذف</td>
						</tr>
					</thead>
					<tbody>
						@foreach($students as $student)
							<tr>
								<td  style="width: 50px !important; padding: 2px;">
									<img src="{{ asset('UploadedImages/student').'/'.$student->photo}}"  style="width: 100% !important; ">
								</td>
								<td>{{ $student->id }}</td>
								<td>{{ $student->name}}</td>
								<td>{{ $student->lastName }}</td>
								<td>{{ $student->fatherName }}</td>
								<td>{{ $student->gfName }}</td>
								<td>{{ $student->address }}</td>
								<td dir="ltr">{{ $student->phone }}</td>
								<td>{{ $student->class }}</td>
								<td>{{ $student->year }}</td>
								<td>
									<a href="{{url('studentMarkInfo').'/' .$student->id}}" title="نمایش کارنامه">
										<i class="ti-info"></i>
									</a>
								</td>
								<td>
									<a href="{{url('editStudent').'/' .$student->id}}" title="ویرایش">
										<i class="ti-pencil-alt"></i>
									</a>
								</td>
								<td style="display: flex; flex-direction: row; justify-content: center;">
									<a href="{{url('deleteStudent').'/' .$student->id}}" title="حذف" onclick='return confirm("آیا مطمیین استید که حذف شود ؟")'>
										<i class="ti ti-trash text-danger"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
