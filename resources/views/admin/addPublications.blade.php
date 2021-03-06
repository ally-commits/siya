@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;">
        <h3 class="mb-0">Add Publications</h3> 
    </div> 
    <div class="card-body">
    <hr>
        <form method="POST">
        @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group mb-1 @error('name') has-danger @enderror" >
                        <label class="form-control-label" for="">Name of the Journal</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="journal" placeholder="Journal name" value="{{ old('name') }}" required="">
                    </div>
                    @error('name')
                        <div class="invalid-text">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div> 
                <div class="col-md-6">
                    <div class="form-group mb-1 @error('name') has-danger @enderror" >
                        <label class="form-control-label" for="">Subject</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="subject" placeholder="subject" value="{{ old('name') }}" required="">
                    </div>
                    @error('name')
                        <div class="invalid-text">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div> 
                <div class="col-md-6">
                    <div class="form-group mb-1 @error('name') has-danger @enderror" >
                        <label class="form-control-label" for="">Collaboration</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="collaboration" value="{{ old('name') }}" required="">
                    </div>
                    @error('name')
                        <div class="invalid-text">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div> 
                <div class="col-md-6">
                    <div class="form-group mb-1 @error('name') has-danger @enderror" >
                        <label class="form-control-label" for="">nature</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="nature" value="{{ old('name') }}" required="">
                    </div>
                    @error('name')
                        <div class="invalid-text">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div> 
            </div>
            <div class="col-md-6">
                    <div class="form-group mb-1 @error('name') has-danger @enderror" >
                        <label class="form-control-label" for="">level</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="level" value="{{ old('name') }}" required="">
                    </div>
                    @error('name')
                        <div class="invalid-text">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div> 
           
                <div class="col-md-6">
                    <div class="form-group mb-1 @error('name') has-danger @enderror" >
                        <label class="form-control-label" for="">date</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="date" placeholder="name" value="{{ old('name') }}" required="">
                    </div>
                    @error('name')
                        <div class="invalid-text">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div> 
            </div>  
            <div>
                <button class="btn btn-primary btn-small" type="submit">Add </button>
            </div>
        </form>
    </div>
</div>
@endsection