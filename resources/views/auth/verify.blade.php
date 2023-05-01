@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('یک ایمیل جدید برای شما ارسال شد. جهت فعالسازی روی لینک کلیک نمایید') }}
                        </div>
                    @endif

                    {{-- {{ __('Before proceeding, please check your email for a verification link.') }} --}}
                    {{ __('قبل از ادامه کار لازم است ایمیل خود را فعال نمایید. صندوق ورودی ایمیل خود را بررسی نمایید.') }}

                    {{ __('اگر ایمیلی دریافت نکرده اید') }}, <a href="{{ route('verification.resend') }}">{{ __('برای درخواست مجدد ایمیل فعال سازی کلیک نمایید') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
