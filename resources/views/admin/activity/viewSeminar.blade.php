@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4>All Seminar Organised</h4>
        <div>  
            <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/seminarOrganised" class="btn btn-primary" data-toggle="tooltip" data-original-title="View Admin  Seminar Organised" >
                <span class="btn-inner--icon">View Admin Seminar Organised<i class="ti-eye"></i></span> 
            </a>
            <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/seminarOrganised/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Admin  Seminar Organised" >
                <span class="btn-inner--icon">Admin <i class="ti-plus"></i></span> 
            </a>
            <a href="/admin/staffActivity/staff/1" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Staff  Seminar Organised" >
                <span class="btn-inner--icon">Staff <i class="ti-plus"></i></span> 
            </a>
            <a onclick="goBack()" class="btn btn-primary"><i class="ti-angle-double-left text-white"></i></a>
        </div>
    </div>
    @if(count($seminar) == 0)
        <h3 class="text-center">
            No Seminar Organised Yet
        </h3> 
    @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Title</th> 
                    <th>Date</th>
                    <th>Collaboration Agency</th>
                    <th>Speaker</th>
                    <th>Topic</th>
                    <th>Department</th>
                    <th>Place & Designation</th> 
                    <th>Level</th> 
                    <th>Beneficiaries</th> 
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($seminar as $key=>$prg)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $prg->userType }} ( {{ $prg->userName }} )</td>
                        <td>{{ $prg->title }}</td>
                        <td>{{ $prg->date }}</td>
                        <td>{{ $prg->collabAgency }}</td>
                        <td>{{ $prg->speaker }}</td>
                        <td>{{ $prg->topic }}</td>
                        <td>{{ $prg->department }}</td> 
                        <td>{{ $prg->placeAndDesignation }}</td> 
                        <td>{{ $prg->level }}</td> 
                        <td>{{ $prg->beneficiaries }}</td> 

                        @if($prg->userId != null)
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/staff/{{$prg->userId}}/seminarOrganised/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Program" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/staff/{{$prg->userId}}/seminarOrganised/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Program" >
                                <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                            </a>
                        </td>
                        @elseif($prg->deptId != null)
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/department/{{$prg->deptId}}/seminarOrganised/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Program" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/department/{{$prg->deptId}}/seminarOrganised/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Program" >
                                <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                            </a>
                        </td>
                        @else
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/admin/{{$prg->adminId}}/seminarOrganised/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Program" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/admin/{{$prg->adminId}}/seminarOrganised/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Program" >
                                <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                            </a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>    
    @endif
</div>
@endsection