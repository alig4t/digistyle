@extends('backend.layout.master')

@section('meta')
<title>مدیریت فروشگاه | 
   ویرایش رنگ 
</title>
@endsection



@section('styles')
{{-- <style href="/plugins/colorpicker/bootstrap-colorpicker.css"></style>
 --}}
 <link rel="stylesheet" href="/plugins/colorpicker/bootstrap-colorpicker.min.css">
 @endsection



@section('content')

 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مدیریت رنگ ها</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">خانه</a></li>
              <li class="breadcrumb-item active"><a href="{{route('sizes.index')}}">رنگ ها</a></li>
              <li class="breadcrumb-item active">ویرایش رنگ </li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>




 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        
          

          @include('backend.layout.error')
            

            <div class="col-md-10 mx-auto">
                <!-- general form elements -->
                <div class="card card-warning ">
                  <div class="card-header">
                    <h3 class="card-title">
                      ویرایش رنگ 
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="POST" action="{{route('colors.update',$color->id)}}">
                    
                    <div class="card-body">
                        @csrf
                        {{method_field('PATCH')}}
                      <div class="form-group">
                        <label>عنوان رنگ</label>
                        {{-- <label class="font11">در صورت خالی بودن سیستم به صورت اتومات برای شما می سازد</label> --}}
                        <label class="d-block font11">مثال : زرشکی</label>

                        <input type="text" name="color" class="form-control" value="{{$color->color}}" placeholder="وارد کردن عنوان رنگ ...">
                      </div>
  
                      <div class="form-group">
                        <label>کد رنگ</label>
                        {{-- <input type="text" class="form-control my-colorpicker1 colorpicker-element"> --}}
                        <input type="text" name="hex" value="{{$color->hex}}" class="form-control my-colorpicker1 colorpicker-element">
                      </div>

                      

  
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">ویرایش رنگ</button>
                    </div>
                    
                  
                </div></form>
                <!-- /.card -->
    
                <!-- Form Element sizes -->
              
    
              </div>
              <!--/.col (left) -->
            
              <!--/.col (right) -->
            </div>






          <!-- /.row -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>



@endsection

@section('scripts')

<script src="/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script>
  $('.my-colorpicker1').colorpicker()
  //  $('.my-colorpicker1')
// document.getElementById('my-colorpicker1').colorpicker();
    //color picker with addon
    // $('.my-colorpicker2').colorpicker()
</script>
@endsection


