@extends('frontend.master')
@section('title')
{{config('app.name')}} - Register
@endsection
@section('content')

<div class=" page_paddings_yes mb-5">
    <div class="content_wrap">
        <div class="post_content mb-4">
            <h3 class="sc_title sc_title_regular  text-center mt-3 mb-1">Register </h3>
            <div class="h-divider">
                <div class="shadows"></div>
                <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" />
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-6 col-12 offset-lg-3 col-md-8 offset-md-2 col-12 mt-4 mb-4">
                <x-auth-session-status class="mb-4" :status="session('status')" />
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $item)
                    <span> {{$item}}</span> <br>
                    @endforeach
                </div>
                @endif
                @if (session('warning'))
                <div class="alert alert-danger">{{session('warning')}}</div>
                @endif
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="name">Name</label>
                        <input autofocus spellcheck="true" type="name" id="name" name="name" :value="old('name')"
                            autofocus required class="form-control" />
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" :value="old('email')" required
                            class="form-control" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" type="password" name="password" required
                            autocomplete="new-password" class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password_confirmation">Confirm
                            Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="form-control" />
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary text-light btn-block mb-4">Sign Up</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <a class="btn text-light  btn-block mb-4" href="{{route('GoogleRegister')}}" style="background-color: #99CB55;
            border-color: #0C743F;
            color: #0C743F;"><i class="fab fa-google"></i> Register with Google</a>
                        <span>Already Register? <a href="{{route('login')}}" style="font-weight:700;">Login
                                Here</a></span>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection