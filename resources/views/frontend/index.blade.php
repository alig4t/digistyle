@extends('frontend.layout.master')



@section('styles')
    <meta name="csrf-token" content="{{csrf_token()}}">

    <style>
      .p-0{
        padding:5px;
      }
      </style>
@endsection



@section('content')



   
    <div class="container-fluid">
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-xs-12">
          <!-- Slideshow Start-->
          <div class="slideshow single-slider owl-carousel">
            <div class="item"> <a href="#"><img class="img-responsive" src="/images/22.jpg" alt="banner 1" /></a> </div>
            <div class="item"> <a href="#"><img class="img-responsive" src="/images/33.jpg" alt="banner 2" /></a> </div>
            <div class="item"> <a href="#"><img class="img-responsive" src="/images/33.jpg" alt="banner 3" /></a> </div>
          </div>
          <!-- Slideshow End-->
          <!-- Banner Start-->
          {{-- <div class="marketshop-banner">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="/front/image/banner/sample-banner-3-300x300.jpg" alt="بنر نمونه 2" title="بنر نمونه 2" /></a></div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="/front/image/banner/sample-banner-1-300x300.jpg" alt="بنر نمونه" title="بنر نمونه" /></a></div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="/front/image/banner/sample-banner-2-300x300.jpg" alt="بنر نمونه 3" title="بنر نمونه 3" /></a></div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href="#"><img src="/front/image/banner/sample-banner-4-300x300.jpg" alt="بنر نمونه 4" title="بنر نمونه 4" /></a></div>
            </div>
          </div> --}}
          <!-- Banner End-->
        </div>
      </div>
    </div>


    <div class="container">
      <div class="row">
        <!--Middle Part Start-->
        <div id="content2" class="col-xs-12">


          <!-- محصولات Tab Start -->
          <div id="product-tab" class="product-tab">
  <ul id="tabs" class="tabs">
    <li><a href="#tab-latest">جدیدترین</a></li>
    <li><a href="#tab-featured">ویژه</a></li>
    <li><a href="#tab-bestseller">پرفروش</a></li>
    <li><a href="#tab-special">پیشنهادی</a></li>
  </ul>


  <div id="tab-latest" class="tab_content">
      <div class="owl-carousel product_carousel_tab">


        @foreach ($products as $item)
        <div class="product-thumb clearfix">
            <div class="image"><a href="{{route('product.show',$item->slug)}}"><img src="/images/products/{{$item->photos[0]->path}}" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive" /></a></div>
            <div class="caption">
              <h4><a href="product.html">{{$item->title}}</a></h4>
             
             
              @if($item->discount > 0)
              <p class="price"><span class="price-new">{{$item->price - $item->discount }} تومان</span>
                 <span class="price-old">{{$item->price}} تومان</span><span class="saving">{{floor(($item->discount)/$item->price * 100)}} %</span></p>
              @else 
              <p class="price"> {{$item->price}} تومان </p>
              @endif
            </div>
            <div class="button-group">
              <button class="btn-primary" type="button" onClick="addtoCart({{$item->id}})"><span>افزودن به سبد</span></button>
              <div class="add-to-links">
                <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
                <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
              </div>
            </div>
          </div>
        @endforeach
           
      </div>
  </div>
  


  <div id="tab-featured" class="tab_content">
    <div class="owl-carousel product_carousel_tab">
    
      @foreach ($products as $item)
      <div class="product-thumb clearfix">
          <div class="image"><a href="{{route('product.show',$item->slug)}}"><img src="/images/products/{{$item->photos[0]->path}}" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive" /></a></div>
          <div class="caption">
            <h4><a href="product.html">{{$item->title}}</a></h4>
           
           
            @if($item->discount > 0)
            <p class="price"><span class="price-new">{{$item->price - $item->discount }} تومان</span>
               <span class="price-old">{{$item->price}} تومان</span><span class="saving">{{floor(($item->discount)/$item->price * 100)}} %</span></p>
            @else 
            <p class="price"> {{$item->price}} تومان </p>
            @endif
          </div>
          <div class="button-group">
            <button class="btn-primary" type="button" onClick="addtoCart({{$item->id}})"><span>افزودن به سبد</span></button>
            <div class="add-to-links">
              <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
              <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>


  <div id="tab-bestseller" class="tab_content">
  <div class="owl-carousel product_carousel_tab">
 
    @foreach ($products as $item)
    <div class="product-thumb clearfix">
        <div class="image"><a href="{{route('product.show',$item->slug)}}"><img src="/images/products/{{$item->photos[0]->path}}" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive" /></a></div>
        <div class="caption">
          <h4><a href="product.html">{{$item->title}}</a></h4>
         
         
          @if($item->discount > 0)
          <p class="price"><span class="price-new">{{$item->price - $item->discount }} تومان</span>
             <span class="price-old">{{$item->price}} تومان</span><span class="saving">{{floor(($item->discount)/$item->price * 100)}} %</span></p>
          @else 
          <p class="price"> {{$item->price}} تومان </p>
          @endif
        </div>
        <div class="button-group">
          <button class="btn-primary" type="button" onClick="addtoCart({{$item->id}})"><span>افزودن به سبد</span></button>
          <div class="add-to-links">
            <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
            <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
          </div>
        </div>
      </div>
    @endforeach
  </div>                 
  </div>


  <div id="tab-special" class="tab_content">
    <div class="owl-carousel product_carousel_tab">
 
      @foreach ($products as $item)
      <div class="product-thumb clearfix">
          <div class="image"><a href="{{route('product.show',$item->slug)}}"><img src="/images/products/{{$item->photos[0]->path}}" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive" /></a></div>
          <div class="caption">
            <h4><a href="product.html">{{$item->title}}</a></h4>
  
            @if($item->discount > 0)
            <p class="price"><span class="price-new">{{$item->price - $item->discount }} تومان</span>
               <span class="price-old">{{$item->price}} تومان</span><span class="saving">{{floor(($item->discount)/$item->price * 100)}} %</span></p>
            @else 
            <p class="price"> {{$item->price}} تومان </p>
            @endif
          </div>
          <div class="button-group">
            <button class="btn-primary" type="button" onClick="addtoCart({{$item->id}})"><span>افزودن به سبد</span></button>
            <div class="add-to-links">
              <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
              <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
      @endforeach
            
  </div>
