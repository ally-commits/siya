@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" />
@endsection

@section('js') 
    <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
@endsection
@section('content')
    <div class="card"> 
        <div class="card-header d-flex" style="justify-content: space-between;">
            <h3 class="mb-0">Staff Details</h3>
            <a href="{{route('admin.addStaff')}}" class="btn btn-primary">Add Staff</a>
        </div>
        <div class="container">
        <div class="table-responsive p-4">
            <div class="row">
                <div class="col-sm-12 px-0">
                    <table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                    <thead class="thead-light">
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 77px;">Sl No</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 140px;">Username</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 160px;">Created At</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 63px;">Action</th>
                        </tr>
                    </thead> 
                        <tbody>
                            @foreach($staffs  as $key=>$staff)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$staff->name}}</td>
                                    <td>{{$staff->email}}</td>
                                    <td>{{ substr($staff->created_at,0,10) }}</td>
                                    <td class="table-actions"> 
                                    
                                        <button type="button" class="table-action" style="background: none; border: none;outline: none;" data-toggle="modal" data-target="#model-{{$staff->id}}-view">
                                            <i class="ni ni-app"></i>
                                        </button>
                                        <button type="button" class="table-action" style="background: none; border: none;outline: none;" data-toggle="modal" data-target="#model-{{$staff->id}}-qualification">
                                            <i class="ni ni-fat-add"></i>
                                        </button>
                                        <button type="button" class="table-action" style="background: none; border: none;outline: none;" data-toggle="modal" data-target="#model-{{$staff->id}}">
                                            <i class="fas fa-user-edit"></i>
                                        </button>
                                        <a href="delete-staff/{{$staff->id}}" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete Staff">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>

                                    <div class="modal fade" id="model-{{$staff->id}}-qualification" tabindex="-1" role="dialog" aria-labelledby="model-{{$staff->id}}-qualification" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="mb-0">Add Educational Details</h3>
                                                            <form action="{{ route('admin.addStaffQualification') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="userId" value="{{ $staff->id }}">
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="model-{{$staff->id}}" tabindex="-1" role="dialog" aria-labelledby="model-{{$staff->id}}" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="mb-0">Update Staff Details</h3>
                                                        </div> 
                                                        <div class="card-body">
                                                            <hr>
                                                            <form method="POST" action="{{ route('admin.updateStaff') }}">
                                                            @csrf
                                                                <div class="form-row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group mb-1 @error('name') has-danger @enderror" >
                                                                            <label class="form-control-label" for="">Staff name</label>
                                                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Staff name" value="{{ $staff->name }}" required="">
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
                                                                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Username"  value="{{ $staff->email }}" required="">
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
                                                                            <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" placeholder="Date of Birth" value="{{ $staff->dob }}" required="">
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
                                                                            <select class="form-control @error('gender') invalid-form @enderror" value="{{ $staff->gender }}" name="gender">
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
                                                                            value="{{ $staff->department}}">
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
                                                                    <div class="col-md-4 mb-3">
                                                                        <div class="form-group mb-1 @error('expirence') has-danger @enderror">
                                                                            <label class="form-control-label">Years Of Expirence</label>
                                                                            <input type="number" value="{{ $staff->expirence }}" class="form-control @error('expirence') is-invalid @enderror" name="expirence" placeholder="expirence" required="">
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
                                                                            <textarea name="address" rows="6" class="form-control  @error('address') is-invalid @enderror">{{ $staff->address}}</textarea>
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
                                                                                    <input type="number" class="form-control @error('age') is-invalid @enderror" name="age" placeholder="Age"  value="{{ $staff->age }}" required="">
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
                                                                                value="{{ $staff->bloodGroup }}">
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
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group mb-1 @error('phoneNumber') has-danger @enderror" >
                                                                            <label class="form-control-label" for="">Phone Number</label>
                                                                            <input type="text" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" placeholder="Phone Number" value="{{ $staff->phoneNumber }}" required="">
                                                                        </div>
                                                                        @error('phoneNumber')
                                                                            <div class="invalid-text">
                                                                                <strong>{{ $message }}</strong>
                                                                            </div>
                                                                        @enderror
                                                                    </div> 
                                                                    <div class="col-md-4 mb-3">
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
                                                                    <div class="col-md-4 mb-3">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="model-{{$staff->id}}-view" tabindex="-1" role="dialog" aria-labelledby="model-{{$staff->id}}-view" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="card">
                                                        <div class="card-header"> 
                                                            <div class="row" id="profile">
                                                                <div class="col-md-12 d-flex" style="justify-content: space-between;">
                                                                    <h1>Staff Profile</h1>
                                                                    <button class="btn btn-primary" id="btn-click" data-toggle="modal" data-target="#model-{{$staff->id}}">Edit Profile</button>
                                                                </div>  
                                                                <div class="container emp-profile"> 
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="profile-img">
                                                                                    <img src="{{ asset($staff->image) }}" alt=""/>                                     
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="profile-head">
                                                                                    <h5>
                                                                                        {{ $staff->name}}
                                                                                    </h5>
                                                                                    <h6>
                                                                                        {{ $staff->address}}
                                                                                    </h6> 
                                                                                    <div class="nav-wrapper">
                                                                                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                                                                            <li class="nav-item">
                                                                                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Profile</a>
                                                                                            </li>
                                                                                            <li class="nav-item">
                                                                                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Qualification</a>
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
                                                                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <label>User Id</label>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <p>{{ $staff->email}}</p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <label>Name</label>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <p>{{ $staff->name}}</p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <label>Date Of Birth</label>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <p>{{ $staff->dob}}</p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <label>Phone</label>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <p>{{ $staff->phoneNumber}}</p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <label>Department</label>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <p>{{ $staff->department}}</p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <label>Gender</label>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <p>{{ $staff->gender}}</p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <label>Blood group</label>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <p>{{ $staff->bloodGroup}}</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="tab-pane fade show" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                                                                        <div>
                                                                                        @if(count($qualification) == 0)
                                                                                            <h3 class="text-center">
                                                                                                No Qualification Found
                                                                                            </h3>
                                                                                            <a  data-toggle="modal" data-target="#model-{{$staff->id}}-qualification" class="btn btn-primary text-center">Add One</a>
                                                                                        @else 
                                                                                            <div class="table">
                                                                                                <div>
                                                                                                <div class="align-items-center d-flex" style="flex-direction: column;"> 
                                                                                                    <div class="d-flex w-100 mb-4" style="font-weight: bold;justify-content: flex-start;">
                                                                                                        <div style="flex:1;">
                                                                                                            Sl No
                                                                                                        </div>
                                                                                                        <div style="flex:2;">
                                                                                                            Course
                                                                                                        </div>
                                                                                                        <div style="flex: 5">
                                                                                                            College
                                                                                                        </div> 
                                                                                                        <div style="flex: 3">
                                                                                                            Year of passing
                                                                                                        </div>
                                                                                                        <div style="flex:2;">
                                                                                                            Place
                                                                                                        </div>
                                                                                                        <div style="flex: 2;">
                                                                                                            Action
                                                                                                        </div>
                                                                                                    </div>  
                                                                                                    @foreach($qualification as $key=>$qlf)
                                                                                                    @if($qlf->userId == $staff->userId)
                                                                                                        <div class="d-flex w-100" style="justify-content: space-between;">
                                                                                                            <div style="flex:1;">{{ $key+1 }}</div>
                                                                                                            <div style="flex:2;">{{ $qlf->course }}</div>
                                                                                                            <div style="flex:5;">{{ $qlf->college }}</div>
                                                                                                            <div style="flex:3;">{{ $qlf->year }}</div>
                                                                                                            <div style="flex:2;">{{ $qlf->place }}</div>
                                                                                                            <div style="flex:2;"> 
                                                                                                                <a href="/admin/remove-qualification/{{ $qlf->id}}" class="btn btn-icon btn-2 btn-primary" type="button">
                                                                                                                    <span class="btn-inner--icon"><i class="ni ni-fat-remove text-white"></i></span> 
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="border-bottom"></div>
                                                                                                    @endif
                                                                                                    @endforeach 
                                                                                                </table>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>     
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div>
                                            <div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection