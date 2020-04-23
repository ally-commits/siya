@extends("layouts.app")
 
@section('content') 
<div class="container">
        <div class="row" id="profile">
            <div class="col-md-12 d-flex py-1" style="justify-content: space-between;align-items: center;">
                <h5>Your Profile</h5>
                <a class="btn btn-primary text-white" href="/staff/edit-profile" type="button">Edit Profile</a>
            </div>  
            <hr>
            <div class="container emp-profile py-1"> 
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="{{ asset($staff[0]->image) }}" class="img-fluid" style="width: 200px;"/>                                     
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <h5>
                                {{ $staff[0]->name}}
                            </h5>
                            <h6>
                                Address: {{ $staff[0]->address}}
                            </h6>  
                        </div> 
                    </div>  
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">  
                        <div class="row">
                            <div class="col-md-6">
                                <label>User Name</label>
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
        <hr>
        <div class="container">
            @if(count($qualification) == 0)
                <h3 class="text-center">
                    No Qualification Found
                </h3> 
            @else 
                <table class="table table-bordered mb-0" style="font-size: 15px;">
                    <thead class="thead-light">
                        <tr>
                            <th>Sl No</th>
                            <th>Course</th>
                            <th>College Name</th>
                            <th>Year Of Passing</th>
                            <th>Place</th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            @endif
        </div>

    </div>
@endsection