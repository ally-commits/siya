@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
        <h6>Edit Major Prgramme</h6>
        </div>
        <div class="card-body">
            <form action="/staff/majorProgram/{{$program->id}}" method="POST">
                @method("PUT")
                @csrf
                <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Duration</label>
                            <input type="time" class="form-control @error('duration') is-invalid @enderror"
                                placeholder="Enter the Duration" name="duration" value="{{ $program->duration }}">    
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
                                placeholder="Enter the Programme" name="programme" value="{{ $program->programme }}">    
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
                                placeholder="Enter the facultyAssociation" name="facultyAssociation" value="{{ $program->facultyAssociation }}">    
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
                                placeholder="Enter the No of Beneficiaries" name="noOfBeneficiaries" value="{{ $program->noOfBeneficiaries }}">    
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
                            value="{{$program->level }}">
                                <option @if($program->level == "Inter National Level") selected @endif>Inter National Level</option>
                                <option @if($program->level == "National Level") selected @endif>National Level</option>
                                <option @if($program->level == "State Level") selected @endif>State Level</option>
                                <option @if($program->level == "University Level") selected @endif>University Level</option>
                                <option @if($program->level == "College Level") selected @endif>College Level</option>
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
                                placeholder="Enter department" name="department" value="{{ $program->department }}">    
                            @error('department')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>   

                </div>
                <button type="submit" class="btn btn-primary">Update Value</button>
            </form>
        </div>
    </div>
</div>
@endsection