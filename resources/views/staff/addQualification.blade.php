@extends('layouts.app')

@section('content')
    <div class="card p-4">
        <h3>Add Your Qualification's here</h3>
        <form action="{{ route('staffAddQualification') }}" method="POST">
        @csrf
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
@endsection