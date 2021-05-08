@extends('layouts.app')
@section('content')
<div class="col-md-6 col-lg-5">
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Verify OTP Code</h2>
        </div>
        <form  method="POST" action="{{ route('verify') }}">
            @csrf
            @if (session('success'))
                <div class="alert alert-success">
                    <button type="button" aria-hidden="true" class="close">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <span class="alert-msg"><b> Success - </b> {{ session('success') }}</span>
                </div>
            @endif

            @if (session('failure'))
                <div class="alert alert-danger">
                    <button type="button" aria-hidden="true" class="close">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <span class="alert-msg"><b> Failed - </b> {{ session('failure') }}</span>
                </div>
            @endif
            <div class="input-group custom">
                <input type="text" id="otp" class="form-control form-control-lg" placeholder="OTP Code" name="otp" value="{{ old('otp') }}" required autocomplete="otp" autofocus>
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <!--
                            use code for form submit
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                        -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Verify</button>
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