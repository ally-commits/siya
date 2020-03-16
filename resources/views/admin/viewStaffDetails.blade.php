@extends("layouts.admin")

@section('content')
    <div style="padding-top: 10px;"></div>
    <div class="container">
        <div class="row" id="profile">
            <div class="col-md-12 d-flex" style="justify-content: space-between;align-items: center;">
                <h5>Staff Profile</h5>
                <a class="btn btn-primary text-white" href="/admin/edit-staff/{{ $userId}}" type="button">Edit Profile</a>
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
@endsection