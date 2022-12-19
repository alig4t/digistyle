



@section('content')
<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="login.html">حساب کاربری</a></li>
        <li><a href="register.html">ثبت نام</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-12" id="content">
          <h1 class="title">ثبت نام حساب کاربری</h1>
          <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="login.html">صفحه لاگین</a> مراجعه کنید.</p>
          <form class="form-horizontal">
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
                <label for="input-firstname" class="col-sm-2 control-label">نام</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-firstname" placeholder="نام" value="" name="firstname">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-lastname" class="col-sm-2 control-label">نام خانوادگی</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-lastname" placeholder="نام خانوادگی" value="" name="lastname">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="input-email" placeholder="آدرس ایمیل" value="" name="email">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-telephone" class="col-sm-2 control-label">شماره تلفن</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" id="input-telephone" placeholder="شماره تلفن" value="" name="telephone">
                </div>
              </div>
              <div class="form-group">
                <label for="input-fax" class="col-sm-2 control-label">فکس</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-fax" placeholder="فکس" value="" name="fax">
                </div>
              </div>
            </fieldset>
            <fieldset id="address">
              <legend>آدرس</legend>
              <div class="form-group">
                <label for="input-company" class="col-sm-2 control-label">شرکت</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-company" placeholder="شرکت" value="" name="company">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-address-1" class="col-sm-2 control-label">آدرس 1</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-address-1" placeholder="آدرس 1" value="" name="address_1">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-city" class="col-sm-2 control-label">شهر</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-city" placeholder="شهر" value="" name="city">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-postcode" class="col-sm-2 control-label">کد پستی</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-postcode" placeholder="کد پستی" value="" name="postcode">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-country" class="col-sm-2 control-label">کشور</label>
                <div class="col-sm-10">
                  <select class="form-control" id="input-country" name="country_id">
                    <option value=""> --- لطفا انتخاب کنید --- </option>
                    <option value="244">Aaland Islands</option>
               
                    <option value="227">Vanuatu</option>
                    <option value="228">Vatican شهر State (Holy See)</option>
                    <option value="229">Venezuela</option>
                    <option value="230">Viet Nam</option>
                    <option value="231">Virgin Islands (British)</option>
                    <option value="232">Virgin Islands (U.S.)</option>
                    <option value="233">Wallis and Futuna Islands</option>
                    <option value="234">Western Sahara</option>
                    <option value="235">Yemen</option>
                    <option value="238">Zambia</option>
                    <option value="239">Zimbabwe</option>
                  </select>
                </div>
              </div>
              <div class="form-group required">
                <label for="input-zone" class="col-sm-2 control-label">شهر / استان</label>
                <div class="col-sm-10">
                  <select class="form-control" id="input-zone" name="zone_id">
                    <option value=""> --- لطفا انتخاب کنید --- </option>
                    <option value="3513">Aberdeen</option>
                    <option value="3514">Aberdeenshire</option>
               
                    <option value="3609">Western Isles</option>
                    <option value="3610">Wiltshire</option>
                    <option value="3611">Worcestershire</option>
                    <option value="3612">Wrexham</option>
                  </select>
                </div>
              </div>
            </fieldset>
            <fieldset>
              <legend>رمز عبور شما</legend>
              <div class="form-group required">
                <label for="input-password" class="col-sm-2 control-label">رمز عبور</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-password" placeholder="رمز عبور" value="" name="password">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-confirm" class="col-sm-2 control-label">تکرار رمز عبور</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-confirm" placeholder="تکرار رمز عبور" value="" name="confirm">
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
              <div class="pull-right">
                <input type="checkbox" value="1" name="agree">
                &nbsp;من <a class="agree" href="#"><b>سیاست حریم خصوصی</b> را خوانده ام و با آن موافق هستم</a> &nbsp;
                <input type="submit" class="btn btn-primary" value="ادامه">
              </div>
            </div>
          </form>
        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->
       
        <!--Right Part End -->
      </div>
    </div>
  </div>

@endsection

