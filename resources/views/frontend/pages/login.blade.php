@extends('frontend.master')
@section('title')
{{config('app.name')}} - Login
@endsection
@section('content')
<!-- checkout-area start -->

<div class=" page_paddings_yes mb-5">
    <div class="content_wrap">
        <div class="post_content mb-4">
            <h3 class="sc_title sc_title_regular  text-center mt-3 mb-1">Login </h3>
            <div class="h-divider">
                <div class="shadows"></div>
                <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12 mt-4 mb-4">
            

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $item)
                    {{$item}}
                    @endforeach
                </div>
                @endif
                @if (session('warning'))
                <div class="alert alert-danger">{{session('warning')}}</div>

                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email address</label>
                        <input autofocus type="email" name="email" id="email" :value="old('email')" required
                            class="form-control" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" required class="form-control"
                            autocomplete="current-password" />
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col-6 ">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" name="remember" type="checkbox" id="remember_me" />
                                <label class="form-check-label pl-2" for="remember_me"> Remember me
                                </label>
                            </div>
                        </div>

                        <div class="col-6 text-right">
                            <!-- Simple link -->
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary text-light btn-block mb-4">Sign in</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <a class="btn  text-light btn-block mb-4" href="{{route('GoogleLogin')}}" style="background-color: #99CB55;
            border-color: #0C743F;
            color: #0C743F;">
                            <i class="fab fa-google"></i>
                            Login with Google
                        </a>
                        <span>Not a member? <a href="{{route('register')}}" style="font-weight:700;">Crate an account
                                here</a></span>


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection