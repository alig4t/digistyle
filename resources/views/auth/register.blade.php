@extends('frontend.layout.master')

@section('content')




<div class="container">

  <div class="row">

      <div class="col-sm-8 col-sm-offset-2" id="content">

          <h1 class="title" style="margin: 30px 0">ثبت نام حساب کاربری</h1>
          <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="/login">صفحه لاگین</a> مراجعه کنید.</p>
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            @csrf
            <fieldset id="account">
              <legend>اطلاعات شخصی شما</legend>
              <div style="display: none;" class="form-group required">
                <label class="col-sm-2 control-label">گروه مشتری</label>
                <div class="col-sm-10">
                  <div class="radio">
                    <label>
                      <input type="radio" checked="checked" value="1" name="customer_group_id">
                      پیشفرض</label>
                  </div>
                </div>
              </div>


              <div class="form-group required">
                <label for="input-firstname" class="col-sm-2 control-label">نام و نام خانوادگی</label>
                <div class="col-sm-10">
                  {{-- <input type="text" class="form-control" id="input-firstname" placeholder=" نام و نام خانوادگی" value="{{old('name')}}" name="name"> --}}
               
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder=" نام و نام خانوادگی" required autofocus>

                  @if ($errors->has('name'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                      
                </div>
              </div>



              {{-- <div class="form-group required">
                <label for="input-lastname" class="col-sm-2 control-label">نام خانوادگی</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-lastname" placeholder="نام خانوادگی" value="" name="lastname">
                </div>
              </div> --}}
              <div class="form-group required">
                <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                <div class="col-sm-10">
                  {{-- <input type="email" class="form-control" id="input-email" placeholder="آدرس ایمیل" value="{{old('email')}}" name="email">
                 --}}
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="آدرس ایمیل" value="{{ old('email') }}" required>

                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                
                </div>
              </div>
              <div class="form-group">
                <label for="input-telephone" class="col-sm-2 control-label">شماره موبایل</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" id="input-telephone" placeholder="شماره تلفن" value="{{old('phone')}}" name="phone" required>
                </div>
              </div>
              
            </fieldset>

            <fieldset>
              <legend>رمز عبور شما</legend>
              <div class="form-group required">
                <label for="input-password" class="col-sm-2 control-label">رمز عبور</label>
                <div class="col-sm-10">
                  {{-- <input type="password" class="form-control" id="input-password" placeholder="رمز عبور"  name="password"> --}}
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                
                </div>
              </div>
              <div class="form-group required">
                <label for="input-confirm" class="col-sm-2 control-label">تکرار رمز عبور</label>
                <div class="col-sm-10">
                  {{-- <input type="password" class="form-control" id="input-confirm" placeholder="تکرار رمز عبور" name="confirm"> --}}
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                
                </div>
              </div>
            </fieldset>
            <fieldset>
              <legend>خبرنامه</legend>
              <div class="form-group">
                <label class="col-sm-2 control-label">اشتراک</label>
                <div class="col-sm-10">
                  <label class="radio-inline">
                    <input type="radio" value="1" name="newsletter">
                    بله</label>
                  <label class="radio-inline">
                    <input type="radio" checked="checked" value="0" name="newsletter">
                    نه</label>
                </div>
              </div>
            </fieldset>
            <div class="buttons">
              <div class="w-100">
                <input type="checkbox" value="1" name="agree">
                &nbsp;من <a class="agree" href="#"><b>سیاست حریم خصوصی</b> را خوانده ام و با آن موافق هستم</a> &nbsp;
                <input type="submit" class="btn btn-primary pull-left" value="ادامه">
              </div>
            </div>
          </form>
        </div>
      

  </div>

</div>    




@endsection

