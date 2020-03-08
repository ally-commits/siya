@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
        <h6>Edit Guest Lecture</h6>
        </div>
        <div class="card-body">
            <form action="/admin/staffActivity/{{$staffId}}/guestLecture/{{$lecture->id}}" method="POST">
                @method("PUT")
                @csrf
                <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Resource Person</label>
                            <input type="text" class="form-control @error('resourcePerson') is-invalid @enderror"
                                placeholder="Enter the resourcePerson" name="resourcePerson" value="{{ $lecture->resourcePerson }}">    
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
                                placeholder="Enter the Date" name="date" value="{{ $lecture->date }}">    
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
                                placeholder="Enter the Designation" name="designation" value="{{ $lecture->designation }}">    
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
                                placeholder="Enter Place" name="place" value="{{ $lecture->place }}">    
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
                                placeholder="Enter topic" name="topic" value="{{ $lecture->topic }}">    
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
                                placeholder="Enter department" name="department" value="{{ $lecture->department }}">    
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
                                placeholder="Enter Beneficiaries" name="beneficiaries" value="{{ $lecture->beneficiaries }}">    
                            @error('beneficiaries')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>  

                </div>
                <button type="submit" class="btn btn-primary">Udpate Value</button>
            </form>
        </div>
    </div>
</div>
@endsection