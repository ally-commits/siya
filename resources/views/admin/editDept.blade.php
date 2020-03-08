@extends("layouts.admin")

@section("content")
<div class="card">
    <div class="card-header">
        <h3 class="mb-0">Update Department Details</h3>
    </div> 
    <div class="card-body">
    <hr>
        <form method="POST" action="{{ route('admin.updateDept') }}">
        @csrf
            <input type="hidden" name="id"  value="{{$dept['id']}}">
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group mb-1 @error('name') has-danger @enderror" >
                        <label class="form-control-label" for="">Department name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="dept name" value="{{ $dept['name']}}" required="">
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
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Username"  value="{{ $dept['email']}}" required="">
                        </div>
                    </div>
                    @error('email')
                        <div class="invalid-text">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
            <span class="text-danger" style="font-size: 12px;">Only edit below fields if the password need to be changed otherwise you can leave it blank</span>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <div class="form-group mb-1 @error('password') has-danger @enderror">
                        <label class="form-control-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
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
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Password">
                    </div>
                    @error('password')
                        <div class="invalid-text">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>  
            <div>
                <button class="btn btn-primary btn-small" type="submit">Update Data</button>
            </div>
        </form>
    </div>
</div> 
@endsection