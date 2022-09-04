<h1 style="text-align: center"><a style="text-decoration: none;color:#39B54A;"
    href="{{route('Frontendhome')}}">{{config('app.name')}}</a>
</h1>
<h3>Hi {{$user_name}},</h3>
<p>We are pleased to inform that your order  has been delivered.</p>
<p>
Sorry to be the bearer of bad news, but your order <b>#{{$order_details->order_number}}</b> was cancelled.
</p>

