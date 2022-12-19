@extends('backend.layout.master')

@section('meta')
<title>مدیریت فروشگاه | 
افزودن موجودی
{{$product->title}}
</title>
@endsection

@section('styles')
<style>
    .colorhex {
    display: block;
    width: 100px;
    height: 10px;
    margin: auto;
    border: 1px solid #ddd;
        color:#fff;
}
    </style>
@endsection


@section('content')

 <div class="content-header">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-2 mt-2">
                @if(Session::has('add_stock'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h6 style="margin: 0"><i class="icon fa"></i> {{Session('add_stock')}}</h6>
                </div>   
                @endif
            </div>
        </div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">مدیریت انبار</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">خانه</a></li>
              <li class="breadcrumb-item active"><a href="{{route('products.index')}}">محصولات</a></li>
              <li class="breadcrumb-item active">موجودی محصول {{$product->title}}</li>

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
                     افزودن موجودی محصول
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="POST" action="{{route('stock.store')}}">
                    
                    <div class="card-body" id="card-box">
                        @csrf
                      <div class="form-group">
                          
                        
                      <label>محصول</label>
                        <input disabled type="text" value="{{$product->title}}" class="form-control" placeholder="وارد کردن مقدار ...">
                      </div>


                      <input type="hidden" name="product_id" value="{{$product->id}}">
                       

                      <div class="row">
                    <div class="col-sm-4">
                      
                        <div class="form-group">
                            <label>انتخاب سایز</label>
                            <select class="form-control" name="size_id">
                                <option value="null">یک سایز انتخاب نمایید</option>
                                
                                @foreach(\App\Size::all() as $size)
                                <option value="{{$size->id}}">{{$size->size}}</option>
                                @endforeach
                            </select>
                           </div>
                    
                    </div>
                       
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>انتخاب رنگ</label>
                            <select class="form-control" name="color_id">
                                <option value="null">یک رنگ انتخاب نمایید</option>
                                
                                @foreach(\App\Color::all() as $color)
                                <option value="{{$color->id}}">{{$color->color}}</option>
                                @endforeach
                            </select>
                           </div>
                    </div>

                    
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>تعداد</label>
                           <input type="number" name="count" min="0" class="form-control" placeholder="تعداد را به عدد وارد نمایید..">
                           </div>
                    </div>
                      </div>
                       


                       

                       {{-- <div class="form-group">
                        <label> وارد کردن مقدار ویژگی 2 (اختیاری)</label>
                       <input type="text" name="title[]" class="form-control" placeholder="وارد کردن مقدار ...">
                       </div>
            
                       
                       <div class="form-group">
                        <label> وارد کردن مقدار ویژگی 3 (اختیاری)</label>
                       <input type="text" name="title[]" class="form-control" placeholder="وارد کردن مقدار ...">
                       </div>      --}}
                            
                    </div>
                    <div class="card-body">
                        <button type="button" onclick="insertInput()" id="add-button" class="btn btn-info btn-flat">اضافه کردن مقادیر بیشتر</button>
                    </div>
                    <div class="card-footer mt-2">
                      <button type="submit" class="btn btn-primary pull-left">افزودن موجودی</button>
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





        <div class="row">
        
            <div class="col-12 mb-2 mt-2">
                @if(Session::has('update_stock'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h6 style="margin: 0"><i class="icon fa"></i> {{Session('update_stock')}}</h6>
                </div>   
                @endif
            </div>
       




            <div class="col-lg-12">
              
              <div class="card p-2">
                
                <div class="card-header align-middle text-center">
                  <h3 class="card-title pull-right">
                    موجودی محصول
                  {{$product->title}}
                 </h3>
                 <span class="pull-left">
                    تعداد کل : {{$totalCount}} عدد
                 </span>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-bordered">
                    <tbody>
                        {{-- <tr>
                      <td class="align-middle text-center">{{$product->sku}}</td>
                            <td>
                                <img src="/images/products/{{$product->photos[0]->path}}" width="150px" class="d-inline">
                            </td>

                        </tr> --}}
                      <tr>
                        <th class="align-middle text-center">کدکالا:{{$product->sku}}</th>
                      <th class="align-middle text-center">رنگ</th>
                      <th class="align-middle text-center">سایز</th>
                      <th class="align-middle text-center">تعداد</th>
                      <th class="align-middle text-center"> عملیات</th>

                    </tr>
                    <td rowspan="14" class="align-middle text-center">
                        <img src="/images/products/{{$product->photos[0]->path}}" width="150px" class="d-inline">

                    </td>
  
                      @foreach($product->stocks as $stock)
                      <tr class="">
                        

                      <td class="align-middle text-center font-weight-bold">
                        {{$stock->color->color}}
                        <span class="colorhex" style="background-color:{{$stock->color->hex}}">
                            {{-- {{$stock->color->color}} --}}
                        </span>
                    </td>
                    <td class="align-middle text-center font-weight-bold">
                        {{$stock->size->size}}
                    </td>
                    <td class="align-middle text-center font-weight-bold">
                        {{$stock->count}}
                        عدد
                    </td>
                      

                      <td class="align-middle text-center">

                            <form class="form-inline justify-content-center" action="{{route('stock.update',$stock->id)}}" method="post">
                              @csrf
                              <input type="hidden" name="_method" value="PATCH">
                              <input type="hidden" name="stock_id" value="{{$stock->id}}">

                              <div class="form-group mb-2">
                                  <input type="number" name="count" min="0" value="{{$stock->count}}" class="form-control ml-2" placeholder="تعداد را به عدد وارد نمایید..">
                                  <input type="submit" class="btn btn-info btn-sm" value="ثبت موجودی">
                              </div>
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
            
          </div>
          


        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>














@endsection

@section('scripts')

<script>
    var inputIndex = 1;
    var cardbox = document.getElementById('card-box');

    function  insertInput(){
       inputIndex += 1;
       let divtag = document.createElement('div');
       divtag.className = 'form-group';
        
       let newLabel = document.createElement('label');
       newLabel.textContent = 'وارد کردن مقدار ویژگی ' + inputIndex +' (اختیاری) '
       divtag.prepend(newLabel);

       let forminput = document.createElement('input');
       forminput.setAttribute('type','text');
       forminput.setAttribute('name','title[]');
       forminput.setAttribute('placeholder','وارد کردن مقدار ...');
       forminput.className = 'form-control';
        divtag.append(forminput);

        
        cardbox.append(divtag)


    }


</script>

@endsection
