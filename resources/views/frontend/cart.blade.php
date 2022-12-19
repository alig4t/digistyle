@extends('frontend.layout.master')



@section('styles')
    <meta name="csrf-token" content="{{csrf_token()}}">

    <style>
td{
    vertical-align: middle !important;
}
        </style>
@endsection




@section('content')


<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="cart.html">سبد خرید</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">سبد خرید</h1>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center">تصویر</td>
                    <td class="text-center">نام محصول</td>
                    <td class="text-center">کد محصول</td>
                    <td class="text-center">تعداد</td>
                    <td class="text-center">قیمت واحد</td>
                    <td class="text-center">کل</td>
                  </tr>
                </thead>
                <tbody>
                    @if(Session::has('cart'))
                    @foreach($cart->items as $item)
                  <tr>
                    <td class="text-center"><img src="/images/products/{{$item['item']->photos[0]->path}}" width="200px" class="img-thumbnail" /></td>
                    <td class="text-center"><a href="{{route('product.show',$item['item']->slug)}}">{{$item['item']->title}}</a><br />
                      </td>
                    <td class="text-center">{{$item['item']->sku}}</td>
                    <td class="text-center"><div class="input-group btn-block quantity">
                        <input type="text" name="quantity" value="{{$item['qty']}}" size="1" class="form-control" />
                        <span class="input-group-btn">
                        <a href="/plus-cart/{{$item['item']->id}}" data-toggle="tooltip" title="اضافه کردن" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                        <a href="/remove-cart/{{$item['item']->id}}" data-toggle="tooltip" title="کم کردن" class="btn btn-danger"><i class="fa fa-minus"></i></a>
                        </span></div></td>
                    <td class="text-center">{{$item['price'] - $item['discount']}} تومان</td>
                    <td class="text-center">{{($item['price'] - $item['discount']) * $item['qty']}} تومان</td>
                  </tr>

                  @endforeach
                    @endif
                  
                </tbody>
              </table>
            </div>
          <h2 class="subtitle">حالا مایلید چه کاری انجام دهید؟</h2>
          <p>در صورتی که کد تخفیف در اختیار دارید میتوانید از آن در اینجا استفاده کنید.</p>
          <div class="row">
            <div class="col-sm-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">استفاده از کوپن تخفیف</h4>
                </div>
                <div id="collapse-coupon" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <label class="col-sm-4 control-label" for="input-coupon">کد تخفیف خود را در اینجا وارد کنید</label>
                    <div class="input-group">
                      <input type="text" name="coupon" value="" placeholder="کد تخفیف خود را در اینجا وارد کنید" id="input-coupon" class="form-control" />
                      <span class="input-group-btn">
                      <input type="button" value="اعمال کوپن" id="button-coupon" data-loading-text="بارگذاری ..."  class="btn btn-primary" />
                      </span></div>
                  </div>
                </div>
              </div>
            </div>
           
          
            @if(Session::has('cart'))
         
         
            <div class="col-sm-6">
              <table class="table table-bordered">
                <tr>
                  <td class="text-right"><strong>جمع کل:</strong></td>
                  <td class="text-right">{{$cart->totalPrice}} تومان</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>کسر هدیه:</strong></td>
                  <td class="text-right">{{$cart->totalDiscount}} تومان</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>کوپن تخفیف:</strong></td>
                  <td class="text-right">0 تومان</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>کل :</strong></td>
                  <td class="text-right">{{$cart->finalPrice}} تومان</td>
                </tr>
              </table>
            </div>
            @endif
        </div>

          
          <div class="buttons">
            <div class="pull-left"><a href="index.html" class="btn btn-default">ادامه خرید</a></div>
            <div class="pull-right"><a href="checkout.html" class="btn btn-primary">تسویه حساب</a></div>
          </div>
       
        <!--Middle Part End -->
      </div>
    </div>
  </div>
  <!--Footer Start-->

@endsection



