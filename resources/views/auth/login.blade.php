@extends('frontend.layout.master')



@section('content')





<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3" id="content">
  



          
                <!--Middle Part Start-->
                <div id="content">
                  <h1 class="title" style="margin: 40px 0;font-size:24px">ورود به حساب کاربری</h1>
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="form-group">
                          <label class="control-label" for="email">آدرس ایمیل</label>
                          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="آدرس ایمیل" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                          <label class="control-label"  for="password">رمز عبور</label>
                          {{-- <input type="password" name="password" value=""   id="input-password" class="form-control" /> --}}
                          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="رمز عبور" required>

                          @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                          <br />
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                مرا به خاطر بسپار
                            </label>

                            @if (Route::has('password.request'))
                                    <a class="btn btn-link pull-left" href="{{ route('password.request') }}">
                                        فراموشی رمز عبور
                                    </a>
                            @endif
                          </div>
                         
                        <input type="submit" value="ورود" class="btn btn-primary" style="padding:5px 30px" />
                  </form>
                </div>
        </div>

  
        </div>
    </div>
</div>    
  

@endsection

