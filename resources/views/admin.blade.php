@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="row row-md mb-1">
      <div class="col-md-4">
        <div class="box bg-white user-1">
          <div class="u-img img-cover" style="background-image: url('img/photos-1/4.jpg');"></div>
          <div class="u-content">
            <div class="avatar box-64">
              <img class="b-a-radius-circle shadow-white" src="/UploadedImages/{{Auth::user()->profileImage}}" style="width: 65px; height: 65px;">
              <i class="status bg-success bottom right"></i>
            </div>
            <h5><a class="text-black" href="#">{{ Auth::user()->name }}</a></h5>
            <p class="text-muted pb-0-5">مدیریت لیسه</p>
            <div class="text-xs-center pb-0-5">
              <a href="{{ route('profile') }}" class="btn btn-primary btn-rounded mr-0-5">ویرایش پروفایل</a>
              <!-- <button type="submit" class="btn btn-danger btn-rounded">خروج از سیستم</button> -->
              <a  href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <button type="submit" class="btn btn-danger btn-rounded">خروج از سیستم</button>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </div>

        </div>
      </div>
      <div class="col-md-8">
        <div class="box box-block bg-white">
<!--           <div class="clearfix mb-1">
            <h5 class="float-xs-left">آمار فروشات</h5>

          </div> -->
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <div class="card">
                  <div class="card-header">
                    تاریخ
                  </div>
                  <div class="card-block">
                    <blockquote class="card-blockquote">
                      <center>
                        <h4 dir="ltr"> <?php date_default_timezone_set("asia/kabul"); echo date('Y-M-d'); ?></h4>
                      </center>
                    </blockquote>
                  </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <div class="card">
                  <div class="card-header">
                    ساعت
                  </div>
                  <div class="card-block">
                    <blockquote class="card-blockquote">
                      <center><h4 dir="ltr"><?php echo date("H:i:s a"); ?></h4></center>
                    </blockquote>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>

       <div class="col-md-8" style="margin-top: 45px;">
        <div class="box" style="padding: 5px; border: none;">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12">
              <div class="box box-block bg-white tile tile-1 mb-2">
                <div class="t-icon right"><span class="bg-danger"></span><i class="ti-user"></i></div>
                <div class="t-content">
                  <h6 class="text-uppercase mb-1">استادان</h6>
                  <h1 class="mb-1">{{ $teachers }}</h1>
                  <small><span class="text-muted">لیست تمامی استادان مرکر آموزشی</span></small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
              <div class="box box-block bg-white tile tile-1 mb-2">
                <div class="t-icon right"><span class="bg-danger"></span><i class="fa fa-users"></i></div>
                <div class="t-content">
                  <h6 class="text-uppercase mb-1">شاگردان</h6>
                  <h1 class="mb-1">{{ $students }}</h1>
                  <small><span class="text-muted">لیست تمامی شاگردان مرکر آموزشی</span></small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
              <div class="box box-block bg-white tile tile-1 mb-2">
                <div class="t-icon right"><span class="bg-success"></span><i class="fa fa-users"></i></div>
                <div class="t-content">
                    <h6 class="text-uppercase mb-1">کاربران سیستم</h6>
                    <h1 class="mb-1">{{ $users }}</h1>
                    <small><span class="text-muted">شامل مدیر عمومی و دیگر مدیران ...</span></small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>


@endsection
