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
                <div class="col-md-4">
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
                <div class="col-md-4 mb-3">
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
                <div class="col-md-4">
                    <div class="form-group mb-1 @error('dob') has-danger @enderror" >
                        <label class="form-control-label" for="">Date of Birth</label>
                        <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" placeholder="Date of Birth" value="{{ old('dob') }}" required="">
                    </div>
                    @error('dob')
                        <div class="invalid-text">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div> 
            </div>
            
            <div class="form-row">
                <div class="col-md-4">                          
                    <div class="form-group">
                        <label for="">Select your Gender</label>
                        <select class="form-control @error('gender') invalid-form @enderror" value="{{ old('gender') }}" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>   
                        @error('gender')
                            <span class="invalid-text" role="alert">
                                {{ $message }}
                            </span>
                        @enderror 
                    </div>
                </div>  
                <div class="col-md-4">                          
                    <div class="form-group">
                        <label for="">Select your Department</label>
                        <select class="form-control @error('department') invalid-form @enderror" name="department" 
                        value="{{ old('department')}}">
                            <option>BCA</option>
                            <option>BSc</option>
                            <option>BCom</option>
                            <option>BA</option>
                            <option>BVoc</option>
                            <option>BBA</option>
                        </select>   
                        @error('department')
                            <span class="invalid-text" role="alert">
                                {{ $message }}
                            </span>
                        @enderror 
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="form-group mb-1 @error('expirence') has-danger @enderror">
                        <label class="form-control-label">Years Of Experience</label>
                        <input type="number" value="{{ old('expirence') }}" class="form-control @error('experience') is-invalid @enderror" name="expirence" placeholder="Experience" required="">
                    </div>
                    @error('expirence')
                        <div class="invalid-text">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div> 
            <div class="form-row">
                <div class="col-md-8">
                    <div class="form-group mb-1 @error('address') has-danger @enderror" >
                        <label class="form-control-label" for="">Address</label>
                        <textarea name="address" rows="6" class="form-control  @error('address') is-invalid @enderror">{{ old('address')}}</textarea>
                    </div>
                    @error('address')
                        <div class="invalid-text">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div> 
                <div class="col-md-4"> 
                    <div class="col-md-12">                          
                        <div class="form-group">
                            <label for="">Select your Blood Group</label>
                            <select class="form-control @error('bloodGroup') invalid-form @enderror" name="bloodGroup"
                            value="{{old('bloodGroup') }}">
                                <option>A +ve</option>
                                <option>A -ve</option>
                                <option>B +ve</option>
                                <option>B -ve</option>
                                <option>O +ve</option>
                                <option>O -ve</option>
                                <option>AB +ve</option>
                            </select>   
                            @error('bloodGroup')
                                <span class="invalid-text" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group mb-1 @error('phoneNumber') has-danger @enderror" >
                            <label class="form-control-label" for="">Phone Number</label>
                            <input type="text" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" placeholder="Phone Number" value="{{ old('phoneNumber') }}" required="">
                        </div>
                        @error('phoneNumber')
                            <div class="invalid-text">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div> 
                </div>
            </div>   
            <div>
                <button class="btn btn-primary btn-small" type="submit">Add Staff</button>
            </div>
        </form>
    </div>
</div>
@endsection