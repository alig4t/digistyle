@extends('backend.layout.master')

@section('meta')
<title>مدیریت فروشگاه | 
   ویژگی ها
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
              <li class="breadcrumb-item active">گروه بندی ویژگی ها</li>
            </ol>
          </div><!-- /.col -->
          
          <div class="col-12 mt-4">
            @if(Session::has('new_attr_group'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6 style="margin: 0"><i class="icon fa"></i> {{Session('new_attr_group')}}</h6>
            </div>   
            @endif

            <div class="col-12 mt-4">
              @if(Session::has('new_attr_values'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h6 style="margin: 0"><i class="icon fa"></i> {{Session('new_attr_values')}}</h6>
              </div>   
              @endif

            @if(Session::has('edit_attr_group'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6 style="margin: 0"><i class="icon fa"></i> {{Session('edit_attr_group')}}</h6>
            </div>   
            @endif

        
        

            @if(Session::has('delete_attr_group'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6 style="margin: 0"><i class="icon fa"></i> {{Session('delete_attr_group')}}</h6>
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
                <h3 class="card-title pull-right">لیست گروه بندی ویژگی ها</h3>
                <a href="{{route('attribute-groups.create')}}" class="btn btn-app pull-left">
                  <i class="fa fa-plus"></i> جدید
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <tbody><tr>
                    <th style="width: 10px">#</th>
                    <th class="align-middle text-center">نام</th>
                    <th class="align-middle text-center">نوع</th>
                    <th class="align-middle text-center">مقادیر ویژگی</th>

                    <th class="align-middle text-center">عملیات</th>
                  </tr>
                  

                    @foreach($attr_groups as $attr_gp)
                    <tr>
                    <td class="align-middle text-center">{{$attr_gp->id}}</td>
                    <td class="align-middle text-center font-weight-bold">{{$attr_gp->title}}</td>
                    <td class="align-middle text-center">
                      @if($attr_gp->type == 'single') انتخابی (تک انتخابی)  @endif
                      @if($attr_gp->type == 'multiple') انتخابی (چندانتخابی) @endif
                      @if($attr_gp->type == 'text') متنی @endif
                       
                    </td>

                    <td class="align-middle text-center">
                      <ul class="list-group ul-attr-index">
                        @foreach($attr_gp->attributeValues as $attr_val)
                          <li class="list-group-item">{{$attr_val->title}}</li>
                        @endforeach
                      </ul>
                    </td>

                    <td class="align-middle text-center">

                      <a href="{{route('addAttrVal.create',$attr_gp->id)}}" class="btn btn-info btn-sm">افزودن مقادیر</a>


                      <a href="{{route('attribute-groups.edit',$attr_gp->id)}}" class="btn btn-warning btn-sm">ویرایش</a>
                      <form class="d-inline" action="{{route('attribute-groups.destroy',$attr_gp->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-warning btn-sm" value="حذف">
                      </form>
                    </td>

                    </tr>

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

