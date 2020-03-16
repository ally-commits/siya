@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="d-flex" style="justify-content: space-between; align-items: center;">
            <h4>Edit Staff Publication</h4>
            <a href="/admin/staffActivity/1" class="btn btn-info"><i class="ti-angle-double-left text-white"></i></a>
        </div>
        <div class="card-body">
            <form action="/admin/staffActivity/{{$staffId}}/publication/{{$publication->id}}" method="POST">
                @method("PUT")
                @csrf
                <div class="row">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Name of the Journel</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter the Name" name="name" value="{{ $publication->name }}">    
                            @error('name')
                                <span class="invalid-text text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    
                    <input type="hidden" name="num" value="none">
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the Collabration</label>
                            <input type="text" class="form-control @error('collab') is-invalid @enderror"
                                placeholder="Enter the Collabration" name="collab" value="{{ $publication->collabration }}">    
                            @error('collab')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror 
                        </div>
                    </div> 
                    <div class="col-md-6">                          
                        <div class="form-group">
                            <label for="">Enter the ISSN / ISBN</label>
                            <input type="checkbox" class="form-control @error('num') is-invalid @enderror"
                                placeholder="Enter the ISSN / ISBN" name="num" value="ISSN/ISBN" @if($publication->publication_number == "ISSN/ISBN") checked @endif>    
                            @error('num')
                                <span class="invalid-text text-danger" role="alert">
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