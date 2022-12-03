@extends('backend.layout.master')

@section('meta')
<title>مدیریت فروشگاه | 
   ایجاد دسته بندی
</title>
@endsection

@section('styles')
<link rel="stylesheet" href="/dist/css/dropzone.min.css">

@endsection



@section('content')

 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مدیریت دسته بندی ها</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">خانه</a></li>
              <li class="breadcrumb-item active"><a href="{{route('categories.index')}}">دسته بندی ها</a></li>
              <li class="breadcrumb-item active">ایجاد دسته بندی جدید</li>

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
                      ایجاد دسته بندی جدید
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
                    
                    <div class="card-body">
                        @csrf
                      <div class="form-group">
                        
                        <label>عنوان</label>
                        <input type="text" name="title" class="form-control" placeholder="وارد کردن عنوان ...">
                      </div>
  
                      <div class="form-group">
                        <label>آدرس URL</label>
                        <input type="text" name="slug" class="form-control" placeholder="url را وارد نمایید...">
                      </div>
  
                    
                        <div class="form-group">
                          <label>دسته والد</label>
                          <select class="form-control" name="parent">
                            <option value="0">بدون والد</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                           
                            @if(count($category->childrenRecursive)>0)
                            @include('backend.categories.catlist-partial',['catchild'=>$category,'level'=>1,'create'=>'create'])
                                                        
                            @endif  
                            @endforeach
                        </select>
                        </div>
                       

                        <div class="form-group">
                          <label>متای توضیحات</label>
                          <textarea rows="3" name="meta_desc" class="form-control" placeholder="توضیحات موضوع جهت نمایش در گوگل..."></textarea>
                        </div>
  

                        
                        <div class="form-group mt-4 mb-4">
                          <label class="d-block">ویژگی های این کتگوری را انتخاب نمایید</label>
                          {{-- <button type="button" class="btn btn-default">تعریف ویژگی جدید</button> --}}


                          @foreach($attr_groups as $attr_gp)

                            <div class="form-check d-inline">
                              <input class="form-check-input" type="checkbox" name="attr-gps[]" value="{{$attr_gp->id}}">
                              <label class="form-check-label ml-3">{{$attr_gp->title}}</label>
                            </div>
                            @endforeach
                        </div>




                        






                        <div class="form-group d-block">
                          <label class="d-block" for="exampleFormControlFile1">تصویر شاخص</label>
                          <div class="input-group">
                          <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                          </div>
                        </div>
  
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">ایجاد دسته بندی</button>
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
