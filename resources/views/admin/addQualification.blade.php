@extends("layouts.admin")

@section("content")
<div class="card">
    <div class="card-header">
        <h3 class="mb-0">Add Educational Details</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.addStaffQualification') }}" method="POST">
            @csrf
            <input type="hidden" name="userId" value="{{ $userId }}">
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
                <table class="table" style="font-size: 15px;">
                    <thead style="font-weight: bold;">
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
                                    <a href="/admin/remove-qualification/{{ $qlf->id}}" data-toggle="tooltip" data-original-title="Delete Qualification" >
                                        <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        @endif
    </div> 
</div>
@endsection