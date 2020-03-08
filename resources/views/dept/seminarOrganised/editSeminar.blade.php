@extends('layouts.dept')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="/dept/deptSeminarOrganised/{{$seminar->id}}" method="POST">
                @method("PUT")
                @csrf
                <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Enter the Title" name="title" value="{{ $seminar->title }}">    
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
                                placeholder="Enter the collab Agency" name="collabAgency" value="{{ $seminar->collabAgency  }}">    
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
                                placeholder="Enter the Department" name="department" value="{{ $seminar->department }}">    
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
                            <label for="">Enter the Speaker</label>
                            <input type="text" class="form-control @error('speaker') is-invalid @enderror"
                                placeholder="Enter the Speaker" name="speaker" value="{{ $seminar->speaker }}">    
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
                                placeholder="Enter the Place & Designation" name="place" value="{{ $seminar->placeAndDesignation }}">    
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
                                placeholder="Enter the Beneficiaries" name="beneficiaries" value="{{ $seminar->beneficiaries }}">    
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
                                placeholder="Enter the Topic" name="topic" value="{{ $seminar->topic }}">    
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
                            value="{{ $seminar
                            ->level }}">
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
                <button type="submit" class="btn btn-primary">Submit Value</button>
            </form>
        </div>
    </div>
</div>
@endsection