@extends('frontend.layout.master')



@section('styles')
    <meta name="csrf-token" content="{{csrf_token()}}">

    <style>
      .mb-0{
        margin-bottom: 2px;
      }
      .mb-4{
        margin-bottom: 7px;
      }
      .d-inline{
        float: right;
      }
      .d-block{
        display: block;
      }
      .font-weight-bold{
        font-weight: bold;
      }
      .ml-4{
        margin-left: 8px;
      }
      .ml-2{
        margin-left: 14px;
      }
      .inline-block{
        display: inline-block;
      }
    </style>
@endsection




@section('content')


<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="category.html">الکترونیکی</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Left Part Start -->
        <aside id="column-left" class="col-sm-3 hidden-xs">
          <h3 class="subtitle">فیلترها</h3>

          <div class="d-block side-item mb-4" id="attr-box">


            @php($i=0)
          @foreach($current_cat->attributeGroups as $attrGp)
          

            {{-- <label>
              <h5 class="mb-0">
                 {{$attrGp->title}} :
              </h5>
            </label>

            <select class="form-control mb-4" onchange="attrFilter(this)">
              <option value="0">انتخاب کنید</option>
              @foreach($attrGp->attributeValues as $attrVal)
              <option value="{{$attrVal->id}}" data-href="{{request()->fullUrlWithQuery([$grName => $attrVal->id])}}">{{$attrVal->title}}</option>
              @endforeach
              
            </select> --}}

            {{-- {{dd($params)}} --}}

            
            <div class="form-group mb-3 inline-block">
              <label class="d-block font-weight-bold ml-4"> {{$attrGp->title}}: </label>
              @foreach($attrGp->attributeValues as $attrVal)
              @php($i++)
          @php($grName = 'attribute'.$i)
              <div class="form-check d-inline">
                {{-- <input type="checkbox" @if(in_array($attrVal->id,request()->query())) checked @endif data-href="{{request()->fullUrlWithQuery([$attrGp->slug => $attrVal->id,'page'=>1])}}" name="attr[]" value="{{$attrVal->id}}" onclick="attrFilter(this,{{$attrVal->id}})" class="form-check-input"> --}}
              
                {{-- {{dd($params[$attrGp->slug])}} --}}
                <input type="checkbox" @if(in_array($attrVal->id,$params['attributes_checked'])) checked @endif data-group="{{$attrGp->slug}}" name="attr[]" value="{{$attrVal->id}}" onclick="attrFilter(this,{{$attrVal->id}})" class="form-check-input">
              
                <label class="form-check-label ml-2">{{$attrVal->title}}</label>
              </div>
              @endforeach
              
            </div>

          @endforeach
            <h5 class="text-left" style="text-align: left">
              <button type="button"  class="btn btn-danger">اعمال</button>
            </h5>
            </div>












          <h3 class="subtitle d-block">دسته ها</h3>
          <div class="box-category">
            <ul id="cat_accordion">
              <li><a href="category.html">مد و زیبایی</a> <span class="down"></span>
                <ul>
                  <li><a href="category.html">آقایان</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">زیردسته ها</a></li>
                      <li><a href="category.html">زیردسته ها</a></li>
                      <li><a href="category.html">زیردسته ها</a></li>
                      <li><a href="category.html">زیردسته ها</a></li>
                      <li><a href="category.html">زیردسته جدید</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">بانوان</a></li>
                  <li><a href="category.html">دخترانه</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">زیردسته ها</a></li>
                      <li><a href="category.html">زیردسته جدید</a></li>
                      <li><a href="category.html">زیردسته جدید</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">پسرانه</a></li>
                  <li><a href="category.html">نوزاد</a></li>
                  <li><a href="category.html">لوازم</a> <span class="down"></span>
                    <ul>
                      <li><a href="category.html">زیردسته های جدید</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              
              
              <li><a href="category.html">زیبایی و سلامت</a> <span class="down"></span>
                <ul>
                  <li><a href="category.html">عطر و ادکلن</a></li>
                  <li><a href="category.html">آرایشی</a></li>
                  <li><a href="category.html">ضد آفتاب</a></li>
                  <li><a href="category.html">مراقبت از پوست</a></li>
                  <li><a href="category.html">مراقبت از چشم</a></li>
                  <li><a href="category.html">مراقبت از مو</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <h3 class="subtitle">پرفروش ها</h3>
          <div class="side-item">
            <div class="product-thumb clearfix">
              {{-- <div class="image"><a href="product.html"><img src="image/product/apple_cinema_30-50x75.jpg" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive" /></a></div> --}}
              <div class="caption">
                <h4><a href="product.html">تی شرت کتان مردانه</a></h4>
                <p class="price"><span class="price-new">110000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-10%</span></p>
              </div>
            </div>
           


          </div>
          <h3 class="subtitle">ویژه</h3>
          <div class="side-item">
            <div class="product-thumb clearfix">
              {{-- <div class="image"><a href="product.html"><img src="image/product/macbook_pro_1-50x75.jpg" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive" /></a></div> --}}
              <div class="caption">
                <h4><a href="product.html">کتاب آموزش باغبانی</a></h4>
                <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> </p>
              </div>
            </div>

          
          </div>
          <div class="banner owl-carousel">
            {{-- <div class="item"> <a href="#"><img src="image/banner/small-banner1-265x350.jpg" alt="small banner" class="img-responsive" /></a> </div> --}}
            {{-- <div class="item"> <a href="#"><img src="image/banner/small-banner-265x350.jpg" alt="small banner1" class="img-responsive" /></a> </div> --}}
          </div>
        </aside>
        <!--Left Part End -->
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <h1 class="title">{{$current_cat->title}}</h1>
          
          <h3 class="subtitle">بهبود جستجو</h3>
          <div class="category-list row">
                        
                
                
                      </div>
          
                     {{--  dd(request()->query('show')) --}}

          <div class="product-filter">
            <div class="row">
              <div class="col-md-2 col-sm-3">
                <div class="btn-group">
                  <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                  <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                </div>
                 </div>
              <div class="col-sm-1 text-right">
                <label class="control-label" for="input-sort">مرتب سازی:</label>
              </div>
              
              <div class="col-md-3 col-sm-3 text-right">
                <select id="input-sort" class="form-control col-sm-11" onchange="sortby(this)">
                  <option data-href="{{route('cat.show',$current_cat->slug)}}">پیشفرض</option>
                  <option value="newest" @if($params['sortby'] == 'newest') selected @endif>جدیدترین</option>
                  <option value="price-low-to-high" @if($params['sortby'] == 'price-low-to-high') selected @endif>قیمت (کم به زیاد)</option>
                  <option value="price-high-to-low" @if($params['sortby'] == 'price-high-to-low') selected @endif >قیمت (زیاد به کم)</option>
                </select>
              </div>
              <div class="col-sm-1 text-right">
                <label class="control-label" for="input-limit">نمایش:</label>
              </div>
              
              <div class="col-sm-2 text-right">
                <select id="input-limit" class="form-control" onchange="showMax(this)">
                  <option value="16" @if($params['show'] == 16) selected @endif>16</option>
                  <option value="2" @if($params['show'] == 2) selected @endif>2</option>
                  <option value="3" @if($params['show'] == 3) selected @endif>3</option>
                  <option value="24" @if($params['show'] == 24) selected @endif>24</option>

                  {{-- <option value="2" @if(request()->query('show') == 2) selected @endif data-href="{{ request()->fullUrlWithQuery(['show' => 2, 'page'=>1]) }}">2</option>
                  <option value="3" @if(request()->query('show') == 3) selected @endif data-href="{{ request()->fullUrlWithQuery(['show' => 3, 'page'=>1]) }}">3</option>
                  <option value="24" @if(request()->query('show') == 24) selected @endif data-href="{{ request()->fullUrlWithQuery(['show' => 24, 'page'=>1]) }}">24</option> --}}

                </select>
              </div>
            </div>
          </div>
          <br />
          <div class="row products-category">

            @foreach($products as $product)

            <div class="product-layout product-list col-xs-12">
                <div class="product-thumb">
                  <div class="image"><a href="{{$product->path()}}"><img width="220px" src="/images/products/{{$product->photos[0]->path}}" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive" /></a></div>
                  <div>
                    <div class="caption">
                      <h4><a href="{{$product->path()}}">{{$product->title}}</a></h4>
                      <p class="description"></p>
                      @if($product->discount > 0)
                      <p class="price"><span class="price-new">{{$product->price - $product->discount}} تومان</span> <span class="price-old">{{$product->price}} تومان</span> <span class="saving">{{floor(($product->discount)/$product->price * 100)}}%</span></p>     
                      @else
                      <p class="price"><span class="price-new">{{$product->price}} تومان</span> </p>     

                      @endif
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i> <span>افزودن به علاقه مندی ها</span></button>
                        <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i> <span>مقایسه این محصول</span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            @endforeach
          </div>


          <div class="row">
            <div class="col-sm-6 text-left">
              <ul class="pagination">
                {{$products->appends(request()->query())->links()}}

              </ul>
            </div>
            <div class="col-sm-12 text-right">
              

              نمایش {{$products->firstItem()}} تا {{$products->lastItem()}} از {{count($products)}} (مجموع {{$products->lastPage()}} صفحه)
              
            </div>
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>


  {{-- {{dd(request()->query())}} --}}

@endsection

@section('scripts')
<script src="{{asset('js/app.js')}}"></script>



<script>

  var queries = {@foreach($params['attributes_array'] as $key=>$row) '{{$key}}':[{{$row}}], @endforeach};
  console.log(queries);
  var sortBy = "{{$params['sortby']}}";
  var showPerPage = "{{$params['show']}}";
  var currentpage = "{{$params['page']}}";
  var current_url = "{{request()->url()}}";
  var q = '';

</script>  

 <script src="{{asset('js/cat-filter.js')}}"></script> 



@endsection

