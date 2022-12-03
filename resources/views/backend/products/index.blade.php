@extends('backend.layout.master')

@section('meta')
<title>مدیریت فروشگاه | 
   محصولات
</title>
@endsection


@section('content')

 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مدیریت محصولات</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">خانه</a></li>
              <li class="breadcrumb-item active">محصولات</li>
            </ol>
          </div><!-- /.col -->
          
          <div class="col-12 mt-4">
            @if(Session::has('add_product'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6 style="margin: 0"><i class="icon fa"></i> {{Session('add_product')}}</h6>
            </div>   
            @endif

            @if(Session::has('edit_product'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6 style="margin: 0"><i class="icon fa"></i> {{Session('edit_product')}}</h6>
            </div>   
            @endif

            @if(Session::has('delete_product'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h6 style="margin: 0"><i class="icon fa"></i> {{Session('delete_product')}}</h6>
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
            
            <div class="card p-2">
              
              <div class="card-header align-middle text-center">
                <h3 class="card-title pull-right">لیست محصولات</h3>
                <a href="{{route('products.create')}}" class="btn btn-app pull-left">
                  <i class="fa fa-plus"></i> جدید
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                    <th class="align-middle text-center">کدکالا</th>
                    <th class="align-middle text-center">نام</th>
                    <th class="align-middle text-center">تصویر</th>
                    <th class="align-middle text-center">دسته بندی</th>
                    <th class="align-middle text-center">ویژگی ها</th>
                    <th class="align-middle text-center">آدرس سئو</th>
                    <th class="align-middle text-center" style="width: 150px">عملیات</th>

                  </tr>
                  

                    @foreach($products as $product)
                    <tr class="">
                    <td class="align-middle text-center">{{$product->sku}}</td>
                    <td class="align-middle text-center font-weight-bold"><a href="{{route('products.edit',$product->id)}}">{{$product->title}}</a></td>
                    <td class="align-middle text-center">
                      {{-- @foreach($product->photos as $photo) --}}
                        <img src="/images/products/{{$product->photos[0]->path}}" width="150px" class="d-inline">
                      {{-- @endforeach --}}
                    </td>
                    <td class="align-middle text-center">{{$product->category->title}}</td>
                    <td class="align-middle text-center" style="width: 200px">   
                      <ul class="list-group ul-attr-index">
                          @foreach($product->AttributeValues as $att_val)
                          <li class="list-group-item">
                            {{$att_val->attr_groups->title}}
                            :
                            {{$att_val->title}}
                          </li>

                          @endforeach
                        </ul>
                    </td>



                    <td class="align-middle text-center">{{$product->slug}}</td>



                    <td class="align-middle text-center">
                      <a href="{{route('products.edit',$product->id)}}" class="btn btn-warning btn-sm">ویرایش</a>
                     
                      <form class="d-inline" action="{{route('products.destroy',$product->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger btn-sm" value="حذف">
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

















@endsection

