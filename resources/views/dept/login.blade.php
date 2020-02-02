@extends('layouts.empty')

@section('content')
<div class="bg-primary d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
                <div class="text-muted text-center mt-2 mb-3"><small>Department Log in</small></div>
                <div class="btn-wrapper text-center">
                    <a href="#" class="btn btn-neutral btn-icon">
                        <span class="btn-inner--icon"><img src="{{ asset('img/facebook.png')}}"></span>
                        <span class="btn-inner--text">Facebook</span>
                    </a>
                    <a href="#" class="btn btn-neutral btn-icon">
                        <span class="btn-inner--icon"><img src="{{ asset('img/google.png') }}"></span>
                        <span class="btn-inner--text">Google</span>
                    </a>
                </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                    <small>Or sign in with credentials</small>
                </div>
                <form role="form" method="POST" action="{{ route('dept.login') }}">
                @csrf
                    <div class="form-group mb-3">
                        @error('email')
                            <span class="invalid-text" role="alert">
                                {{ $message }}
                            </span>
                        @enderror  
                        <div class="input-group @error('email') is-invalid @enderror input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                            </div>
                            <input class="form-control" placeholder="Username or Email" name="email" type="text">
                        </div>
                        
                    </div> 
                    <div class="form-group">
                        @error('password')
                            <span class="invalid-text" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <div class="input-group @error('password') is-invalid @enderror input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                            </div>
                            <input class="form-control" placeholder="Password" name="password" type="password">
                        </div>
                    </div>
                    <div class="custom-control custom-control-alternative custom-checkbox">
                        <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                        <label class="custom-control-label" for=" customCheckLogin">
                            <span class="text-muted">Remember me</span>
                        </label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4">Log in</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <a href="#" class="text-light"><small>Forgot password?</small></a>
            </div> 
        </div>
    </div>
</div>
@endsection
