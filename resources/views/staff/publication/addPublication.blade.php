@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="{{ route('publication.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Name of the Journel</label>
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
                            <label for="">Enter the ISSN / ISBN</label>
                            <input type="text" class="form-control @error('num') is-invalid @enderror"
                                placeholder="Enter the ISSN / ISBN" name="num" value="{{ old('num') }}">    
                            @error('num')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Collabration</label>
                            <input type="text" class="form-control @error('collab') is-invalid @enderror"
                                placeholder="Enter the Collabration" name="collab" value="{{ old('collab') }}">    
                            @error('collab')
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