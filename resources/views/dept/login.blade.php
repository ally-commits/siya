@extends('layouts.empty')

@section('content')
<div class="row justify-content-center align-items-center h-100">
    <div class="col-md-8 col-lg-6 col-xl-4 card overflow-hidden account-card container m-auto p-3 shadow">
        <div class="bg-primary p-4 text-white text-center position-relative">
            <h4 class="font-20 m-b-5">Department Login</h4>
            <p class="text-white-50 mb-4">Sign in to continue to IQAC</p>
            <a href="index.html" class="logo logo-admin"><img src="{{ asset('assets/images/logo-sm.png') }}" height="24" alt="logo"></a>
        </div>
        <div class="account-card-content"> 

            <form method="POST" action="{{ route('dept.login') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror " id="email" placeholder="Enter username">
                    @error('email')
                        <span class="invalid-text text-danger" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="userpassword">Password</label>
                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror " id="userpassword" placeholder="Enter password">
                    @error('password')
                        <span class="invalid-text text-danger" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group row m-t-20">
                    <div class="col-sm-6">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                        </div>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div> 
            </form>

        </div>
    </div> 
</div>
@endsection