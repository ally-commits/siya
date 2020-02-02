@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;">
        <h3 class="mb-0">Add Staff</h3>
        <a href="{{route('admin.viewStaff')}}" class="btn btn-primary">View Staff</a>
    </div> 
    <div class="card-body">
    <hr>
        <form method="POST" action="{{ route('admin.addStaff') }}">
        @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group mb-1 @error('name') has-danger @enderror" >
                        <label class="form-control-label" for="">Staff name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Staff name" value="{{ old('name') }}" required="">
                    </div>
                    @error('name')
                        <div class="invalid-text">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div> 
                <div class="col-md-6 mb-3">
                    <div class="form-group mb-1 @error('email') has-danger @enderror">
                        <label class="form-control-label" for="">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">@</span>
                            </div>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Username"  value="{{ old('email') }}" required="">
                        </div>
                    </div>
                    @error('email')
                        <div class="invalid-text">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <div class="form-group mb-1 @error('password') has-danger @enderror">
                        <label class="form-control-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required="">
                    </div>
                    @error('password')
                        <div class="invalid-text">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group mb-1 @error('password') has-danger @enderror">
                        <label class="form-control-label">Confirm Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Password" required="">
                    </div>
                    @error('password')
                        <div class="invalid-text">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>  
            <div>
                <button class="btn btn-primary btn-small" type="submit">Add Staff</button>
            </div>
        </form>
    </div>
</div>
@endsection