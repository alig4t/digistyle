@extends('backend.layout.master')

@section('meta')
<title>مدیریت فروشگاه | 
  رنگ ها
</title>
@endsection

@section('styles')
<style>
  .colorhex{
    display:block; 
    width: 40px;
    height:20px;
    margin: auto;
    border: 1px solid #ddd;
  }
  </style>
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
              <li class="breadcrumb-item active">رنگ ها</li>
            </ol>
          </div><!-- /.col -->
          
          <div class="col-12 mt-4">
            @if(Session::has('new_color'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6 style="margin: 0"><i class="icon fa"></i> {{Session('new_color')}}</h6>
            </div>   
            @endif

            @if(Session::has('edit_color'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6 style="margin: 0"><i class="icon fa"></i> {{Session('edit_color')}}</h6>
            </div>   
            @endif

            @if(Session::has('delete_color'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6 style="margin: 0"><i class="icon fa"></i> {{Session('delete_color')}}</h6>
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
                <h3 class="card-title pull-right">لیست رنگ ها</h3>
                <a href="{{route('colors.create')}}" class="btn btn-app pull-left">
                  <i class="fa fa-plus"></i> جدید
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <tbody><tr>
                    <th style="width: 10px">#</th>
                    <th class="align-middle text-center">عنوان</th>
                    <th class="align-middle text-center">رنگ</th>
                    <th class="align-middle text-center">عملیات</th>
                  </tr>
                  
{{-- {{dd($brand->logo)}} --}}
                    @foreach($colors as $color)
                    <tr>
                    <td class="align-middle text-center">{{$color->id}}</td>
                    <td class="align-middle text-center font-weight-bold">{{$color->color}}</td>
                    <td class="align-middle text-center">
                      <span class="colorhex" style="background-color:{{$color->hex}}"></span>
                      
                    </td>
                    

                    <td class="align-middle text-center">
                      <div class="btn-group">
                        <a href="{{route('colors.edit',$color->id)}}" class="btn btn-info btn-sm">ویرایش</a>
                      <form class="d-inline" action="{{route('colors.destroy',$color->id)}}" method="post">
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
          {{-- {{$sizes->links()}} --}}
          </div>

        </div>
        <!-- /.row -->
        <!-- Main row -->
       
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>





@endsection

