@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="d-flex" style="justify-content: space-between; align-items: center;">
            <h4>Edit <span class="text-capitalize">{{ $type}}</span> Papers Presented</h4>
            <a onclick="goBack()" class="btn btn-primary"><i class="ti-angle-double-left text-white"></i></a>
        </div>
        <div class="card-body">
            <form action="/admin/staffActivity/{{$type}}/{{$staffId}}/papers/{{$paper->id}}" method="POST">
                @method("PUT")
                @csrf
                <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Select Conference/Workshop/Symposia/Meeting</label>
                            <select class="form-control @error('type') is-invalid @enderror" name="type"
                            value="{{$paper->type }}">
                                <option @if($paper->type == "Conference") selected @endif>Conference</option>
                                <option @if($paper->type == "Workshop") selected @endif>Workshop</option>
                                <option @if($paper->type == "Symposia") selected @endif>Symposia</option>
                                <option @if($paper->type == "Meeting") selected @endif>Meeting</option> 
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
                            <label for="">Enter the Name of the Conference</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter the Name of Paper" name="name" value="{{ $paper->name }}">    
                            @error('name')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the theme</label>
                            <input type="text" class="form-control @error('theme') is-invalid @enderror"
                                placeholder="Enter the theme" name="theme" value="{{ $paper->theme }}">    
                            @error('theme')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Venue</label>
                            <input type="text" class="form-control @error('venue') is-invalid @enderror"
                                placeholder="Enter the Venue" name="venue" value="{{ $paper->venue }}">    
                            @error('venue')
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
                                placeholder="Type of Department" name="dept" value="{{ $paper->dept }}">    
                            @error('dept')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                placeholder="date" name="date" value="{{ $paper->date }}">    
                            @error('date')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>  
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Nature</label>
                            <input type="text" class="form-control @error('nature') is-invalid @enderror"
                                placeholder="Enter the Nature" name="nature" value="{{ $paper->nature }}">    
                            @error('nature')
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
                                placeholder="Enter the Title" name="title" value="{{ $paper->title }}">    
                            @error('title')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Prizes</label>
                            <input type="text" class="form-control @error('prize') is-invalid @enderror"
                                placeholder="Enter the Prizes" name="prize" value="{{ $paper->prizes }}">    
                            @error('prize')
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