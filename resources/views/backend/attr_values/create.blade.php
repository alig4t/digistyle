@extends('backend.layout.master')

@section('meta')
<title>مدیریت فروشگاه | 
   ایجاد مقدار ویژگی جدید
</title>
@endsection




@section('content')

 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مدیریت مقدار ویژگی ها</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">خانه</a></li>
              <li class="breadcrumb-item active"><a href="{{route('attribute-values.index')}}">مقدار ویژگی ها</a></li>
              <li class="breadcrumb-item active">ایجاد مقدار ویژگی جدید</li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>




 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        
          <div class="col-10 mx-auto">
            @if(count($errors)>0)
            @foreach($errors->all() as $err)
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6><i class="icon fa fa-ban"></i> {{$err}}</h6>
            </div>
            @endforeach
            @endif
          </div>
            

            <div class="col-md-10 mx-auto">
                <!-- general form elements -->
                <div class="card card-warning ">
                  <div class="card-header">
                    <h3 class="card-title">
                      ایجاد مقدار ویژگی جدید
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="POST" action="{{route('attribute-values.store')}}">
                    
                    <div class="card-body">
                        @csrf
                      <div class="form-group">
                        
                        <label>عنوان</label>
                        <input type="text" name="title" class="form-control" placeholder="وارد کردن مقدار ...">
                      </div>
  

                      <div class="form-group">
                        <label>مقدار ویژگی</label>
                        <select class="form-control" name="group">
                          <option value="null">گروه بندی را انتخاب نمایید</option>
                          @foreach ($attr_groups as $attr_gp)
                          <option value="{{$attr_gp->id}}">{{$attr_gp->title}}</option>
                          @endforeach
                      </select>
                      </div>
                       

  
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">ایجاد مقدار ویژگی</button>
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
