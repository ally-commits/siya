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
            <h4 class="mb-0">Staff Details</h4> 
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
                            <th>Dob</th> 
                            <th>Phone Number</th> 
                            <th>Gender</th> 
                            <th>Expirence</th> 
                            <th>Department</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                        <tbody> 
                            @foreach($staffs  as $key=>$staff)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$staff->name}}</td>
                                    <td>{{$staff->email}}</td> 
                                    <td>{{$staff->dob}}</td> 
                                    <td>{{$staff->phoneNumber}}</td> 
                                    <td>{{$staff->gender}}</td> 
                                    <td>{{$staff->expirence}}</td> 
                                    <td>{{$staff->department}}</td> 
                                    <td>
                                        <a class="btn btn-primary text-white" href="generate-report/create/{{$staff->userId}}">Genrate Report</a>
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