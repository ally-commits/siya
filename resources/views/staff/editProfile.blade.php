@extends("layouts.app")
@section("content")

<div class="card-body">
    <hr>
    <form method="POST" action="{{ route('staffUpdateProfile') }}" enctype="multipart/form-data">
    @csrf
        <div class="form-row">
            <input type="hidden" name="id" value="{{$staff[0]->userId}}">
            <div class="col-md-4">
                <div class="form-group mb-1 @error('name') has-danger @enderror" >
                    <label class="form-control-label" for="">Staff name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Staff name" value="{{ $staff[0]->name }}" required="">
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
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Username"  value="{{ $staff[0]->email }}" required="">
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
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" placeholder="Date of Birth" value="{{ $staff[0]->dob }}" required="">
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
                    <select class="form-control @error('gender') invalid-form @enderror" value="{{ $staff[0]->gender }}" name="gender">
                        <option value="male" @if($staff[0]->gender == "male") selected @endif>Male</option>
                        <option value="female" @if($staff[0]->gender == "female") selected @endif>Female</option>
                        <option value="others" @if($staff[0]->gender == "others") selected @endif>Others</option>
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
                    value="{{ $staff[0]->department}}">
                        <option @if($staff[0]->department == "BCA") selected @endif>BCA</option>
                        <option @if($staff[0]->department == "BSC") selected @endif>BSC</option>
                        <option @if($staff[0]->department == "B Com") selected @endif>B COm</option>
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
                    <label class="form-control-label">Years Of Expirence</label>
                    <input type="number" value="{{ $staff[0]->expirence }}" class="form-control @error('expirence') is-invalid @enderror" name="expirence" placeholder="expirence" required="">
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
                    <textarea name="address" rows="6" class="form-control  @error('address') is-invalid @enderror">{{ $staff[0]->address}}</textarea>
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
                        value="{{ $staff[0]->bloodGroup }}">
                            <option @if($staff[0]->bloodGroup == "A pos+") selected @endif>A pos+</option>
                            <option @if($staff[0]->bloodGroup == "A neg-") selected @endif >A neg-</option>
                            <option @if($staff[0]->bloodGroup == "B pos+") selected @endif>B pos+</option>
                            <option @if($staff[0]->bloodGroup == "B neg-") selected @endif>B neg-</option>
                            <option @if($staff[0]->bloodGroup == "O pos+") selected @endif>O pos+</option>
                            <option @if($staff[0]->bloodGroup == "O neg-") selected @endif>O neg-</option>
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
                        <input type="text" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" placeholder="Phone Number" value="{{ $staff[0]->phoneNumber }}" required="">
                    </div>
                    @error('phoneNumber')
                        <div class="invalid-text">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <small class="text-warning">Enter password only if you need to change it...</small> 
        <div class="form-row">
            <div class="col-md-4 mb-3">
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
            <div class="col-md-4 mb-3">
                <div class="form-group mb-1 @error('password') has-danger @enderror">
                    <label class="form-control-label">Confirm Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Confirm Password">
                </div>
                @error('password')
                    <div class="invalid-text">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group mb-1 @error('image') has-danger @enderror" >
                    <label class="form-control-label" for="">Choose Profile Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="Choose Profile Image">
                </div>
                @error('image')
                    <div class="invalid-text">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>   
        <div>
            <button class="btn btn-primary btn-small" type="submit">Update Your Details</button>
        </div>
    </form>
</div>
@endsection