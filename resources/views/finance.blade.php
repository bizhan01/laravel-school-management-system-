@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="row row-md mb-1">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="box bg-white user-1">
          <div class="u-img img-cover" style="background-image: url('img/photos-1/4.jpg');"></div>
          <div class="u-content">
            <div class="avatar box-64">
              <img class="b-a-radius-circle shadow-white" src="/UploadedImages/{{Auth::user()->profileImage}}" style="width: 65px; height: 65px;">
              <i class="status bg-success bottom right"></i>
            </div>
            <h5><a class="text-black" href="#">{{ Auth::user()->name }}</a></h5>
            <p class="text-muted pb-0-5">سر معلمیت</p>
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
      <div class="col-md-12">
       <div class="box" style="padding: 5px; border: none;">
         <div class="row" style="margin-top: 45px;">
           <div class="col-lg-4 col-md-4 col-xs-4">
             <div class="box box-block bg-white tile tile-1 mb-2">
               <div class="t-icon right"><span class="bg-success"></span><i class="ti-user"></i></div>
               <div class="t-content">
                 <h6 class="text-uppercase mb-1">استادان</h6>
                 <h1 class="mb-1">{{ $teachers }}</h1>
                 <small><span class="text-muted">لیست تمامی استادان مرکر آموزشی</span></small>
               </div>
             </div>
           </div>

           <div class="col-lg-4 col-md-4 col-xs-4">
             <div class="box box-block bg-white tile tile-1 mb-2">
               <div class="t-icon right"><span class="bg-primary"></span><i class="fa fa-users"></i></div>
               <div class="t-content">
                 <h6 class="text-uppercase mb-1">شاگردان</h6>
                 <h1 class="mb-1">{{ $students }}</h1>
                 <small><span class="text-muted">لیست تمامی شاگردان مرکر آموزشی</span></small>
               </div>
             </div>
           </div>

           <div class="col-lg-4 col-md-4 col-xs-4">
             <div class="box box-block bg-white tile tile-1 mb-2">
               <div class="t-icon right"><span class="bg-info"></span><i class="fa fa-users"></i></div>
               <div class="t-content">
                 <h6 class="text-uppercase mb-1">کارمندان</h6>
                 <h1 class="mb-1">{{ $empolyeeCount }}</h1>
                 <small><span class="text-muted">لیست تمامی شاگردان مرکر آموزشی</span></small>
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
