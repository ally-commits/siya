@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="d-flex" style="justify-content: space-between; align-items: center;">
            <h4>Edit Staff Association Program</h4>
            <a href="/admin/staffActivity/1" class="btn btn-info"><i class="ti-angle-double-left text-white"></i></a>
        </div>
        <div class="card-body">
            <form action="/admin/staffActivity/{{$staffId}}/association/{{$program->id}}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Name of the Program</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter the Name of Program" name="name" value="{{ $program->name }}">    
                            @error('name')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Number of Students</label>
                            <input type="number" class="form-control @error('num') is-invalid @enderror"
                                placeholder="Enter the Number of Student" name="num" value="{{  $program->NumberOfStudents }}">    
                            @error('num')
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
                                placeholder="Enter the Date" name="date" value="{{  $program->date }}">    
                            @error('date')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Guest Name</label>
                            <input type="text" class="form-control @error('guest') is-invalid @enderror"
                                placeholder="Enter the name of Guest" name="guest" value="{{  $program->guest }}">    
                            @error('guest')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Nature of thr Program</label>
                            <input type="text" class="form-control @error('nature') is-invalid @enderror"
                                placeholder="Nature of the Program" name="nature" value="{{  $program->nature }}">    
                            @error('nature')
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
                                placeholder="Enter the Place" name="place" value="{{  $program->place }}">    
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
                            value="{{ $program->level }}">
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
                    <div class="col-md-3">
                        
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Value</button>
            </form>
        </div>
    </div>
</div>
@endsection