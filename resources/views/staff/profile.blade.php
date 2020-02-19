@extends("layouts.app")

@section('js')
    <script src="{{ asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    
@endsection
@section('content')
    <div class="card p-4">
        @if($newUser)
            <h4 class="text-center text-danger">Your Profile is Not complete. Please complete your profile</h4>
        @endif
        <div class="p-1">
            @if($newUser)
                <h2>Add Deatils</h2>
                <form action="{{ route('staffAddProfile') }}" method="POST"  enctype="multipart/form-data">
            @else 
                <div style="display: none;" id="form"> 
                <div class="d-flex mb-5o" style="justify-content: space-between;">
                    <h1>Edit Your Profile</h1>
                    <button class="btn btn-primary" id="btn-profile">View Profile</button>
                </div>
                <form action="{{ route('staffEditProfile') }}" method="POST"  enctype="multipart/form-data">
            @endif
                @csrf  
                    <div class="row">                   
                        <div class="col-md-4">                          
                            <div class="form-group">
                                <label for="">Enter Your Date of Birth</label>
                                <input type="date" class="form-control @error('dob') invalid-form @enderror"
                                    placeholder="Enter Your Date of Birth" name="dob" value="{{ $newUser ? old('dob') : $profile[0]->dob }}">    
                                @error('dob')
                                    <span class="invalid-text" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror 
                            </div>
                        </div> 
                        <div class="col-md-4">                          
                            <div class="form-group">
                                <label for="">Enter Your Phone Number</label>
                                <input type="number" class="form-control @error('phoneNumber') invalid-form @enderror"
                                    placeholder="Enter Your Phone Number" name="phoneNumber" value="{{ $newUser ? old('phoneNumber') : $profile[0]->phoneNumber  }}">    
                                @error('phoneNumber')
                                    <span class="invalid-text" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="col-md-4">                          
                            <div class="form-group">
                                <label for="">Select your Gender</label>
                                <select class="form-control @error('gender') invalid-form @enderror" value="{{ $newUser ? old('gender') :$profile[0]->gender  }}" name="gender">
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
                        <div class="col-md-8">                          
                            <div class="form-group">
                                <label for="">Enter your Address</label>
                                <textarea name="address" id="" cols="30" rows="10" class="form-control @error('address') invalid-form @enderror"
                                    >{{ $newUser ? old('address') : $profile[0]->address  }}</textarea>
                                @error('address')
                                    <span class="invalid-text" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror 
                            </div>
                        </div>  
                        <div class="row col-md-4" style="flex-direction: row;">
                            <div class="col-md-12">                          
                                <div class="form-group">
                                    <label for="">Select Profile Picture</label>
                                    <input type="file" class="form-control @error('image') invalid-form @enderror" name="image" 
                                    value="{{ old('image') }}" />
                                    @error('image')
                                        <span class="invalid-text" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror 
                                </div>
                            </div>
                            <div class="col-md-12">                          
                                <div class="form-group">
                                    <label for="">Select your Department</label>
                                    <select class="form-control @error('department') invalid-form @enderror" name="department" 
                                    value="{{ $newUser ? old('department') : $profile[0]->department }}">
                                        <option>BCA</option>
                                        <option>BSC</option>
                                        <option>B COm</option>
                                    </select>   
                                    @error('department')
                                        <span class="invalid-text" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror 
                                </div>
                            </div>
                            <div class="col-md-12">                          
                                <div class="form-group">
                                    <label for="">Select your Blood Group</label>
                                    <select class="form-control @error('bloodGroup') invalid-form @enderror" name="bloodGroup"
                                    value="{{ $newUser ? old('phoneNumber') : $profile[0]->phoneNumber }}">
                                        <option>A pos+</option>
                                        <option>A neg-</option>
                                        <option>B pos+</option>
                                        <option>B neg-</option>
                                        <option>O pos-</option>
                                        <option>O neg-</option>
                                    </select>   
                                    @error('bloodGroup')
                                        <span class="invalid-text" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror 
                                </div>
                            </div>   
                        </div>
                        <div>
                            <button class="btn btn-primary">
                                @if($newUser)
                                    Add Profile
                                @else
                                    Edit Profile
                                @endif
                            </button>
                        </div>
                    </div>
                </form>
            @if(!$newUser)
                </div>
            @endif
        </div> 

        @if(!$newUser)
            <div class="row" id="profile">
                <div class="col-md-12 d-flex" style="justify-content: space-between;">
                    <h1>Your Profile</h1>
                    <button class="btn btn-primary" id="btn-click">Edit Profile</button>
                </div>  
                <div class="container emp-profile"> 
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img src="{{ asset($profile[0]->image) }}" alt=""/>                                     
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="profile-head">
                                    <h5>
                                        {{ Auth::user()->name}}
                                    </h5>
                                    <h6>
                                        {{ $profile[0]->address}}
                                    </h6> 
                                    <div class="nav-wrapper">
                                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link mb-sm-3 mb-md-0 @if($active ==1) active @endif" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Profile</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link mb-sm-3 mb-md-0 @if($active ==2) active @endif" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Qualification</a>
                                            </li> 
                                        </ul>
                                    </div>
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
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show @if($active == 1) active @endif" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ Auth::user()->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date Of Birth</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $profile[0]->dob}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $profile[0]->phoneNumber}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Department</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $profile[0]->department}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $profile[0]->gender}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Blood group</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $profile[0]->bloodGroup}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show @if($active == 2) active @endif" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                        <div>
                                            @if(count($qualification) == 0)
                                                <h3 class="text-center">
                                                    No Qualification Found
                                                </h3>
                                                <a  href="/staff/qualification" class="btn btn-primary text-center">Add One</a>
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
                                                                        <a href="/staff/remove-qualification/{{ $qlf->id}}" class="btn btn-icon btn-2 btn-primary" type="button">
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
                            </div>
                        </div>     
                </div>
            </div>
        @endif
    </div>
@endsection