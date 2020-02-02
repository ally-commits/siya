@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" />
@endsection

@section('js') 
    <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
@endsection
@section('content')
    <div class="card"> 
        <div class="card-header d-flex" style="justify-content: space-between;">
            <h3 class="mb-0">Department Details</h3>
            <a href="{{route('admin.addDept')}}" class="btn btn-primary">Add Department</a>
        </div>
        <div class="container">
        <div class="table-responsive p-4">
            <div class="row">
                <div class="col-sm-12 px-0">
                    <table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                    <thead class="thead-light">
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 77px;">Sl No</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 140px;">Username</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 160px;">Created At</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 63px;">Action</th>
                        </tr>
                    </thead> 
                        <tbody>
                            @foreach($depts as $key=>$dept)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$dept['name']}}</td>
                                    <td>{{$dept['email']}}</td>
                                    <td>{{ substr($dept['created_at'],0,10) }}</td>
                                    <td class="table-actions"> 
                                        <button type="button" class="table-action" style="background: none; border: none;outline: none;" data-toggle="modal" data-target="#model-{{$dept['id']}}">
                                            <i class="fas fa-user-edit"></i>
                                        </button>
                                        <a href="delete-dept/{{$dept['id']}}" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete dept">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                    <div class="modal fade" id="model-{{$dept['id']}}" tabindex="-1" role="dialog" aria-labelledby="model-{{$dept['id']}}" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="mb-0">Update Department Details</h3>
                                                        </div> 
                                                        <div class="card-body">
                                                        <hr>
                                                            <form method="POST" action="{{ route('admin.updateDept') }}">
                                                            @csrf
                                                                <input type="hidden" name="id"  value="{{$dept['id']}}">
                                                                <div class="form-row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-1 @error('name') has-danger @enderror" >
                                                                            <label class="form-control-label" for="">Department name</label>
                                                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="dept name" value="{{ $dept['name']}}" required="">
                                                                        </div>
                                                                        @error('name')
                                                                            <div class="invalid-text">
                                                                                <strong>{{ $message }}</strong>
                                                                            </div>
                                                                        @enderror
                                                                    </div> 
                                                                    <div class="col-md-12 mb-3">
                                                                        <div class="form-group mb-1 @error('email') has-danger @enderror">
                                                                            <label class="form-control-label" for="">Username</label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text" id="">@</span>
                                                                                </div>
                                                                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Username"  value="{{ $dept['email']}}" required="">
                                                                            </div>
                                                                        </div>
                                                                        @error('email')
                                                                            <div class="invalid-text">
                                                                                <strong>{{ $message }}</strong>
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <span class="text-danger" style="font-size: 12px;">Only edit below fields if the password need to be changed otherwise you can leave it blank</span>
                                                                <div class="form-row">
                                                                    <div class="col-md-12 mb-3">
                                                                        <div class="form-group mb-1 @error('password') has-danger @enderror">
                                                                            <label class="form-control-label">Password</label>
                                                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                                                        </div>
                                                                        @error('password')
                                                                            <div class="invalid-text">
                                                                                <strong>{{ $message }}</strong>
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-md-12 mb-3">
                                                                        <div class="form-group mb-1 @error('password') has-danger @enderror">
                                                                            <label class="form-control-label">Confirm Password</label>
                                                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Password">
                                                                        </div>
                                                                        @error('password')
                                                                            <div class="invalid-text">
                                                                                <strong>{{ $message }}</strong>
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>  
                                                                <div>
                                                                    <button class="btn btn-primary btn-small" type="submit">Update Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
    </div>
@endsection