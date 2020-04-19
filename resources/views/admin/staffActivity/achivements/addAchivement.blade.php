@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="d-flex" style="justify-content: space-between; align-items: center;">
            <h4>Add Staff Achievements</h4>
            <a href="/admin/staffActivity/1" class="btn btn-info"><i class="ti-angle-double-left text-white"></i></a>
        </div>
        <div class="card-body">
            <form action="/admin/staffActivity/{{ $staffId }}/achivements" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Name  </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter the Name" name="name" value="{{ old('name') }}">    
                            @error('name')
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
                            <label for="">Enter the Achievement</label>
                            <input type="text" class="form-control @error('achive') is-invalid @enderror"
                                placeholder="Enter the Achievement" name="achive" value="{{ old('achive') }}">    
                            @error('achive')
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
                            <label for="">Enter the Organisation</label>
                            <input type="text" class="form-control @error('organisation') is-invalid @enderror"
                                placeholder="Enter the Organisation" name="organisation" value="{{ old('organisation') }}">    
                            @error('organisation')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Nature</label>
                            <input type="text" class="form-control @error('nature') is-invalid @enderror"
                                placeholder="Enter of Nature" name="nature" value="{{ old('nature') }}">    
                            @error('nature')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Guided By</label>
                            <input type="text" class="form-control @error('guide') is-invalid @enderror"
                                placeholder="Enter the Guided By" name="guide" value="{{ old('guide') }}">    
                            @error('guide')
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