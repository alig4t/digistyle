@component('mail::message')
#ورود مدیریت به پنل

<h2>
{{$user->name}}

 به پنل مدیریت خوش آمدید  
</h2>
<h3>
 شما در تاریخ و ساعت {{$time}}
وارد پنل کاربری خود شده اید
</h3>
@endcomponent