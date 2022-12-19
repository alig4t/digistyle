@extends('frontend.layout.master')


@section('styles')

<link rel="stylesheet" type="text/css" href="/front/js/swipebox/src/css/swipebox.min.css">
@endsection



@section('content')

<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{url('/')}}" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a></li>
        
        @foreach($breadcrumbCats as $breadCat)

        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{route('cat.show',$breadCat->slug)}}" itemprop="url"><span itemprop="title">{{$breadCat->title}}</span></a></li>
       
        @endforeach


      
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <div itemscope itemtype="http://schema.org/محصولات">
            <h1 class="title" itemprop="name">{{$product->title}}</h1>
            <div class="row product-info">
              <div class="col-sm-6">
                <div class="image">
                  <img class="img-responsive" itemprop="image" id="zoom_01" src="/images/products/{{$product->photos[0]->path}}" title="{{$product->title}}" alt="{{$product->title}}" data-zoom-image="/images/products/{{$product->photos[0]->path}}" />
                </div>
                <div class="center-block text-center"><span class="zoom-gallery"><i class="fa fa-search"></i> برای مشاهده گالری روی تصویر کلیک کنید</span>
                </div>


                <div class="image-additional" id="gallery_01">
                  @foreach($product->photos as $photo)
                    <a class="thumbnail" href="#" data-zoom-image="/images/products/{{$photo->path}}" data-image="/images/products/{{$photo->path}}" title="لپ تاپ ایلین ور"> <img src="/images/products/{{$photo->path}}" title="{{$product->title}}" />
                    </a> 
                  @endforeach
                </div>
              </div>


              <div class="col-sm-6">
                <ul class="list-unstyled description">
                  @if($product->brand)
                  <li><b>برند :</b> <a href="{{route('brand.show',$product->brand->slug)}}"><span itemprop="brand">{{$product->brand->name}}</span></a></li>
                  @else
                  <li><b>برند :</b> <span itemprop="brand">ندارد</span></li>
                  @endif
                  <li><b>کد محصول :</b> <span itemprop="mpn">{{$product->sku}}</span></li>
                  <li><b>امتیازات خرید:</b> 700</li>
                  <li><b>وضعیت موجودی :</b> <span class="instock">موجود</span></li>
                </ul>
                <ul class="price-box">
                  @if ($product->discount)
                  <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><span class="price-old">{{$product->price}} تومان</span> <span itemprop="price">{{$product->price - $product->discount}} تومان<span itemprop="availability" content="موجود"></span></span></li>

                  @else
                  <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"> <span itemprop="price">{{$product->price}}  تومان<span itemprop="availability" content="موجود"></span></span></li>
                  @endif
                 
                  {{-- <li></li> --}}

                </ul>
                <div id="product">
                  <h3 class="subtitle">انتخاب های در دسترس</h3>
                  <div class="form-group required">
                    <label class="control-label">رنگ</label>
                    <select class="form-control" id="input-option200" name="option[200]">
                      <option value=""> --- لطفا انتخاب کنید --- </option>
                      <option value="4">مشکی </option>
                      <option value="3">نقره ای </option>
                      <option value="1">سبز </option>
                      <option value="2">آبی </option>
                    </select>
                  </div>
                  <div class="cart">
                    <div>
                      <div class="qty">
                        <label class="control-label" for="input-quantity">تعداد</label>
                        <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
                        <a class="qtyBtn plus" href="javascript:void(0);">+</a><br />
                        <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                        <div class="clear"></div>
                      </div>
                      <button type="button" id="button-cart" class="btn btn-primary btn-lg">افزودن به سبد</button>
                    </div>
                    <div>
                      <button type="button" class="wishlist" onClick=""><i class="fa fa-heart"></i> افزودن به علاقه مندی ها</button>
                      <br />
                      <button type="button" class="wishlist" onClick=""><i class="fa fa-exchange"></i> مقایسه این محصول</button>
                    </div>
                  </div>
                </div>
                <div class="rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                  <meta itemprop="ratingValue" content="0" />
                  <p><span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <a onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href=""><span itemprop="reviewCount">1 بررسی</span></a> / <a onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href="">یک بررسی بنویسید</a></p>
                </div>
                <hr>
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style"> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal" pi:pinit:url="http://www.addthis.com/features/pinterest" pi:pinit:media="http://www.addthis.com/cms-content/images/features/pinterest-lg.png"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-514863386b357649"></script>
                <!-- AddThis Button END -->
              </div>
            </div>
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab-description" data-toggle="tab">توضیحات</a></li>
              <li><a href="#tab-specification" data-toggle="tab">مشخصات</a></li>
              <li><a href="#tab-review" data-toggle="tab">بررسی (2)</a></li>
            </ul>
            <div class="tab-content">
              <div itemprop="description" id="tab-description" class="tab-pane active">
                <div>
                  <p><b>پردازشگر اینتل core i7</b></p>
                  <p>مک بوک جدید با پردازشگر اینتل core i7 از همیشه سریعتر ظاهر شده و آماده است که گوی سبقت را از رقبا بگیرد.</p>
                  <p><b>16 گیگابایت رم و هارد دیسک های بزرگتر</b></p>
                  <p>ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                  <p><b>طراحی خارق العاده و بی نظیر</b></p>
                  <p>مک بوک در واقع ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                  <p><b>با دوربین i-Sight درون ساخت</b></p>
                  <p>بدون نیاز به ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                </div>
              </div>
              <div id="tab-specification" class="tab-pane">
                <div id="tab-specification" class="tab-pane">






                  <table class="table table-bordered">
                    @foreach($array_gp as $key=>$val)
                    
                    <tbody>
                      <tr>
                        <td>{{$key}}</td>
                        <td>@php($val = implode(" - ",$val))
                          {{$val}}</td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>

                
                <table class="table table-bordered">
                <thead>
                    <tr>
                      <td colspan="2"><strong>پردازشگر</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>تعداد هسته</td>
                      <td>1</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </div>
              <div id="tab-review" class="tab-pane">
                <form class="form-horizontal">
                  <div id="review">
                    <div>
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr>
                            <td style="width: 50%;"><strong><span>هاروی</span></strong></td>
                            <td class="text-right"><span>1395/1/20</span></td>
                          </tr>
                          <tr>
                            <td colspan="2"><p>ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                              <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div></td>
                          </tr>
                        </tbody>
                      </table>
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr>
                            <td style="width: 50%;"><strong><span>اندرسون</span></strong></td>
                            <td class="text-right"><span>1395/1/20</span></td>
                          </tr>
                          <tr>
                            <td colspan="2"><p>ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                              <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="text-right"></div>
                  </div>
                  <h2>یک بررسی بنویسید</h2>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label for="input-name" class="control-label">نام شما</label>
                      <input type="text" class="form-control" id="input-name" value="" name="name">
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label for="input-review" class="control-label">بررسی شما</label>
                      <textarea class="form-control" id="input-review" rows="5" name="text"></textarea>
                      <div class="help-block"><span class="text-danger">توجه :</span> HTML بازگردانی نخواهد شد!</div>
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-12">
                      <label class="control-label">رتبه</label>
                      &nbsp;&nbsp;&nbsp; بد&nbsp;
                      <input type="radio" value="1" name="rating">
                      &nbsp;
                      <input type="radio" value="2" name="rating">
                      &nbsp;
                      <input type="radio" value="3" name="rating">
                      &nbsp;
                      <input type="radio" value="4" name="rating">
                      &nbsp;
                      <input type="radio" value="5" name="rating">
                      &nbsp;خوب</div>
                  </div>
                  <div class="buttons">
                    <div class="pull-right">
                      <button class="btn btn-primary" id="button-review" type="button">ادامه</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <h3 class="subtitle">محصولات مرتبط</h3>
            <div class="owl-carousel related_pro">

              @foreach($related as $relproduct)
              <div class="product-thumb clearfix">
                <div class="image"><a href="{{route('product.show',$relproduct->slug)}}"><img src="/images/products/{{$relproduct->photos[0]->path}}" alt="{{$relproduct->title}}" title="{{$relproduct->title}}" class="img-responsive" /></a></div>
                <div class="caption">
                  <h4><a href="product.html">{{$relproduct->title}}</a></h4>
                 
                 
                  @if($relproduct->discount > 0)
                  <p class="price"><span class="price-new">{{$relproduct->price - $relproduct->discount }} تومان</span>
                     <span class="price-old">{{$relproduct->price}} تومان</span><span class="saving">{{floor(($relproduct->discount)/$relproduct->price * 100)}} %</span></p>
                  @else 
                  <p class="price"> {{$relproduct->price}} تومان </p>
                  @endif
                </div>
                <div class="button-group">
                  <button class="btn-primary" type="button" onClick="addtoCart({{$relproduct->id}})"><span>افزودن به سبد</span></button>
                  <div class="add-to-links">
                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
                    <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div>

              @endforeach

              
            </div>
          </div>
        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->


        <aside id="column-right" class="col-sm-3 hidden-xs">
          <h3 class="subtitle">پرفروش ها</h3>
          <div class="side-item">
            @forEach($related as $relproduct)
            <div class="product-thumb clearfix">
              <div class="image"><a href="{{route('product.show',$relproduct->slug)}}"><img src="/images/products/{{$relproduct->photos[0]->path}}" alt="{{$relproduct->title}}" title="{{$relproduct->title}}" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="{{route('product.show',$relproduct->slug)}}">{{$relproduct->title}}</a></h4>
                @if($relproduct->discount > 0)
                  <p class="price"><span class="price-new">{{$relproduct->price - $relproduct->discount }} تومان</span>
                     <span class="price-old">{{$relproduct->price}} تومان</span><span class="saving">{{floor(($relproduct->discount)/$relproduct->price * 100)}} %</span></p>
                  @else 
                  <p class="price"> {{$relproduct->price}} تومان </p>
                  @endif
              </div>
            </div>
            @endforeach

          </div>
          <div class="list-group">
            <h3 class="subtitle">محتوای سفارشی</h3>
            <p>این یک بلاک محتواست. هر نوع محتوایی شامل html، نوشته یا تصویر را میتوانید در آن قرار دهید. </p>
            <p> در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. </p>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
          </div>
          <h3 class="subtitle">ویژه</h3>
          <div class="side-item">

            @forEach($related as $relproduct)
            <div class="product-thumb clearfix">
              <div class="image"><a href="{{route('product.show',$relproduct->slug)}}"><img src="/images/products/{{$relproduct->photos[0]->path}}" alt="{{$relproduct->title}}" title="{{$relproduct->title}}" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="{{route('product.show',$relproduct->slug)}}">{{$relproduct->title}}</a></h4>
                @if($relproduct->discount > 0)
                  <p class="price"><span class="price-new">{{$relproduct->price - $relproduct->discount }} تومان</span>
                     <span class="price-old">{{$relproduct->price}} تومان</span><span class="saving">{{floor(($relproduct->discount)/$relproduct->price * 100)}} %</span></p>
                  @else 
                  <p class="price"> {{$relproduct->price}} تومان </p>
                  @endif
              </div>
            </div>
            @endforeach


          </div>
        </aside>
        <!--Right Part End -->
      </div>
    </div>
  </div>
@endsection







@section('scripts')

<script type="text/javascript" src="/front/js/jquery.elevateZoom-3.0.8.min.js"></script>
<script type="text/javascript" src="/front/js/swipebox/lib/ios-orientationchange-fix.js"></script>
<script type="text/javascript" src="/front/js/swipebox/src/js/jquery.swipebox.min.js"></script>

<script>
// Elevate Zoom for Product Page image
$("#zoom_01").elevateZoom({
	gallery:'gallery_01',
	cursor: 'pointer',
	galleryActiveClass: 'active',
	imageCrossfade: true,
	zoomWindowFadeIn: 500,
	zoomWindowFadeOut: 500,
	zoomWindowPosition : 11,
	lensFadeIn: 500,
	lensFadeOut: 500,
	loadingIcon: '/front/image/progress.gif'
	}); 
//////pass the images to swipebox
$("#zoom_01").bind("click", function(e) {
  var ez =   $('#zoom_01').data('elevateZoom');
	$.swipebox(ez.getGalleryList());
  return false;
});
</script>

@endsection


