@extends('backend.layout.master')

@section('meta')
<title>مدیریت فروشگاه | 
   ایجاد برند جدید
</title>
@endsection



@section('styles')

@endsection



@section('content')

 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مدیریت برندها</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">خانه</a></li>
              <li class="breadcrumb-item active"><a href="{{route('brands.index')}}">برندها</a></li>
              <li class="breadcrumb-item active">ایجاد برند جدید</li>

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
                      ایجاد برند جدید
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="POST" action="{{route('brands.store')}}" enctype="multipart/form-data">
                    
                    <div class="card-body">
                        @csrf
                      <div class="form-group">
                        <label>نام برند</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="وارد کردن نام ...">
                      </div>
  
                      <div class="form-group">
                        <label>نام لاتین برند</label>
                        <input type="text" name="slug" class="form-control" value="{{old('slug')}}" placeholder="وارد کردن نام لاتین ...">
                      </div>

                      <div class="form-group d-block">
                        <label class="d-block" for="exampleFormControlFile1">لوگو برند</label>
                        <div class="input-group">
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                      </div>


                      <div class="form-group">
                        <label>توضیحات برند</label>
                        <textarea id="editor1" type="text" name="desc" class="form-control" placeholder="در مورد برند بنویسید ...">{{old('desc')}}</textarea>
                      </div>
  
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">ایجاد برند</button>
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
<script src="/dist/ckeditor/ckeditor.js"></script>

<script>
  CKEDITOR.replace( 'editor1', {

    filebrowserUploadUrl: '/admin/upload-image',
    filebrowserImageUploadUrl: '/admin/upload-image',
    uploadUrl: '/admin/upload-image',

} );

</script>
@endsection
