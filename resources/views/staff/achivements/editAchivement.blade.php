@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="/staff/achivements/{{$achive->id}}" method="POST">
            @method("PUT")
                @csrf
                <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Name  </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter the Name" name="name" value="{{ $achive->name }}">    
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
                                placeholder="Enter the Department" name="department" value="{{ $achive->dept }}">    
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
                                placeholder="Enter the Date" name="date" value="{{ $achive->date }}">    
                            @error('date')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Achive</label>
                            <input type="text" class="form-control @error('achive') is-invalid @enderror"
                                placeholder="Enter the Achive" name="achive" value="{{ $achive->achive }}">    
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
                                placeholder="Enter the Place" name="place" value="{{ $achive->place }}">    
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
                                placeholder="Enter the Organisation" name="organisation" value="{{ $achive->organisation }}">    
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
                                placeholder="Enter of Nature" name="nature" value="{{ $achive->nature }}">    
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
                                placeholder="Enter the Guided By" name="guide" value="{{ $achive->guidedBy }}">    
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
                            value="{{ $achive->level }}">
                                <option @if($achive->level == "Inter National Level") selected @endif>Inter National Level</option>
                                <option @if($achive->level == "National Level") selected @endif>National Level</option>
                                <option @if($achive->level == "State Level") selected @endif>State Level</option>
                                <option @if($achive->level == "University Level") selected @endif>University Level</option>
                                <option @if($achive->level == "College Level") selected @endif>College Level</option>
                            </select>   
                            @error('level')
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