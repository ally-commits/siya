@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
        <h6>Add Major Prgramme</h6>
        </div>
        <div class="card-body">
            <form action="/staff/majorProgram" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Duration</label>
                            <input type="time" class="form-control @error('duration') is-invalid @enderror"
                                placeholder="Enter the Duration" name="duration" value="{{ old('duration') }}">    
                            @error('duration')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>  
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Programme</label>
                            <input type="text" class="form-control @error('programme') is-invalid @enderror"
                                placeholder="Enter the Programme" name="programme" value="{{ old('programme') }}">    
                            @error('programme')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>  
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Faculty Association</label>
                            <input type="text" class="form-control @error('facultyAssociation') is-invalid @enderror"
                                placeholder="Enter the facultyAssociation" name="facultyAssociation" value="{{ old('facultyAssociation') }}">    
                            @error('facultyAssociation')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the No Of Beneficiaries</label>
                            <input type="number" class="form-control @error('noOfBeneficiaries') is-invalid @enderror"
                                placeholder="Enter the No of Beneficiaries" name="noOfBeneficiaries" value="{{ old('noOfBeneficiaries') }}">    
                            @error('noOfBeneficiaries')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Level </label>
                            <select class="form-control @error('level') is-invalid @enderror" name="level"
                            value="{{old('level') }}">
                                <option>Inter National Level</option>
                                <option>National Level</option>
                                <option>State Level</option>
                                <option>University Level</option>
                                <option>College Level</option>
                            </select>   
                            @error('level')
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

                </div>
                <button type="submit" class="btn btn-primary">Submit Value</button>
            </form>
        </div>
    </div>
</div>
@endsection