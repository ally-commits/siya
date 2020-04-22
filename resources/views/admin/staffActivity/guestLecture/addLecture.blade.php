@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="d-flex" style="justify-content: space-between; align-items: center;">
            <h4>Add <span class="text-capitalize">{{ $type}}</span> guest Lecture</h4>
            <a onclick="goBack()" class="btn btn-primary"><i class="ti-angle-double-left text-white"></i></a>
        </div>
        <div class="card-body">
            <form action="/admin/staffActivity/{{$type}}/{{$staffId}}/guestLecture" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Resource Person</label>
                            <input type="text" class="form-control @error('resourcePerson') is-invalid @enderror"
                                placeholder="Enter the resourcePerson" name="resourcePerson" value="{{ old('resourcePerson') }}">    
                            @error('resourcePerson')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>  
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                placeholder="Enter the Date" name="date" value="{{ old('date') }}">    
                            @error('date')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Designation</label>
                            <input type="text" class="form-control @error('designation') is-invalid @enderror"
                                placeholder="Enter the Designation" name="designation" value="{{ old('designation') }}">    
                            @error('designation')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Place</label>
                            <input type="text" class="form-control @error('place') is-invalid @enderror"
                                placeholder="Enter Place" name="place" value="{{ old('place') }}">    
                            @error('place')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>  
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the topic</label>
                            <input type="text" class="form-control @error('topic') is-invalid @enderror"
                                placeholder="Enter topic" name="topic" value="{{ old('topic') }}">    
                            @error('topic')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>  
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the department</label>
                            <input type="text" class="form-control @error('department') is-invalid @enderror"
                                placeholder="Enter department" name="department" value="{{ old('department') }}">    
                            @error('department')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>  
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Beneficiaries</label>
                            <input type="text" class="form-control @error('beneficiaries') is-invalid @enderror"
                                placeholder="Enter Beneficiaries" name="beneficiaries" value="{{ old('beneficiaries') }}">    
                            @error('beneficiaries')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>  

                </div>
                <button type="submit" class="btn btn-primary">Submit Value</button>
            </form>
        </div>
    </div>
</div>
@endsection