@extends('backend.layout.master')

@section('meta')
<title>مدیریت فروشگاه | 
   ایجاد نقش جدید
</title>
@endsection



@section('styles')

@endsection



@section('content')

 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مدیریت نقش ها</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">خانه</a></li>
              <li class="breadcrumb-item active"><a href="{{route('roles.index')}}">نقش ها</a></li>
              <li class="breadcrumb-item active">ایجاد نقش جدید</li>

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
                      ایجاد نقش جدید
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="POST" action="{{route('roles.store')}}">
                    
                    <div class="card-body">
                        @csrf
                      <div class="form-group">
                        <label>نام نقش</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="وارد کردن نام ...">
                      </div>
  
                      <div class="form-group">
                        <label>وظایف نقش</label>
                        <input type="text" name="label" class="form-control" value="{{old('label')}}" placeholder="وارد کردن وظیفه نقش ...">
                      </div>


                      <div class="form-group mt-4 mb-4">
                        <label class="d-block">وظایف نقش را انتخاب نمایید</label>
                        @foreach($permisssions as $permission)
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$permission->id}}">
                            <label class="form-check-label ml-3">{{$permission->label}} - {{$permission->name}}</label>
                          </div>
                        @endforeach
                        </div>


  
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">ایجاد نقش جدید</button>
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

@endsection
