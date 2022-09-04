@extends('frontend.master')
@section('title')
{{config('app.name')}} - Profile
@endsection
@section('content')
<style>
    li {
        list-style: none;
    }

    .ptb-100 {
        padding: 100px 0;
    }

    .active {
        color: white !important;
    }

</style>

<div class="container">
    <h3 class="sc_title sc_title_regular  text-center mt-3 mb-1">Profile</h3>
    <div class="h-divider">
        <div class="shadows"></div>
        <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
    </div>
    <div class="row ptb-100">
        @if ($errors->any())
        <div class="col-lg-12">
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <span>{{$error}}</span> <br>
                @endforeach
            </div>
        </div>
        @endif
        @if (session('success'))
        <div class="col-lg-12">
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        </div>
        @endif
        @if (session('warning'))
        <div class="col-lg-12">
            <div class="alert alert-danger">
                {{session('warning')}}

            </div>
        </div>
        @endif
        <div class="col-lg-3 mb-5 col-12">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#Dashboard" role="tab"
                    aria-controls="Dashboard" aria-selected="true">Dashboard</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#order-list" role="tab"
                    aria-controls="v-pills-messages" aria-selected="false">Order</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#change-passwords" role="tab"
                    aria-controls="change-passwords" aria-selected="false">Change Password</a>
                <a class="nav-link" onclick="event.preventDefault();document.getElementById('from_logout').submit()"
                    href="{{ route('logout') }}">Log Out</a>
                <form id="from_logout" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </div>
        <div class="col-lg-9 col-12">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="Dashboard" role="tabpanel"
                    aria-labelledby="v-pills-home-tab">

                    <p style="font-size: 16px !important">Welcome, {{Str::ucfirst(auth()->user()->name)}} From your
                        account dashboard. you can easily check & view your recent
                        orders and Change your
                        password .</p>
                </div>
                <div class="tab-pane fade" id="change-passwords" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="ml-5 col-lg-5">

                        <form action="{{route('ChangeUserPass')}}" method="POST">
                            @csrf
                            <div class="form-group ">
                                <label class="text-dark form-label" for="current_pass">Current Password</label>
                                <input type="password" name="current_pass" id="current_pass" class="form-control"
                                    placeholder="Current Password">
                            </div>
                            <div class="form-group ">
                                <label class="text-dark form-label" for="new_pass">New Password</label>
                                <input name="new_pass" type="password" id="new_pass" class="form-control"
                                    placeholder="New Password">
                            </div>
                            <div class="form-group ">
                                <label class="text-dark form-label" for="confirm_pass">Confirm Password</label>
                                <input name="confirm_pass" type="password" id="confirm_pass" class="form-control"
                                    placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="btn text-light ">Submit</button>
                        </form>
                    </div>
                </div>
                <style>
                    .order_table {
                        background: #99CB55;
                        color: #fff;
                    }

                    .order_border {
                        border-bottom: 1px solid rgb(211, 211, 211)
                    }

                </style>
                <div class="tab-pane fade" id="order-list" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <table class="table">
                        <thead class="order_table">
                            <tr>
                                <th scope="col">Order No</th>
                                <th class="text-center" scope="col">Order Date</th>
                                <th class="text-center" scope="col">Total Amount</th>
                                <th class="text-center" scope="col">Delivery Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order_summaries)
                            <tr class="order_border">
                                <td>#{{$order_summaries->order_number}}</td>
                                @if ($order_summaries->created_at->diffForHumans() == '1 week ago')
                                <td class="text-center">{{$order_summaries->created_at->format('d/m/Y')}}</td>
                                @else
                                <td class="text-center">{{$order_summaries->created_at->diffForHumans()}}</td>
                                @endif
                                <td class="text-center">৳{{$order_summaries->subtotal}}</td>
                                @if($order_summaries->cancel != '')
                                <td class="text-center">Order Canceled</td>
                                @elseif ($order_summaries->delivery_status == 1)

                                <td class="text-center">Pending...</td>
                                @elseif ($order_summaries->delivery_status === 2)
                                <td class="text-center" On the way</td>
                                    @else
                                <td class="text-center">Deliverd</td>
                                @endif
                            </tr>
                            @empty
                            <tr class="order_border">
                                <td class="text-center" colspan="10">No Order Record Found</td>
                            </tr>
                            @endforelse
                            <tr id="">
                            </tr>
                        </tbody>
                        <tbody id="ajax-data">

                        </tbody>
                    </table>
                    @if ($orders->links() != '')
                    <div class="mt-2 text-center">
                        <a href="javascript:void(0);" class="loadmore_btn">Load More...</a>
                    </div>
                    @endif
                    <li class="col-12 text-center">
                        <div class="load_image" style="display: none">
                            <img width="30%" src="{{asset('front/images/Reload-Image-Gif-1.gif')}}" alt="preloader">
                        </div>
                        <div class="no_data" style="display: none">
                           <a >No more record</a>
                        </div>
                    </li>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script_js')
<script>
    var page = 1;
    $(document).on('click', '.loadmore_btn', function(event){
    page++;
    loadMoreData(page)
 });

function loadMoreData(page){
     $('.loadmore_btn').hide();
    $('.load_image').show();
    $.ajax({
        url:'?page=' + page,
        type:'get',
    })
    .done(function(data){
        if(data.html == ""){
         $('.loadmore_btn').hide();
        $('.load_image').hide();
        $('.no_data').show();
            return;
        }
        $('#ajax-data').append(data.html);
        $('.load_image').hide();
        $('.loadmore_btn').show();
    })
}
</script>
@endsection