</div>

        <!-- محصولات Tab Start -->
          <!-- Banner Start -->
          <div class="marketshop-banner">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="#"><img src="/front/image/banner/sample-banner-4-600x250.jpg" alt="2 Block Banner" title="2 Block Banner" /></a></div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="#"><img src="/front/image/banner/sample-banner-5-600x250.jpg" alt="2 Block Banner 1" title="2 Block Banner 1" /></a></div>
            </div>
          </div>
          <!-- Banner End -->

          
          <!-- دسته ها محصولات Slider Start -->
          @forEach($category_product as $box_product)
          <h3 class="subtitle">{{$box_product[0]->category->title}} - <a class="viewall" href="{{route('cat.show',$box_product[0]->category->slug)}}">نمایش همه</a></h3>
          <div class="owl-carousel latest_category_carousel">
            @forEach($box_product as $cat_product_item)

            <div class="product-thumb">
              <div class="image"><a href="{{route('product.show',$cat_product_item->slug)}}"><img src="/images/products/{{$cat_product_item->photos[0]->path}}" alt="{{$cat_product_item->title}}" title="{{$cat_product_item->title}}" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="{{route('product.show',$cat_product_item->slug)}}">{{$cat_product_item->title}}</a></h4>
                @if($cat_product_item->discount > 0)
                <p class="price"><span class="price-new">{{$cat_product_item->price - $cat_product_item->discount }} تومان</span>
                  <span class="price-old">{{$cat_product_item->price}} تومان</span><span class="saving">{{floor(($cat_product_item->discount)/$cat_product_item->price * 100)}} %</span></p>
                @else 
                <p class="price"> {{$cat_product_item->price}} تومان </p>
                @endif
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
              <div class="button-group">
                <button class="btn-primary" type="button" onClick="addtoCart({{$item->id}})"><span>افزودن به سبد</span></button>
                <div class="add-to-links">
                  <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                  <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>

            @endforeach
          </div>

          @endforeach


         
          <!-- دسته ها محصولات Slider End -->
          
          
        </div>
        <!--Middle Part End-->
      </div>
    </div>



    </div>




















