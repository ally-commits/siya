@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="d-flex" style="justify-content: space-between; align-items: center;">
            <h4>Edit Staff Seminar Attended</h4>
            <a href="/admin/staffActivity/1" class="btn btn-info"><i class="ti-angle-double-left text-white"></i></a>
        </div>
        <div class="card-body">
            <form action="/admin/staffActivity/{{ $staffId }}/seminarAttended/{{$seminar->id}}" method="POST">
                @method("PUT")
                @csrf
                <div class="row">
                <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Select Seminar/Workshop/Conference </label>
                            <select class="form-control @error('type') is-invalid @enderror" name="type"
                            value="{{$seminar->type }}">
                                <option @if($seminar->type == "Seminar") selected @endif>Seminar</option>
                                <option @if($seminar->type == "Workshop") selected @endif>Workshop</option>
                                <option @if($seminar->type == "Conference") selected @endif>Conference</option> 
                            </select>   
                            @error('type')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter the Name" name="name" value="{{ $seminar->name }}">    
                            @error('name')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Prize</label>
                            <input type="text" class="form-control @error('prize') is-invalid @enderror"
                                placeholder="Enter the Prize" name="prize" value="{{ $seminar->prize }}">    
                            @error('prize')
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
                                placeholder="Enter the Date" name="date" value="{{ $seminar->date }}">    
                            @error('date')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Enter the Title" name="title" value="{{ $seminar->title }}">    
                            @error('title')
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
                                placeholder="Type of Department" name="dept" value="{{ $seminar->dept }}">    
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
                                placeholder="Enter the Place" name="place" value="{{ $seminar->place }}">    
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
                            value="{{ $seminar->level }}">
                                <option @if($seminar->level == "Inter National Level") selected @endif>Inter National Level</option>
                                <option @if($seminar->level == "National Level") selected @endif>National Level</option>
                                <option @if($seminar->level == "State Level") selected @endif>State Level</option>
                                <option @if($seminar->level == "University Level") selected @endif>University Level</option>
                                <option @if($seminar->level == "College Level") selected @endif>College Level</option>
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