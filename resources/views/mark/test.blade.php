@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
   <div class="col-lg-12 box box-block bg-white">
     <center><h3>جدول نتایج / کارنامه</h3></center><br>

     <table class="table table-striped table-bordered">
       <thead>
         @foreach($studentInfo as $student)
         <tr>
           <td>اسم</td>
           <th>{{$student->name}}</th>
           <td>شماره دانش آموزی</td>
           <th>{{$student->id}}</th>
           <th rowspan="4" style="width: 100px"><img src="{{ asset('UploadedImages/student').'/'.$student->photo}}" height="150px" /></th>
         </tr>
         <tr>
           <td>تخلص</td>
           <th>{{$student->lastName}}</th>
           <td>تلفن</td>
           <th dir="ltr">{{$student->phone}}</th>
         </tr>
         <tr>
           <td>اسم پدر</td>
           <th>{{$student->fatherName}}</th>
           <td>سال شمولیت</td>
           <th>{{$student->year}}</th>
         </tr>
         <tr>
           <td>اسم پدر کلان</td>
           <th>{{$student->gfName}}</th>
           <td>آدرس</td>
           <th>{{$student->address}}</th>
         </tr>
         @endforeach
       </thead>
     </table> <br> </br>

     <div class="row form-group">
        <div class="col-md-11">
          <input type="text"  value="چاپ شهادت نامه / جدول نتایج صنف ده، یازده و دوازده" class="form-control btn btn-success "/>
        </div>
        <div class="col-md-1">
          <a class="text-primary" href="printTranscript/{{$student->id}}">
            <button type="button" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
              <i class=" ti-printer"></i>
              <span>چاپ</span>
            </button>
          </a>
        </div>
     </div>
      <center> <button type="button" name="button" class="form-control btn btn-primary">جدول نتایج صنف اول</button> </center>
      <table class="table table-striped table-bordered dataTable">
        <thead>
          <tr>
            <th>شماره</th>
            <th>صنف</th>
            <th>مضمون</th>
            <th>نمره وسط سال</th>
            <th>نمره سالانه</th>
            <th>جمله</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
        <?php $ms = 0; $fs = 0; $subTotal = 0; $mainTotal = 0; $subjctCount = 1; $mark = 0;?>
          @foreach($mark1 as $mark)
          <tr>
            <td>{{$subjctCount = $loop->iteration}} </td>
            <td>{{$mark->sub_grade}}</td>
            <td>{{$mark->subject}}</td>
            <td>{{$midtermScore = $mark->midterm_score}}</td>
            <td>{{$finalScore = $mark->final_score}}</td>
            <td>{{$sum = $mark->midterm_score + $mark->final_score}} <?php $subTotal += $sum; ?>  </td>
						<td>
							<a class="text-success" href="editMark/{{ $mark->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
						</td>
            <td>
               <a class="text-danger" href="deleteMark/{{ $mark->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $ms += $midtermScore; ?>
          <?php $fs += $finalScore; ?>
          <?php $mainTotal += $sum; ?>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">مجموعه نمرات</th>
            <th><?php echo $ms; ?></th>
            <th><?php echo $fs; ?></th>
            <th><?php echo $mainTotal; ?></th>
            <th style="color: blue"><b><span>%</span> <?php echo $mainTotal / $subjctCount; ?> </b></th>
            <th>
              @if ($mark == '')
              @else
              <a class="text-primary" href="printMark/{{$student->id}}/{{$mark->sub_grade}}">
                <button type="button" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
                  <i class=" ti-printer"></i>
                  <span>چاپ</span>
                </button>
              </a>
            @endif
            </th>
          </tr>
        </tfoot>

      </table> <br> </br>

      <center> <button type="button" name="button" class="form-control btn btn-info">جدول نتایج صنف دوم</button> </center>
      <table class="table table-striped table-bordered dataTable">
        <thead>
          <tr>
            <th>شماره</th>
            <th>صنف</th>
            <th>مضمون</th>
            <th>نمره وسط سال</th>
            <th>نمره سالانه</th>
            <th>جمله</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
        <?php $ms = 0; $fs = 0; $subTotal = 0; $mainTotal = 0; $subjctCount = 1; $mark = 0;?>
          @foreach($mark2 as $mark)
          <tr>
            <td>{{$subjctCount = $loop->iteration}} </td>
            <td>{{$mark->sub_grade}}</td>
            <td>{{$mark->subject}}</td>
            <td>{{$midtermScore = $mark->midterm_score}}</td>
            <td>{{$finalScore = $mark->final_score}}</td>
            <td>{{$sum = $mark->midterm_score + $mark->final_score}} <?php $subTotal += $sum; ?>  </td>
						<td>
							<a class="text-success" href="editMark/{{ $mark->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
						</td>
            <td>
               <a class="text-danger" href="deleteMark/{{ $mark->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $ms += $midtermScore; ?>
          <?php $fs += $finalScore; ?>
          <?php $mainTotal += $sum; ?>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">مجموعه نمرات</th>
            <th><?php echo $ms; ?></th>
            <th><?php echo $fs; ?></th>
            <th><?php echo $mainTotal; ?></th>
            <th style="color: blue"><b><span>%</span> <?php echo $mainTotal / $subjctCount; ?> </b></th>
            <th>
              @if ($mark == '')
              @else
              <a class="text-primary" href="printMark/{{$student->id}}/{{$mark->sub_grade}}">
                <button type="button" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
                  <i class=" ti-printer"></i>
                  <span>چاپ</span>
                </button>
              </a>
            @endif
            </th>
          </tr>
        </tfoot>
      </table> <br> </br>

      <center> <button type="button" name="button" class="form-control btn btn-warning">جدول نتایج صنف سوم</button> </center>
      <table class="table table-striped table-bordered dataTable">
        <thead>
          <tr>
            <th>شماره</th>
            <th>صنف</th>
            <th>مضمون</th>
            <th>نمره وسط سال</th>
            <th>نمره سالانه</th>
            <th>جمله</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
        <?php $ms = 0; $fs = 0; $subTotal = 0; $mainTotal = 0; $subjctCount = 1; $mark = 0;?>
          @foreach($mark3 as $mark)
          <tr>
            <td>{{$subjctCount = $loop->iteration}} </td>
            <td>{{$mark->sub_grade}}</td>
            <td>{{$mark->subject}}</td>
            <td>{{$midtermScore = $mark->midterm_score}}</td>
            <td>{{$finalScore = $mark->final_score}}</td>
            <td>{{$sum = $mark->midterm_score + $mark->final_score}} <?php $subTotal += $sum; ?>  </td>
						<td>
							<a class="text-success" href="editMark/{{ $mark->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
						</td>
            <td>
               <a class="text-danger" href="deleteMark/{{ $mark->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $ms += $midtermScore; ?>
          <?php $fs += $finalScore; ?>
          <?php $mainTotal += $sum; ?>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">مجموعه نمرات</th>
            <th><?php echo $ms; ?></th>
            <th><?php echo $fs; ?></th>
            <th><?php echo $mainTotal; ?></th>
            <th style="color: blue"><b><span>%</span> <?php echo $mainTotal / $subjctCount; ?> </b></th>
            <th>
              @if ($mark == '')
              @else
              <a class="text-primary" href="printMark/{{$student->id}}/{{$mark->sub_grade}}">
                <button type="button" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
                  <i class=" ti-printer"></i>
                  <span>چاپ</span>
                </button>
              </a>
            @endif
            </th>
          </tr>
        </tfoot>
      </table> <br> </br>

      <center> <button type="button" name="button" class="form-control btn btn-success">جدول نتایج صنف چهارم</button> </center>
      <table class="table table-striped table-bordered dataTable">
        <thead>
          <tr>
            <th>شماره</th>
            <th>صنف</th>
            <th>مضمون</th>
            <th>نمره وسط سال</th>
            <th>نمره سالانه</th>
            <th>جمله</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
        <?php $ms = 0; $fs = 0; $subTotal = 0; $mainTotal = 0; $subjctCount = 1; $mark = 0;?>
          @foreach($mark4 as $mark)
          <tr>
            <td>{{$subjctCount = $loop->iteration}} </td>
            <td>{{$mark->sub_grade}}</td>
            <td>{{$mark->subject}}</td>
            <td>{{$midtermScore = $mark->midterm_score}}</td>
            <td>{{$finalScore = $mark->final_score}}</td>
            <td>{{$sum = $mark->midterm_score + $mark->final_score}} <?php $subTotal += $sum; ?>  </td>
						<td>
							<a class="text-success" href="editMark/{{ $mark->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
						</td>
            <td>
               <a class="text-danger" href="deleteMark/{{ $mark->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $ms += $midtermScore; ?>
          <?php $fs += $finalScore; ?>
          <?php $mainTotal += $sum; ?>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">مجموعه نمرات</th>
            <th><?php echo $ms; ?></th>
            <th><?php echo $fs; ?></th>
            <th><?php echo $mainTotal; ?></th>
            <th style="color: blue"><b><span>%</span> <?php echo $mainTotal / $subjctCount; ?> </b></th>
            <th>
              @if ($mark == '')
              @else
              <a class="text-primary" href="printMark/{{$student->id}}/{{$mark->sub_grade}}">
                <button type="button" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
                  <i class=" ti-printer"></i>
                  <span>چاپ</span>
                </button>
              </a>
            @endif
            </th>
          </tr>
        </tfoot>
      </table> <br> </br>

      <center> <button type="button" name="button" class="form-control btn btn-danger">جدول نتایج صنف پنجم</button> </center>
      <table class="table table-striped table-bordered dataTable">
        <thead>
          <tr>
            <th>شماره</th>
            <th>صنف</th>
            <th>مضمون</th>
            <th>نمره وسط سال</th>
            <th>نمره سالانه</th>
            <th>جمله</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
        <?php $ms = 0; $fs = 0; $subTotal = 0; $mainTotal = 0; $subjctCount = 1; $mark = 0;?>
          @foreach($mark5 as $mark)
          <tr>
            <td>{{$subjctCount = $loop->iteration}} </td>
            <td>{{$mark->sub_grade}}</td>
            <td>{{$mark->subject}}</td>
            <td>{{$midtermScore = $mark->midterm_score}}</td>
            <td>{{$finalScore = $mark->final_score}}</td>
            <td>{{$sum = $mark->midterm_score + $mark->final_score}} <?php $subTotal += $sum; ?>  </td>
						<td>
							<a class="text-success" href="editMark/{{ $mark->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
						</td>
            <td>
               <a class="text-danger" href="deleteMark/{{ $mark->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $ms += $midtermScore; ?>
          <?php $fs += $finalScore; ?>
          <?php $mainTotal += $sum; ?>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">مجموعه نمرات</th>
            <th><?php echo $ms; ?></th>
            <th><?php echo $fs; ?></th>
            <th><?php echo $mainTotal; ?></th>
            <th style="color: blue"><b><span>%</span> <?php echo $mainTotal / $subjctCount; ?> </b></th>
            <th>
              @if ($mark == '')
              @else
              <a class="text-primary" href="printMark/{{$student->id}}/{{$mark->sub_grade}}">
                <button type="button" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
                  <i class=" ti-printer"></i>
                  <span>چاپ</span>
                </button>
              </a>
            @endif
            </th>
          </tr>
        </tfoot>
      </table> <br> </br>

      <center> <button type="button" name="button" class="form-control btn btn-info">جدول نتایج صنف ششم</button> </center>
      <table class="table table-striped table-bordered dataTable">
        <thead>
          <tr>
            <th>شماره</th>
            <th>صنف</th>
            <th>مضمون</th>
            <th>نمره وسط سال</th>
            <th>نمره سالانه</th>
            <th>جمله</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
        <?php $ms = 0; $fs = 0; $subTotal = 0; $mainTotal = 0; $subjctCount = 1; $mark = 0;?>
          @foreach($mark6 as $mark)
          <tr>
            <td>{{$subjctCount = $loop->iteration}} </td>
            <td>{{$mark->sub_grade}}</td>
            <td>{{$mark->subject}}</td>
            <td>{{$midtermScore = $mark->midterm_score}}</td>
            <td>{{$finalScore = $mark->final_score}}</td>
            <td>{{$sum = $mark->midterm_score + $mark->final_score}} <?php $subTotal += $sum; ?>  </td>
            <td>
              <a class="text-success" href="editMark/{{ $mark->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
            </td>
            <td>
               <a class="text-danger" href="deleteMark/{{ $mark->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $ms += $midtermScore; ?>
          <?php $fs += $finalScore; ?>
          <?php $mainTotal += $sum; ?>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">مجموعه نمرات</th>
            <th><?php echo $ms; ?></th>
            <th><?php echo $fs; ?></th>
            <th><?php echo $mainTotal; ?></th>
            <th style="color: blue"><b><span>%</span> <?php echo $mainTotal / $subjctCount; ?> </b></th>
            <th>
              @if ($mark == '')
              @else
              <a class="text-primary" href="printMark/{{$student->id}}/{{$mark->sub_grade}}">
                <button type="button" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
                  <i class=" ti-printer"></i>
                  <span>چاپ</span>
                </button>
              </a>
            @endif
            </th>
          </tr>
        </tfoot>
      </table> <br> </br>

      <center> <button type="button" name="button" class="form-control btn btn-danger">جدول نتایج صنف هفتم</button> </center>
      <table class="table table-striped table-bordered dataTable">
        <thead>
          <tr>
            <th>شماره</th>
            <th>صنف</th>
            <th>مضمون</th>
            <th>نمره وسط سال</th>
            <th>نمره سالانه</th>
            <th>جمله</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
        <?php $ms = 0; $fs = 0; $subTotal = 0; $mainTotal = 0; $subjctCount = 1; $mark = 0;?>
          @foreach($mark7 as $mark)
          <tr>
            <td>{{$subjctCount = $loop->iteration}} </td>
            <td>{{$mark->sub_grade}}</td>
            <td>{{$mark->subject}}</td>
            <td>{{$midtermScore = $mark->midterm_score}}</td>
            <td>{{$finalScore = $mark->final_score}}</td>
            <td>{{$sum = $mark->midterm_score + $mark->final_score}} <?php $subTotal += $sum; ?>  </td>
            <td>
              <a class="text-success" href="editMark/{{ $mark->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
            </td>
            <td>
               <a class="text-danger" href="deleteMark/{{ $mark->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $ms += $midtermScore; ?>
          <?php $fs += $finalScore; ?>
          <?php $mainTotal += $sum; ?>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">مجموعه نمرات</th>
            <th><?php echo $ms; ?></th>
            <th><?php echo $fs; ?></th>
            <th><?php echo $mainTotal; ?></th>
            <th style="color: blue"><b><span>%</span> <?php echo $mainTotal / $subjctCount; ?> </b></th>
            <th>
              @if ($mark == '')
              @else
              <a class="text-primary" href="printMark/{{$student->id}}/{{$mark->sub_grade}}">
                <button type="button" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
                  <i class=" ti-printer"></i>
                  <span>چاپ</span>
                </button>
              </a>
            @endif
            </th>
          </tr>
        </tfoot>
      </table> <br> </br>


      <center> <button type="button" name="button" class="form-control btn btn-success">جدول نتایج صنف هشتم</button> </center>
      <table class="table table-striped table-bordered dataTable">
        <thead>
          <tr>
            <th>شماره</th>
            <th>صنف</th>
            <th>مضمون</th>
            <th>نمره وسط سال</th>
            <th>نمره سالانه</th>
            <th>جمله</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
        <?php $ms = 0; $fs = 0; $subTotal = 0; $mainTotal = 0; $subjctCount = 1; $mark = 0;?>
          @foreach($mark8 as $mark)
          <tr>
            <td>{{$subjctCount = $loop->iteration}} </td>
            <td>{{$mark->sub_grade}}</td>
            <td>{{$mark->subject}}</td>
            <td>{{$midtermScore = $mark->midterm_score}}</td>
            <td>{{$finalScore = $mark->final_score}}</td>
            <td>{{$sum = $mark->midterm_score + $mark->final_score}} <?php $subTotal += $sum; ?>  </td>
            <td>
              <a class="text-success" href="editMark/{{ $mark->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
            </td>
            <td>
               <a class="text-danger" href="deleteMark/{{ $mark->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $ms += $midtermScore; ?>
          <?php $fs += $finalScore; ?>
          <?php $mainTotal += $sum; ?>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">مجموعه نمرات</th>
            <th><?php echo $ms; ?></th>
            <th><?php echo $fs; ?></th>
            <th><?php echo $mainTotal; ?></th>
            <th style="color: blue"><b><span>%</span> <?php echo $mainTotal / $subjctCount; ?> </b></th>
            <th>
              @if ($mark == '')
              @else
              <a class="text-primary" href="printMark/{{$student->id}}/{{$mark->sub_grade}}">
                <button type="button" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
                  <i class=" ti-printer"></i>
                  <span>چاپ</span>
                </button>
              </a>
            @endif
            </th>
          </tr>
        </tfoot>
      </table> <br> </br>

      <center> <button type="button" name="button" class="form-control btn btn-warning">جدول نتایج صنف نهم</button> </center>
      <table class="table table-striped table-bordered dataTable">
        <thead>
          <tr>
            <th>شماره</th>
            <th>صنف</th>
            <th>مضمون</th>
            <th>نمره وسط سال</th>
            <th>نمره سالانه</th>
            <th>جمله</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
        <?php $ms = 0; $fs = 0; $subTotal = 0; $mainTotal = 0; $subjctCount = 1; $mark = 0;?>
          @foreach($mark9 as $mark)
          <tr>
            <td>{{$subjctCount = $loop->iteration}} </td>
            <td>{{$mark->sub_grade}}</td>
            <td>{{$mark->subject}}</td>
            <td>{{$midtermScore = $mark->midterm_score}}</td>
            <td>{{$finalScore = $mark->final_score}}</td>
            <td>{{$sum = $mark->midterm_score + $mark->final_score}} <?php $subTotal += $sum; ?>  </td>
            <td>
              <a class="text-success" href="editMark/{{ $mark->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
            </td>
            <td>
               <a class="text-danger" href="deleteMark/{{ $mark->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $ms += $midtermScore; ?>
          <?php $fs += $finalScore; ?>
          <?php $mainTotal += $sum; ?>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">مجموعه نمرات</th>
            <th><?php echo $ms; ?></th>
            <th><?php echo $fs; ?></th>
            <th><?php echo $mainTotal; ?></th>
            <th style="color: blue"><b><span>%</span> <?php echo $mainTotal / $subjctCount; ?> </b></th>
            <th>
              @if ($mark == '')
              @else
              <a class="text-primary" href="printMark/{{$student->id}}/{{$mark->sub_grade}}">
                <button type="button" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
                  <i class=" ti-printer"></i>
                  <span>چاپ</span>
                </button>
              </a>
            @endif
            </th>
          </tr>
        </tfoot>
      </table> <br> </br>

      <center> <button type="button" name="button" class="form-control btn btn-success">جدول نتایج صنف دهم</button> </center>
      <table class="table table-striped table-bordered dataTable">
        <thead>
          <tr>
            <th>شماره</th>
            <th>صنف</th>
            <th>مضمون</th>
            <th>نمره وسط سال</th>
            <th>نمره سالانه</th>
            <th>جمله</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
        <?php $ms = 0; $fs = 0; $subTotal = 0; $mainTotal = 0; $subjctCount = 1; $mark = 0;?>
          @foreach($mark10 as $mark)
          <tr>
            <td>{{$subjctCount = $loop->iteration}} </td>
            <td>{{$mark->sub_grade}}</td>
            <td>{{$mark->subject}}</td>
            <td>{{$midtermScore = $mark->midterm_score}}</td>
            <td>{{$finalScore = $mark->final_score}}</td>
            <td>{{$sum = $mark->midterm_score + $mark->final_score}} <?php $subTotal += $sum; ?>  </td>
            <td>
              <a class="text-success" href="editMark/{{ $mark->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
            </td>
            <td>
               <a class="text-danger" href="deleteMark/{{ $mark->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $ms += $midtermScore; ?>
          <?php $fs += $finalScore; ?>
          <?php $mainTotal += $sum; ?>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">مجموعه نمرات</th>
            <th><?php echo $ms; ?></th>
            <th><?php echo $fs; ?></th>
            <th><?php echo $mainTotal; ?></th>
            <th style="color: blue"><b><span>%</span> <?php echo $mainTotal / $subjctCount; ?> </b></th>
            <th>
              @if ($mark == '')
              @else
              <a class="text-primary" href="printMark/{{$student->id}}/{{$mark->sub_grade}}">
                <button type="button" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
                  <i class=" ti-printer"></i>
                  <span>چاپ</span>
                </button>
              </a>
            @endif
            </th>
          </tr>
        </tfoot>
      </table> <br> </br>


      <center> <button type="button" name="button" class="form-control btn btn-danger">جدول نتایج صنف یازدهم</button> </center>
      <table class="table table-striped table-bordered dataTable">
        <thead>
          <tr>
            <th>شماره</th>
            <th>صنف</th>
            <th>مضمون</th>
            <th>نمره وسط سال</th>
            <th>نمره سالانه</th>
            <th>جمله</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
        <?php $ms = 0; $fs = 0; $subTotal = 0; $mainTotal = 0; $subjctCount = 1; $mark = 0;?>
          @foreach($mark11 as $mark)
          <tr>
            <td>{{$subjctCount = $loop->iteration}} </td>
            <td>{{$mark->sub_grade}}</td>
            <td>{{$mark->subject}}</td>
            <td>{{$midtermScore = $mark->midterm_score}}</td>
            <td>{{$finalScore = $mark->final_score}}</td>
            <td>{{$sum = $mark->midterm_score + $mark->final_score}} <?php $subTotal += $sum; ?>  </td>
            <td>
              <a class="text-success" href="editMark/{{ $mark->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
            </td>
            <td>
               <a class="text-danger" href="deleteMark/{{ $mark->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $ms += $midtermScore; ?>
          <?php $fs += $finalScore; ?>
          <?php $mainTotal += $sum; ?>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">مجموعه نمرات</th>
            <th><?php echo $ms; ?></th>
            <th><?php echo $fs; ?></th>
            <th><?php echo $mainTotal; ?></th>
            <th style="color: blue"><b><span>%</span> <?php echo $mainTotal / $subjctCount; ?> </b></th>
            <th>
              @if ($mark == '')
              @else
              <a class="text-primary" href="printMark/{{$student->id}}/{{$mark->sub_grade}}">
                <button type="button" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
                  <i class=" ti-printer"></i>
                  <span>چاپ</span>
                </button>
              </a>
            @endif
            </th>
          </tr>
        </tfoot>
      </table> <br> </br>

      <center> <button type="button" name="button" class="form-control btn btn-primary">جدول نتایج صنف دوازدهم</button> </center>
      <table class="table table-striped table-bordered dataTable">
        <thead>
          <tr>
            <th>شماره</th>
            <th>صنف</th>
            <th>مضمون</th>
            <th>نمره وسط سال</th>
            <th>نمره سالانه</th>
            <th>جمله</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
        <?php $ms = 0; $fs = 0; $subTotal = 0; $mainTotal = 0; $subjctCount = 1; $mark = 0;?>
          @foreach($mark12 as $mark)
          <tr>
            <td>{{$subjctCount = $loop->iteration}} </td>
            <td>{{$mark->sub_grade}}</td>
            <td>{{$mark->subject}}</td>
            <td>{{$midtermScore = $mark->midterm_score}}</td>
            <td>{{$finalScore = $mark->final_score}}</td>
            <td>{{$sum = $mark->midterm_score + $mark->final_score}} <?php $subTotal += $sum; ?>  </td>
            <td>
              <a class="text-success" href="editMark/{{ $mark->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
            </td>
            <td>
               <a class="text-danger" href="deleteMark/{{ $mark->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $ms += $midtermScore; ?>
          <?php $fs += $finalScore; ?>
          <?php $mainTotal += $sum; ?>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">مجموعه نمرات</th>
            <th><?php echo $ms; ?></th>
            <th><?php echo $fs; ?></th>
            <th><?php echo $mainTotal; ?></th>
            <th style="color: blue"><b><span>%</span> <?php echo $mainTotal / $subjctCount; ?> </b></th>
            <th>
              @if ($mark == '')
              @else
              <a class="text-primary" href="printMark/{{$student->id}}/{{$mark->sub_grade}}">
                <button type="button" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
                  <i class=" ti-printer"></i>
                  <span>چاپ</span>
                </button>
              </a>
            @endif
            </th>
          </tr>
        </tfoot>
      </table> <br> </br>


    </div>
  </div>
</div>
@endsection
