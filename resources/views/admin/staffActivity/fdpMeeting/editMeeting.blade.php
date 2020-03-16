@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="d-flex" style="justify-content: space-between; align-items: center;">
            <h4>Edit Staff Fdp Meeting</h4>
            <a href="/admin/staffActivity/1" class="btn btn-info"><i class="ti-angle-double-left text-white"></i></a>
        </div>
        <div class="card-body">
            <form action="/admin/staffActivity/{{$staffId}}/fdpMeeting/{{$meeting->id}}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Name of the Meeting</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter the Name of Meeting" name="name" value="{{ $meeting->name }}">    
                            @error('name')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 

                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Organisers</label>
                            <input type="text" class="form-control @error('organiser') is-invalid @enderror"
                                placeholder="Enter the Organisers" name="organiser" value="{{ $meeting->organisers }}">    
                            @error('organiser')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">From</label>
                            <input type="date" class="form-control @error('from') is-invalid @enderror"
                                placeholder="From" name="from" value="{{ $meeting->from }}">    
                            @error('from')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">To</label>
                            <input type="date" class="form-control @error('to') is-invalid @enderror"
                                placeholder="to" name="to" value="{{ $meeting->to }}">    
                            @error('to')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Type of Meeting</label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror"
                                placeholder="Type of Meeting" name="type" value="{{ $meeting->typeOfMeeting }}">    
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
                                placeholder="Type of Department" name="dept" value="{{ $meeting->department }}">    
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
                                placeholder="Enter the Place" name="place" value="{{ $meeting->place }}">    
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
                            value="{{$meeting->level }}">
                                <option @if($meeting->level == "Inter National Level") selected @endif>Inter National Level</option>
                                <option @if($meeting->level == "National Level") selected @endif>National Level</option>
                                <option @if($meeting->level == "State Level") selected @endif>State Level</option>
                                <option @if($meeting->level == "University Level") selected @endif>University Level</option>
                                <option @if($meeting->level == "College Level") selected @endif>College Level</option>
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
                            <label for="">Enter the Description</label>
                            <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" cols="30" rows="2">{{$meeting->desc}}</textarea>

                            @error('desc')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-3">
                        
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update FDP Meeting</button>
            </form>
        </div>
    </div>
</div>
@endsection