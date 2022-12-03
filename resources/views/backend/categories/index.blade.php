@extends('backend.layout.master')

@section('meta')
<title>مدیریت فروشگاه | 
    دسته بندی ها
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
              <li class="breadcrumb-item active">دسته بندی ها</li>
            </ol>
          </div><!-- /.col -->
          
          <div class="col-12 mt-4">
            @if(Session::has('new_cat'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6 style="margin: 0"><i class="icon fa"></i> {{Session('new_cat')}}</h6>
            </div>   
            @endif

            @if(Session::has('edit_cat'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6 style="margin: 0"><i class="icon fa"></i> {{Session('edit_cat')}}</h6>
            </div>   
            @endif

            @if(Session::has('delete_cat'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6 style="margin: 0"><i class="icon fa"></i> {{Session('delete_cat')}}</h6>
            </div>   
            @endif
          </div>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>




 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
          <div class="col-12">
            
            <div class="card">
              
              <div class="card-header align-middle text-center">
                <h3 class="card-title pull-right">لیست دسته بندی ها</h3>
                <a href="{{route('categories.create')}}" class="btn btn-app pull-left">
                  <i class="fa fa-plus"></i> جدید
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <tbody><tr>
                    <th style="width: 10px">#</th>
                    <th class="align-middle text-center">نام</th>
                    <th class="align-middle text-center">آدرس سئو</th>
                    <th class="align-middle text-center">والد</th>
                    <th class="align-middle text-center">تصویر</th>
                    <th class="align-middle text-center">ویژگی ها</th>
                    <th class="align-middle text-center">عملیات</th>

                  </tr>
                  

                    @foreach($categories as $category)
                    <tr class="bg-gray">
                    <td class="align-middle text-center">{{$category->id}}</td>
                    <td class="align-middle text-center font-weight-bold"><a href="{{route('categories.edit',$category->id)}}">{{$category->title}}</a></td>
                    <td class="align-middle text-center">{{$category->slug}}</td>
                    <td class="align-middle text-center">دسته والد</td>
                    <td class="align-middle text-center"><img src="/images/cats/{{$category->photo}}" width="200px"></td>
                   
                    <td class="align-middle text-center">
                      <ul class="list-group ul-attr-index">
                      @foreach($category->attributegroups as $attr)
                      {{-- {{dd($attr)}} --}}
                      <li class="list-group-item">{{$attr->title}}</li>

                      @endforeach
                      </ul>
                    </td>
                   
                   
                    <td class="align-middle text-center">
                      <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning btn-sm">ویرایش</a>
                      @if(count($category->childrenRecursive)>0)
                      <button type="button" class="btn btn-gray btn-sm disabled font11">غیر قابل حذف</button>
                      @else
                      <form class="d-inline" action="{{route('categories.destroy',$category->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-warning btn-sm" value="حذف">
                      </form>
                      @endif
                    </td>
                    </tr>

                    @if($category->childrenRecursive)
                 
                      @include('backend.categories.catlist-partial',['catchild'=>$category,'level'=>1,'list'=>'list'])
                  
                      @endif


                    @endforeach





                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
          
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
        
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

