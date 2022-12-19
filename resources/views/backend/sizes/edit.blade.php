@extends('backend.layout.master')

@section('meta')
<title>مدیریت فروشگاه | 
   ویرایش سایز 
</title>
@endsection



@section('styles')

@endsection



@section('content')

 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مدیریت سایزها</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">خانه</a></li>
              <li class="breadcrumb-item active"><a href="{{route('sizes.index')}}">سایزها</a></li>
              <li class="breadcrumb-item active">ویرایش سایز </li>

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
                      ویرایش سایز 
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="POST" action="{{route('sizes.update',$size->id)}}" enctype="multipart/form-data">
                    
                    <div class="card-body">
                        @csrf
                        {{method_field('PATCH')}}
                      <div class="form-group">
                        <label>اندازه</label>
                        {{-- <label class="font11">در صورت خالی بودن سیستم به صورت اتومات برای شما می سازد</label> --}}
                        <label class="d-block">مثال : M - 36 - XXL</label>

                        <input type="text" name="size" class="form-control" value="{{$size->size}}" placeholder="وارد کردن اندازه ...">
                      </div>
  
                      <div class="form-group">
                        <label>توضیح کوتاه سایز (اختیاری)</label>
                        <input type="text" name="description" class="form-control" value="{{$size->description}}" placeholder="وارد کردن توضیح (اختیاری)  ...">
                      </div>

  
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">ویرایش سایز</button>
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

