@extends('backend.layout.master')

@section('meta')
<title>مدیریت فروشگاه | 
   برند ها
</title>
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
              <li class="breadcrumb-item active">برندها</li>
            </ol>
          </div><!-- /.col -->
          
          <div class="col-12 mt-4">
            @if(Session::has('new_brand'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6 style="margin: 0"><i class="icon fa"></i> {{Session('new_brand')}}</h6>
            </div>   
            @endif

            @if(Session::has('edit_brand'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6 style="margin: 0"><i class="icon fa"></i> {{Session('edit_brand')}}</h6>
            </div>   
            @endif

            @if(Session::has('delete_brand'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6 style="margin: 0"><i class="icon fa"></i> {{Session('delete_brand')}}</h6>
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
          
          <div class="col-lg-12">
            
            
            <div class="card">
              
              <div class="card-header align-middle text-center">
                <h3 class="card-title pull-right">لیست برندها</h3>
                <a href="{{route('brands.create')}}" class="btn btn-app pull-left">
                  <i class="fa fa-plus"></i> جدید
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <tbody><tr>
                    <th style="width: 10px">#</th>
                    <th class="align-middle text-center">نام</th>
                    <th class="align-middle text-center">نام لاتین</th>
                    <th class="align-middle text-center">لوگو</th>
                    <th class="align-middle text-center">عملیات</th>
                  </tr>
                  
{{-- {{dd($brand->logo)}} --}}
                    @foreach($brands as $brand)
                    <tr>
                    <td class="align-middle text-center">{{$brand->id}}</td>
                    <td class="align-middle text-center font-weight-bold">{{$brand->name}}</td>
                    <td class="align-middle text-center font-weight-bold">{{$brand->slug}}</td>
                    <td class="align-middle text-center font-weight-bold">
                    
                    @if(isset($brand->logo['thumb']))  
                      <img src="{{$brand->logo['thumb']}}">
                    @endif  
                    </td>


                    <td class="align-middle text-center">
                      <div class="btn-group">
                        <a href="{{route('brands.edit',$brand->id)}}" class="btn btn-info btn-sm">ویرایش</a>
                      <form class="d-inline" action="{{route('brands.destroy',$brand->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger btn-sm" value="حذف">
                      </form>
                      </div>
                      
                    </td>

                    </tr>

                    @endforeach





                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
          
          <div class="d-flex mx-auto mt-3 mb-3">
          {{$brands->links()}}
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

