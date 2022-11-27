@extends('backend.layout.master')

@section('meta')
<title>مدیریت فروشگاه | 
   ویرایش دسته بندی
</title>
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
              <li class="breadcrumb-item active">ویرایش دسته بندی</li>

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
                      ویرایش دسته بندی
                      {{$cat->title}}
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div class="card-body">
                  <form role="form" method="POST" action="{{route('categories.update',$cat->id)}}" enctype="multipart/form-data">
                    
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group">
                        
                        <label>عنوان</label>
                        <input type="text" name="title" value="{{$cat->title}}" class="form-control" placeholder="وارد کردن عنوان ...">
                      </div>
  
                      <div class="form-group">
                        <label>آدرس URL</label>
                        <input type="text" name="slug" value="{{$cat->slug}}" class="form-control" placeholder="url را وارد نمایید...">
                      </div>
  
                     
                        <div class="form-group">
                          <label>دسته والد</label>
                            <select class="form-control" name="parent">
                                <option value="0">بدون والد</option>
                                @foreach ($categories as $category)
                                @if($category->id == $cat->id)
                                  @php($show='disabled')
                                @else
                                  @php($show='')
                                @endif
                                <option value="{{$category->id}}" @if($cat->parent_id == $category->id) selected @endif  {{$show}}>{{$category->title}}</option>
                               
                                @if(count($category->childrenRecursive)>0)
                      @include('backend.categories.catlist-partial',['catchild'=>$category,'show'=>$show,'level'=>1,'edit'=>'edit'])
                                
                                
                                @endif  
                                @php($show='')
                                @endforeach
                            </select>
                        </div>
                       
                        <div class="form-group">
                            <label>متای توضیحات</label>
                            <textarea rows="3" name="meta_desc" class="form-control" placeholder="توضیحات موضوع جهت نمایش در گوگل...">{{$cat->meta_description}}</textarea>
                            </div>

                            
                        <div class="form-group">
                            <label for="exampleFormControlFile1">تصویر شاخص</label>
                            @if($cat->photo != null )
                            <div class="input-group mb-2">
                                <img src="/images/cats/{{$cat->photo}}" class="align-center" width="300px">
                            </div>
                            @endif
                            <div class="input-group">
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                          </div>
  
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">ویرایش دسته بندی</button>
                    </div>
                    
                  
                  </form>


                  @if(count($cat->childrenRecursive)==0)
                  <form method="POST" class="d-inline" action="{{route('categories.destroy',$cat->id)}}">
                    <div class="input-group d-inline">
                      @csrf
                      <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-warning pull-left" value="حذف دسته بندی">
                    </div>
                  </form>

                  @else
                  {{-- <button type="button" class="btn btn-warning pull-left" value="حذف دسته بندی به دلیل داشتن زیردسته امکان پذیر نمی باشد"></button> --}}
                  <button type="button" class="btn btn-gray pull-left disabled">حذف دسته بندی به دلیل داشتن زیردسته امکان پذیر نمی باشد</button>

                  @endif


                </div>


              
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





















<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      
        <div class="col-12">
          
          




        </div>    <!-- /.col12 -->
      
    </div> <!--row -->
</section>








@endsection

