@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="{{ route('seminarOrganised.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Enter the Title" name="title" value="{{ old('title') }}">    
                            @error('title')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Collab Agency</label>
                            <input type="text" class="form-control @error('collabAgency') is-invalid @enderror"
                                placeholder="Enter the collab Agency" name="collabAgency" value="{{ old('collabAgency') }}">    
                            @error('collabAgency')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Department</label>
                            <input type="text" class="form-control @error('department') is-invalid @enderror"
                                placeholder="Enter the Department" name="department" value="{{ old('department') }}">    
                            @error('department')
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
                            <label for="">Enter the Speaker</label>
                            <input type="text" class="form-control @error('speaker') is-invalid @enderror"
                                placeholder="Enter the Speaker" name="speaker" value="{{ old('speaker') }}">    
                            @error('speaker')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>  
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Place & Designation</label>
                            <input type="text" class="form-control @error('place') is-invalid @enderror"
                                placeholder="Enter the Place & Designation" name="place" value="{{ old('place') }}">    
                            @error('place')
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
                                placeholder="Enter the Beneficiaries" name="beneficiaries" value="{{ old('beneficiaries') }}">    
                            @error('beneficiaries')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Topic</label>
                            <input type="text" class="form-control @error('topic') is-invalid @enderror"
                                placeholder="Enter the Topic" name="topic" value="{{ old('topic') }}">    
                            @error('topic')
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
                    <div class="col-md-3">
                        
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit Value</button>
            </form>
        </div>
    </div>
</div>
@endsection