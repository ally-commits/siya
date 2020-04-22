@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="d-flex" style="justify-content: space-between; align-items: center;">
            <h4>Add <span class="text-capitalize">{{ $type}}</span> Guest Visit</h4>
            <a onclick="goBack()" class="btn btn-primary"><i class="ti-angle-double-left text-white"></i></a>
        </div>
        <div class="card-body">
            <form action="/admin/staffActivity/{{$type}}/{{$staffId}}/guestVisited" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Name of the Guest</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter the Name of guest" name="name" value="{{ old('name') }}">    
                            @error('name')
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
                            <label for="">Enter the Designation</label>
                            <input type="text" class="form-control @error('designation') is-invalid @enderror"
                                placeholder="Enter the Designation" name="designation" value="{{ old('designation') }}">    
                            @error('designation')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Activity Held</label>
                            <input type="text" class="form-control @error('activityHeld') is-invalid @enderror"
                                placeholder="Enter Activity Held" name="activityHeld" value="{{ old('activityHeld') }}">    
                            @error('activityHeld')
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