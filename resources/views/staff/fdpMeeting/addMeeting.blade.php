@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="{{ route('fdpMeeting.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Name of the Meeting</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter the Name of Meeting" name="name" value="{{ old('name') }}">    
                            @error('name')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
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
                            <label for="">Enter the Organisers</label>
                            <input type="text" class="form-control @error('organiser') is-invalid @enderror"
                                placeholder="Enter the Organisers" name="organiser" value="{{ old('organiser') }}">    
                            @error('organiser')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Type of Meeting</label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror"
                                placeholder="Type of Meeting" name="type" value="{{ old('type') }}">    
                            @error('type')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Department</label>
                            <input type="text" class="form-control @error('dept') is-invalid @enderror"
                                placeholder="Type of Department" name="dept" value="{{ old('dept') }}">    
                            @error('dept')
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
                                placeholder="Enter the Place" name="place" value="{{ old('place') }}">    
                            @error('place')
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