<!-- Feature Box Start-->
<div class="container-fluid">


    <!-- برند Logo Carousel Start-->
    <div id="carousel" class="owl-carousel nxt">
      @foreach($brands as $brand)

      <div class="item text-center"> <a href="#"><img src="{{$brand->logo['images'][200]}}" alt="{{$brand->title}}" class="img-responsive" /></a> </div>
      @endforeach
     </div>
    <!-- برند Logo Carousel End -->


    <div class="custom-feature-box row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="feature-box fbox_1">
          <div class="title">ارسال رایگان</div>
          <p>برای خرید های بیش از 100 هزار تومان</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="feature-box fbox_2">
          <div class="title">پس فرستادن رایگان</div>
          <p>بازگشت کالا تا 24 ساعت پس از خرید</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="feature-box fbox_3">
          <div class="title">کارت هدیه</div>
          <p>بهترین هدیه برای عزیزان شما</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="feature-box fbox_4">
          <div class="title">امتیازات خرید</div>
          <p>از هر خرید امتیاز کسب کرده و از آن بهره بگیرید</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Feature Box End-->

@endsection


@section('scripts')
<script src="{{asset('js/app.js')}}"></script>
<script>

    var cardTitle = document.getElementById('cart-total');

    var basketTable = document.getElementById('basket-tbl');
    var basketBody = basketTable.querySelector('tbody');


    function loadBasket(basket){
      console.log('sssssss');
      basketBody.innerHTML = '';

      basket.items.forEach(elem => {
        console.log(elem);
        let card_tr = document.createElement('tr');
        let card_td_1 = document.createElement('td');
        card_td_1.className = 'text-center';
        let card_td_1_a = document.createElement('a');
        card_td_1_a.setAttribute('href','#');

        let card_img = document.createElement('img');
        card_img.className = 'img-thumbnail';
        card_img.setAttribute('width','65px');
        card_img.setAttribute('src','/images/products/'+ elem['item'].photos[0].path);

        let card_td_2 = document.createElement('td');
        card_td_2.className = 'text-left';
        let card_td_2_a = document.createElement('a');
        card_td_2_a.setAttribute('href','#');
        card_td_2_a.textContent = elem['item'].title;


        let card_td_3 = document.createElement('td');
        card_td_3.className = 'text-right';
        card_td_3.textContent = elem.qty;

        let card_td_4 = document.createElement('td');
        card_td_4.className = 'text-right';
        card_td_4.textContent = elem.price-elem.discount + ' تومان ';


        let card_td_5 = document.createElement('td');
        card_td_5.className = 'text-center';
        let card_td5_button = document.createElement('button');
        card_td5_button.classList.add('btn','btn-danger','btn-xs','remove');
        card_td5_button.setAttribute('type','button');
        
        let card_td5_i = document.createElement('i');
        card_td5_i.classList.add('fa','fa-times');

        card_td5_button.appendChild(card_td5_i);
        card_td_5.appendChild(card_td5_button);

        card_td_1_a.appendChild(card_img);
        card_td_1.appendChild(card_td_1_a);
        
        card_td_2.appendChild(card_td_2_a)

        card_tr.appendChild(card_td_1);
        card_tr.appendChild(card_td_2)
        card_tr.appendChild(card_td_3)
        card_tr.appendChild(card_td_4)
        card_tr.appendChild(card_td_5)

        basketBody.append(card_tr);

      });


      document.getElementById('totalprice').innerHTML = basket.totalPrice + " تومان ";
      document.getElementById('totaldiscount').innerHTML = basket.totalDiscount + " تومان ";
      document.getElementById('finalprice').innerHTML = basket.finalPrice + " تومان ";

    }


    function addtoCart(pid){
        axios.get('/add-to-cart/'+pid).then((resp) => {
          cardTitle.innerHTML = resp.data.quantity + " آیتم " + resp.data.totalPrice +" تومان ";
          console.log(resp.data);
          loadBasket(resp.data);
        }).catch((err) => {
        console.log(err);
        });
    }
  
</script>

@endsection








