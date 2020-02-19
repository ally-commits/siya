@extends("layouts.empty")

@section('content')
    <div class="container">
        <a href="{{ route('admin.viewStaff') }}" class="btn btn-primary btn-back"><i class="ni ni-bold-left"></i> </a>
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 @if($active == 1) active @endif" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Staff Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0  @if($active == 2) active @endif" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Add / View Qualification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 " id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Edit Staff profile</a>
                </li>
            </ul>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade @if($active == 1) show active @endif" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                        <div class="row" id="profile">
                            <div class="col-md-12 d-flex" style="justify-content: space-between;">
                                <h1>Staff Profile</h1>
                                <button class="btn btn-primary" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">Edit Profile</button>
                            </div>  
                            <div class="container emp-profile"> 
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="profile-img">
                                            <img src="{{ asset($staff[0]->image) }}" alt=""/>                                     
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-head">
                                            <h5>
                                                {{ $staff[0]->name}}
                                            </h5>
                                            <h6>
                                                {{ $staff[0]->address}}
                                            </h6>  
                                        </div> 
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="profile-work">
                                            <p>WORK LINK</p>
                                            <a href="">Website Link</a><br/>
                                            <a href="">Bootsnipp Profile</a><br/>
                                            <a href="">Bootply Profile</a>
                                            <p>SKILLS</p>
                                            <a href="">Web Designer</a><br/>
                                            <a href="">Web Developer</a><br/>
                                            <a href="">WordPress</a><br/>
                                            <a href="">WooCommerce</a><br/>
                                            <a href="">PHP, .Net</a><br/>
                                        </div>
                                    </div>
                                    <div class="col-md-8">  
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $staff[0]->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $staff[0]->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date Of Birth</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $staff[0]->dob }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $staff[0]->phoneNumber}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Department</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $staff[0]->department}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $staff[0]->gender}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Blood group</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $staff[0]->bloodGroup}}</p>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade @if($active == 2) show active @endif" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0">Add Educational Details</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.addStaffQualification') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="userId" value="{{ $staff[0]->id }}">
                                    <div class="row">                   
                                        <div class="col-md-6">                          
                                            <div class="form-group">
                                                <label for="">Enter the Name of the College</label>
                                                <input type="text" class="form-control @error('college') invalid-form @enderror"
                                                    placeholder="Enter the Name of College" name="college" value="{{ old('college') }}">    
                                                @error('college')
                                                    <span class="invalid-text" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror 
                                            </div>
                                        </div> 
                                        <div class="col-md-6">                          
                                            <div class="form-group">
                                                <label for="">Enter Your Course Details</label>
                                                <input type="text" class="form-control @error('course') invalid-form @enderror"
                                                    placeholder="Enter Your Course Details" name="course" value="{{ old('course') }}">    
                                                @error('course')
                                                    <span class="invalid-text" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror 
                                            </div>
                                        </div>  
                                        <div class="col-md-6">                          
                                            <div class="form-group">
                                                <label for="">Year of Passing</label>
                                                <input type="date" class="form-control @error('year') invalid-form @enderror"
                                                    placeholder="Year of Passing" name="year" value="{{ old('year') }}">    
                                                @error('year')
                                                    <span class="invalid-text" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror 
                                            </div>
                                        </div>
                                        <div class="col-md-6">                          
                                            <div class="form-group">
                                                <label for="">Enter your Place</label>
                                                <input type="text" class="form-control @error('place') invalid-form @enderror"
                                                    placeholder="Enter your Place" name="place" value="{{ old('place') }}">    
                                                @error('place')
                                                    <span class="invalid-text" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror 
                                            </div>
                                        </div>   
                                        <div>
                                            <button class="btn btn-primary">
                                                Add Qualification
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                @if(count($qualification) == 0)
                                    <h3 class="text-center">
                                        No Qualification Found
                                    </h3> 
                                @else 
                                    <div class="table">
                                        <div>
                                        <table class="table align-items-center">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">
                                                        Sl No
                                                    </th>
                                                    <th scope="col">
                                                        Course
                                                    </th>
                                                    <th scope="col">
                                                        College
                                                    </th> 
                                                    <th scope="col">
                                                        Year of passing
                                                    </th>
                                                    <th scope="col">
                                                        Place
                                                    </th>
                                                    <th scope="col">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($qualification as $key=>$qlf)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $qlf->course }}</td>
                                                        <td>{{ $qlf->college }}</td>
                                                        <td>{{ $qlf->year }}</td>
                                                        <td>{{ $qlf->place }}</td>
                                                        <td> 
                                                            <a href="/admin/remove-qualification/{{ $qlf->id}}" class="btn btn-icon btn-2 btn-primary" type="button">
                                                                <span class="btn-inner--icon"><i class="ni ni-fat-remove text-white"></i></span> 
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                @endif
                            </div> 
                        </div>
                    </div>
                    <div class="tab-pane fade @if($active == 3) show active @endif" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0">Update Staff Details</h3>
                            </div> 
                            <div class="card-body">
                                <hr>
                                <form method="POST" action="{{ route('admin.updateStaff') }}">
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
                                                <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" placeholder="Date of Birth" value="   " required="">
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
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group mb-1 @error('age') has-danger @enderror">
                                                    <label class="form-control-label" for="">Age</label>
                                                    <div class="input-group"> 
                                                        <input type="number" class="form-control @error('age') is-invalid @enderror" name="age" placeholder="Age"  value="{{ $staff[0]->age }}" required="">
                                                    </div>
                                                </div>
                                                @error('age')
                                                    <div class="invalid-text">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div> 
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
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4">
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
                                        <div class="col-md-4 mb-3">
                                            <small class="text-warning">Enter password only if you need to change it...</small> 
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
                                    </div>   
                                    <div>
                                        <button class="btn btn-primary btn-small" type="submit">Update Staff</button>
                                    </div>
                                </form>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection