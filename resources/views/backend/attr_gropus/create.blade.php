@extends('backend.layout.master')

@section('meta')
<title>مدیریت فروشگاه | 
   ایجاد ویژگی جدید
</title>
@endsection




@section('content')

 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مدیریت گروه بندی ویژگی ها</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">خانه</a></li>
              <li class="breadcrumb-item active"><a href="{{route('attribute-groups.index')}}">گروه بندی ویژگی ها</a></li>
              <li class="breadcrumb-item active">ایجاد ویژگی جدید</li>

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
                      ایجاد ویژگی جدید
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  
                  <form role="form" method="POST" action="{{route('attribute-groups.store')}}">
                    
                    <div class="card-body">
                        @csrf

                      <div class="form-group">
                        <label>عنوان</label>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="وارد کردن عنوان ...">
                      </div>

                      <div class="form-group">
                        <label>مقدار ویژگی</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="type" value="single">
                          <label class="form-check-label">تکی</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="type" value="multiple">
                          <label class="form-check-label">چندتایی</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="type" value="text">
                          <label class="form-check-label">متنی</label>
                        </div>
                      </div>
                       

  
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">ایجاد گروه ویژگی</button>
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
<script src="/dist/js/dropzone.min.js"></script>
{{-- <script>
var drop = new Dropzone('#shakhes',{

}) --}}
{{-- </script> --}}
@endsection
