@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
        <h6>Add Publication</h6>
        </div>
        <div class="card-body">
            <form action="/staff/publication" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Name of the Journal</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter the Name" name="name" value="{{ old('name') }}">    
                            @error('name')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Name of the staff</label>
                            <input type="text" class="form-control @error('staffname') is-invalid @enderror"
                                placeholder="Enter the Name" name="staffname" value="{{ old('staffname') }}">    
                            @error('staffname')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Collaboration</label>
                            <input type="text" class="form-control @error('collab') is-invalid @enderror"
                                placeholder="Enter the Collaboration" name="collab" value="{{ old('collab') }}">    
                            @error('collab')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>  
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Indexing</label>
                            <input type="text" class="form-control @error('index') is-invalid @enderror"
                                placeholder="Enter the Indexing" name="index" value="{{ old('index') }}">    
                            @error('index')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>  
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Subject</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                placeholder="Enter the Subject" name="subject" value="{{ old('subject') }}">    
                            @error('subject')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>  
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Number of Pages</label>
                            <input type="number" class="form-control @error('pages') is-invalid @enderror"
                                placeholder="Enter the pages" name="pages" value="{{ old('pages') }}">    
                            @error('pages')
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
                                placeholder="date" name="date" value="{{ old('date') }}">    
                            @error('date')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>  
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Check the ISSN / ISBN</label>
                            <div class="row px-3">
                                ISSN : <input type="radio" class="mr-5 @error('type') is-invalid @enderror"
                                    placeholder="Enter the ISSN / ISBN" name="type" value="ISSN" checked> 
                                
                                ISBN: <input type="radio" class=" @error('type') is-invalid @enderror"
                                    placeholder="Enter the ISSN / ISBN" name="type" value="ISBN">
                            </div>    
                            @error('type')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Issues</label>
                            <input type="text" class="form-control @error('issues') is-invalid @enderror"
                                placeholder="Enter the Issues" name="issues" value="{{ old('issues') }}">    
                            @error('issues')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Volume</label>
                            <input type="text" class="form-control @error('volume') is-invalid @enderror"
                                placeholder="Enter the Volume" name="volume" value="{{ old('volume') }}">    
                            @error('volume')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div>   
                </div>
                <button type="submit" class="btn btn-primary">Submit Value</button>
            </form>
        </div>
    </div>
</div>
@endsection