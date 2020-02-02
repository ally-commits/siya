@extends('layouts.empty')

@section('content')
<div class="bg-primary d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="container-fluid" >
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 mt-2">
                <div class="card bg-secondary border-0 mb-0"> 
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="card-header">
                            <h3 class="text-muted text-center" style="font-weight: 500;">Admin Login Page</h3>
                        </div>
                        <div class="text-center text-muted mb-4">
                            <small>Sign in with credentials</small>
                        </div>
                        <form method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf
                            <div class="form-group mb-3">
                                @error('email')
                                    <span class="invalid-text" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <div class="input-group @error('email') is-invalid @enderror input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Username" name="email" type="text">
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
            </div>
        </div>
    </div>
</div>
@endsection