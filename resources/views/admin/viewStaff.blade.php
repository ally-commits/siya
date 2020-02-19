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
            <h3 class="mb-0">Staff Details</h3>
            <a href="{{route('admin.addStaff')}}" class="btn btn-primary">Add Staff</a>
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
                            @foreach($staffs  as $key=>$staff)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$staff->name}}</td>
                                    <td>{{$staff->email}}</td>
                                    <td>{{ substr($staff->created_at,0,10) }}</td>
                                    <td class="table-actions"> 
                                     
                                        <a type="button" class="table-action" style="background: none; border: none;outline: none;" href="/admin/view-staff/{{$staff->id}}/1">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a href="delete-staff/{{$staff->id}}" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete Staff">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
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