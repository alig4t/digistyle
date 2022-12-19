<!DOCTYPE html>
<html dir="rtl">
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="/front/image/favicon.png" rel="icon" />
<title>مارکت شاپ - قالب HTML فروشگاهی</title>
<meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="/front/js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/front/js/bootstrap/css/bootstrap-rtl.min.css" />
<link rel="stylesheet" type="text/css" href="/front/css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="/front/css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="/front/css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="/front/css/owl.transitions.css" />
<link rel="stylesheet" type="text/css" href="/front/css/responsive.css" />
<link rel="stylesheet" type="text/css" href="/front/css/stylesheet-rtl.css" />
<link rel="stylesheet" type="text/css" href="/front/css/responsive-rtl.css" />
<link rel="stylesheet" type="text/css" href="/front/css/stylesheet-skin2.css" />
<style>
  .font9{
    font-size: 12px;
  }
  </style>
@yield('styles')
<!-- CSS Part End-->
</head>
<body>
  {{-- {{dd(5 - null)}} --}}
<div class="wrapper-wide">
  <div id="header">
    <!-- Top Bar Start-->
    <nav id="top" class="htop">
      <div class="container">
        <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
          <div class="pull-left flip left-top">
            <div class="links">
              <ul>
                <li class="mobile"><i class="fa fa-phone"></i>+21 9898777656</li>
                <li class="email"><a href="mailto:info@marketshop.com"><i class="fa fa-envelope"></i>info@marketshop.com</a></li>
                <li class="wrap_custom_block hidden-sm hidden-xs"><a>بلاک سفارشی<b></b></a>
                  <div class="dropdown-menu custom_block">
                    <ul>
                      <li>
                        <table>
                          <tbody>
                            <tr>
                              <td><img alt="" src="/front/image/banner/cms-block.jpg"></td>
                              <td><img alt="" src="/front/image/banner/responsive.jpg"></td>
                            </tr>
                            <tr>
                              <td><h4>بلاک های محتوا</h4></td>
                              <td><h4>قالب واکنش گرا</h4></td>
                            </tr>
                            <tr>
                              <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                              <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                            </tr>
                            <tr>
                              <td><strong><a class="btn btn-default btn-sm" href="#">ادامه مطلب</a></strong></td>
                              <td><strong><a class="btn btn-default btn-sm" href="#">ادامه مطلب</a></strong></td>
                            </tr>
                          </tbody>
                        </table>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
            <div id="language" class="btn-group">
              <button class="btn-link dropdown-toggle" data-toggle="dropdown"> <span> <img src="/front/image/flags/gb.png" alt="انگلیسی" title="انگلیسی">انگلیسی <i class="fa fa-caret-down"></i></span></button>
              <ul class="dropdown-menu">
                <li>
                  <button class="btn btn-link btn-block language-select" type="button" name="GB"><img src="/front/image/flags/gb.png" alt="انگلیسی" title="انگلیسی" /> انگلیسی</button>
                </li>
                <li>
                  <button class="btn btn-link btn-block language-select" type="button" name="GB"><img src="/front/image/flags/ar.png" alt="عربی" title="عربی" /> عربی</button>
                </li>
              </ul>
            </div>
            <div id="currency" class="btn-group">
              <button class="btn-link dropdown-toggle" data-toggle="dropdown"> <span> تومان <i class="fa fa-caret-down"></i></span></button>
              <ul class="dropdown-menu">
                <li>
                  <button class="currency-select btn btn-link btn-block" type="button" name="EUR">€ Euro</button>
                </li>
                <li>
                  <button class="currency-select btn btn-link btn-block" type="button" name="GBP">£ Pound Sterling</button>
                </li>
                <li>
                  <button class="currency-select btn btn-link btn-block" type="button" name="USD">$ USD</button>
                </li>
              </ul>
            </div>
          </div>
          <div id="top-links" style="margin-left: 60px" class="nav pull-right flip">
   

            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">ورود</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">ثبت نام</a>
                </li>
            @endif
            @else

            <div id="language" class="btn-group">
              <button class="btn-link dropdown-toggle" data-toggle="dropdown"> 
                <span> 
                   {{ Auth::user()->name }} 
                  <i class="fa fa-caret-down"></i>
                </span>
              </button>
              <ul class="dropdown-menu">
                <li>
                  <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="btn btn-link btn-block language-select" type="submit">خروج</button>
                  </form>

                </li>
               
              </ul>
            </div>

            @endguest




          </div>
        </div>
      </div>
    </nav>
    <!-- Top Bar End-->
    <!-- Header Start-->
    <header class="header-row">
      <div class="container">
        <div class="table-container">
          <!-- Logo Start -->
          <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
            <div id="logo"><a href="{{url('/')}}"><img class="img-responsive" src="/front/image/logo.png" title="MarketShop" alt="MarketShop" /></a></div>
          </div>
          <!-- Logo End -->
          <!-- Mini Cart Start-->
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div id="cart">
              <button type="button" data-toggle="dropdown" data-loading-text="بارگذاری ..." class="heading dropdown-toggle">
              <span class="cart-icon pull-left flip"></span>
              <span id="cart-total">
                @if(Session::has('cart')) 
                  {{Session('cart')->totalQty}}
                  آیتم
                  {{Session('cart')->finalPrice}}
                   تومان
                @endif
                {{-- {{dd(Session('cart')->items)}} --}}
              </span></button>


              <ul class="dropdown-menu">
                <li>
                  <table class="table" id="basket-tbl">
                    <tbody>

                      @if(Session::has('cart'))
                     
                      @foreach(Session::get('cart')->items as $row)
                      <tr>
                        
                        <td class="text-center"><a href="product.html"><img class="img-thumbnail" width="85px" src="/images/products/{{$row['item']->photos[0]->path}}"></a></td>
                        <td class="text-left"><a href="product.html">{{$row['item']['title']}}</a></td>
                        <td class="text-right">x {{$row['qty']}}</td>
                        <td class="text-right">{{$row['price'] - $row['discount']}} تومان</td>
                        <td class="text-center"><a href="/remove-cart/{{$row['item']['id']}}" class="btn btn-danger btn-xs remove" title="حذف" type="button"><i class="fa fa-times"></i></a></button></td>
                      </tr>
                      @endforeach
                      
                     @endif

                    </tbody>
                  </table>
                </li>
                <li>
                  <div>
                    <table class="table table-bordered">
                      <tbody>

                        <tr>
                          <td class="text-right"><strong>جمع کل</strong></td>
                          <td class="text-right" id="totalprice">@if(Session::has('cart')) {{Session('cart')->totalPrice}} تومان @endif </td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>تخفیف</strong></td>
                          <td class="text-right" id="totaldiscount">@if(Session::has('cart')) {{Session::get('cart')->totalDiscount}} تومان @endif</td>
                        </tr>    
                        <tr>
                          <td class="text-right"><strong>قابل پرداخت</strong></td>
                          <td class="text-right" id="finalprice">@if(Session::has('cart')) {{Session('cart')->finalPrice}} تومان @endif</td>
                        </tr>
                     
                        
                      </tbody>
                    </table>
                    @if(Session::has('cart'))
                    <p class="checkout"><a href="{{route('cart.index')}}" class="btn btn-primary">
                      <i class="fa fa-shopping-cart"></i>
                       مشاهده سبد
                      </a>&nbsp;&nbsp;&nbsp;
                     </p>
                    @endif
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- Mini Cart End-->
          <!-- جستجو Start-->
          <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
            <div id="search" class="input-group">
              <input id="filter_name" type="text" name="search" value="" placeholder="جستجو" class="form-control input-lg" />
              <button type="button" class="button-search"><i class="fa fa-search"></i></button>
            </div>
          </div>
          <!-- جستجو End-->
        </div>
      </div>
    </header>
    <!-- Header End-->
    <!-- Main آقایانu Start-->
    
      <nav id="menu" class="navbar">
        <div class="navbar-header"> <span class="visible-xs visible-sm"> منو <b></b></span></div>
        <div class="container">
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a class="home_link" title="خانه" href="{{url('/')}}">خانه</a></li>
            @foreach(\App\Category::where('parent_id',0)->get() as $cat)


              <li class="dropdown"><a href="{{route('cat.show',$cat->slug)}}">{{$cat->title}}</a>

                @if(count($cat->childrenRecursive))
                <div class="dropdown-menu">
                  <ul>  
                    @foreach($cat->childrenRecursive as $childCat)
                         <li><a href="{{route('cat.show',$childCat->slug)}}">{{$childCat->title}} <span>&rsaquo;</span></a>
                          @if(count($childCat->childrenRecursive))
                          <div class="dropdown-menu">
                            <ul>
                            @foreach($childCat->childrenRecursive as $childCat2)
                            <li><a href="{{route('cat.show',$childCat2->slug)}}">{{$childCat2->title}} </a> 
                                @if(count($childCat2->childrenRecursive)>0)
                                <div class="dropdown-menu">
                                  <ul>
                                      @foreach($childCat2->childrenRecursive as $childCat3)
                                         <li><a href="{{route('cat.show',$childCat3->slug)}}">{{$childCat3->title}}</a> </li>
                                      @endforeach
                                  </ul>
                                </div>
                                @endif
    
                             
                            
                            </li>
                            @endforeach
                          </ul>
                        </div>
                         </li>
                          @endif
                    @endforeach
                     
                  </ul>
                </div>
              </li>
                @endif
            @endforeach




            
                <li class="menu_brands dropdown"><a href="#">برند ها</a>
              <div class="dropdown-menu">

                @foreach(\App\Brand::limit(12)->get() as $brand)

                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6">
                  <a href="{{route('brand.show',$brand->slug)}}">
                    <img src="{{$brand->logo['images'][120]}}" width="100%" title="{{$brand->name}}" alt="{{$brand->name}}" />
                  </a>
                  <a href="{{route('brand.show',$brand->slug)}}" class="font9">{{$brand->name}}</a>
                </div>
                @endforeach
              
                
              </div>
            </li>
            <li class="dropdown wrap_custom_block hidden-sm hidden-xs"><a>بلاک سفارشی</a>
              <div class="dropdown-menu custom_block">
                <ul>
                  <li>
                    <table>
                      <tbody>
                        <tr>
                          <td><img alt="" src="/front/image/banner/cms-block.jpg"></td>
                          <td><img alt="" src="/front/image/banner/responsive.jpg"></td>
                          <td><img alt="" src="/front/image/banner/cms-block.jpg"></td>
                        </tr>
                        <tr>
                          <td><h4>بلاک های محتوا</h4></td>
                          <td><h4>قالب واکنش گرا</h4></td>
                          <td><h4>پشتیبانی ویژه</h4></td>
                        </tr>
                        <tr>
                          <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                          <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                          <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                        </tr>
                        <tr>
                          <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه مطلب</a></strong></td>
                          <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه مطلب</a></strong></td>
                          <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه مطلب</a></strong></td>
                        </tr>
                      </tbody>
                    </table>
                  </li>
                </ul>
              </div>
            </li>
            <li class="dropdown information-link"><a>برگه ها</a>
              <div class="dropdown-menu">
                <ul>
                  <li><a href="login.html">ورود</a></li>
                  <li><a href="register.html">ثبت نام</a></li>
                  <li><a href="category.html">دسته بندی (شبکه/لیست)</a></li>
                  <li><a href="product.html">محصولات</a></li>
                  <li><a href="cart.html">سبد خرید</a></li>
                  <li><a href="checkout.html">تسویه حساب</a></li>
                  <li><a href="compare.html">مقایسه</a></li>
                  <li><a href="wishlist.html">لیست آرزو</a></li>
                  <li><a href="search.html">جستجو</a></li>
                </ul>
                <ul>
                  <li><a href="about-us.html">درباره ما</a></li>
                  <li><a href="404.html">404</a></li>
                  <li><a href="elements.html">عناصر</a></li>
                  <li><a href="faq.html">سوالات متداول</a></li>
                  <li><a href="sitemap.html">نقشه سایت</a></li>
                  <li><a href="contact-us.html">تماس با ما</a></li>
                </ul>
              </div>
            </li>
            <li class="custom-link-right"><a href="#" target="_blank"> همین حالا بخرید!</a></li>
          </ul>
        </div>
        </div>
      </nav>
    
    <!-- Main آقایانu End-->
  </div>


            @yield('content')


  <!--Footer Start-->

  <div class="container_fluid">
  <footer id="footer">
    <div class="fpart-first">
      <div class="container">
        <div class="row">
          <div class="contact col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h5>درباره مارکت شاپ</h5>
            <p>قالب HTML فروشگاهی مارکت شاپ. این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</p>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>اطلاعات</h5>
            <ul>
              <li><a href="about-us.html">درباره ما</a></li>
              <li><a href="about-us.html">اطلاعات 0 تومان</a></li>
              <li><a href="about-us.html">حریم خصوصی</a></li>
              <li><a href="about-us.html">شرایط و قوانین</a></li>
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>خدمات مشتریان</h5>
            <ul>
              <li><a href="contact-us.html">تماس با ما</a></li>
              <li><a href="#">بازگشت</a></li>
              <li><a href="sitemap.html">نقشه سایت</a></li>
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>امکانات جانبی</h5>
            <ul>
              <li><a href="#">برند ها</a></li>
              <li><a href="#">کارت هدیه</a></li>
              <li><a href="#">بازاریابی</a></li>
              <li><a href="#">ویژه ها</a></li>
            </ul>
          </div>
          <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>حساب من</h5>
            <ul>
              <li><a href="#">حساب کاربری</a></li>
              <li><a href="#">تاریخچه سفارشات</a></li>
              <li><a href="#">لیست علاقه مندی</a></li>
              <li><a href="#">خبرنامه</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="fpart-second">
      <div class="container">
        <div id="powered" class="clearfix">
          <div class="powered_text pull-left flip">
            <p>کپی رایت © 2016 فروشگاه شما | پارسی سازی و ویرایش توسط <a href="https://www.roxo.ir" target="_blank">روکسو</a></p>
          </div>
          <div class="social pull-right flip"> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/front/image/socialicons/facebook.png" alt="Facebook" title="Facebook"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/front/image/socialicons/twitter.png" alt="Twitter" title="Twitter"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/front/image/socialicons/google_plus.png" alt="Google+" title="Google+"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/front/image/socialicons/pinterest.png" alt="Pinterest" title="Pinterest"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/front/image/socialicons/rss.png" alt="RSS" title="RSS"> </a> </div>
        </div>
        <div class="bottom-row">
          <div class="custom-text text-center">
            <p>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.<br> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
          </div>
          <div class="payments_types"> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/front/image/payment/payment_paypal.png" alt="paypal" title="PayPal"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/front/image/payment/payment_american.png" alt="american-express" title="American Express"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/front/image/payment/payment_2checkout.png" alt="2checkout" title="2checkout"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/front/image/payment/payment_maestro.png" alt="maestro" title="Maestro"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/front/image/payment/payment_discover.png" alt="discover" title="Discover"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="/front/image/payment/payment_mastercard.png" alt="mastercard" title="MasterCard"></a> </div>
        </div>
      </div>
    </div>
    <div id="back-top"><a data-toggle="tooltip" title="بازگشت به بالا" href="javascript:void(0)" class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
  </footer>
  </div>
  <!--Footer End-->

<!-- JS Part Start-->
<script type="text/javascript" src="/front/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/front/js/bootstrap/js/bootstrap.min.js"></script>
@yield('scripts')
<script type="text/javascript" src="/front/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="/front/js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="/front/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/front/js/custom.js"></script>
<!-- JS Part End-->

</body>
</html>