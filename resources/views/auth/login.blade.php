@extends('layouts.app')
@section('content')
<div class="col-md-6 col-lg-5">
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">User Login</h2>
        </div>
        <form  method="POST" action="{{ route('login') }}">
            @csrf
            <div class="select-role">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <a href="{{ route('login')}}" class="btn active">
                        <input type="radio" name="options" id="admin">
                        <div class="icon"><img src="vendors/images/briefcase.svg" class="svg" alt=""></div>
                        <span>I'm</span>
                        User
                    </a>
                    <a href="{{ route('admin-login')}}" class="btn">
                        <div class="icon"><img src="vendors/images/person.svg" class="svg" alt=""></div>
                        <span>I'm</span>
                        Admin
                    </a>
                </div>
            </div>
            <div class="input-group custom">
                <input type="email" id="email" class="form-control form-control-lg" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                </div>
                
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group custom">
                <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="**********">
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row pb-30">
                <div class="col-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customCheck1">Remember</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="forgot-password"><a href="{{ route('password.request') }}">Forgot Password</a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <!--
                            use code for form submit
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                        -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
                    </div>
                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373"></div>
                    <div class="input-group mb-0">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection