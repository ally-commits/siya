@extends('layouts.admin')
@section('css')
<link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> 
@endsection

@section('js')  
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.buttons.min.js') }}"></script> 
    <script src="{{ asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>


    <script src="{{ asset('assets/pages/datatables.init.js') }}"></script>    
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
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 15px;">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Department</th>
                            <th>Dob</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($staffs  as $key=>$staff)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$staff->name}}</td>
                                    <td>{{$staff->email}}</td>
                                    <td>{{ $staff->department }}</td>
                                    <td>{{$staff->dob }}</td>
                                    <td class="d-flex" style="justify-content: space-around;"> 
                                        <a class="table-action"  data-toggle="tooltip" data-original-title="Add & View Qualification" href="/admin/get-qualification/{{$staff->id}}">
                                            <i class="ti-plus"></i>
                                        </a>
                                        <a class="table-action"  data-toggle="tooltip" data-original-title="View Staff Details" href="/admin/view-staff/{{$staff->id}}">
                                            <i class="ti-eye"></i>
                                        </a>
                                        <a class="table-action table-action-delete"  data-toggle="tooltip" data-original-title="Edit Staff Details" href="/admin/edit-staff/{{$staff->id}}">
                                            <i class="ti-pencil"></i>
                                        </a>
                                        <a href="delete-staff/{{$staff->id}}" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete Staff">
                                            <i class="mdi mdi-delete-sweep-outline f-15"></i>
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