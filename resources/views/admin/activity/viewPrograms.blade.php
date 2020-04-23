@extends('layouts.admin')

@section('content')
<div class="container"> 
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4>Major Programmes</h4>
        <div> 
            <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/majorProgram" class="btn btn-primary" data-toggle="tooltip" data-original-title="View Admin Major Programmes" >
                <span class="btn-inner--icon">View Admin  Major Programmes<i class="ti-eye"></i></span> 
            </a>
            <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/majorProgram/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Admin Major Programmes" >
                <span class="btn-inner--icon">Admin <i class="ti-plus"></i></span> 
            </a>
            <a href="/admin/staffActivity/staff/1" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Staff Major Programmes" >
                <span class="btn-inner--icon">Staff <i class="ti-plus"></i></span> 
            </a>
            <a onclick="goBack()" class="btn btn-primary"><i class="ti-angle-double-left text-white"></i></a>
        </div>
    </div>
    @if(count($programs) == 0)
        <h3 class="text-center">
            No Major Programmes Found
        </h3> 
    @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>#</th> 
                    <th>User</th>
                    <th>From</th> 
                    <th>To</th> 
                    <th>Programme</th>
                    <th>Faculty Association</th>
                    <th>Number Of Beneficiaries</th>
                    <th>Level</th>
                    <th>Department</th> 
                    <th>Description</th> 
                    <th>Action</th>  
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $key=>$mtg)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                        @if($mtg->userId != null)
                            <a href="/admin/staffActivity/{{$mtg->userType}}/{{$mtg->userId}}/majorProgram" class="text-primary">
                                {{ $mtg->userType }} ( {{ $mtg->userName }} )
                            </a>
                            @elseif($mtg->adminId != null)
                            <a href="/admin/staffActivity/{{$mtg->userType}}/{{$mtg->adminId}}/majorProgram" class="text-primary">
                                {{ $mtg->userType }} ( {{ $mtg->userName }} )
                            </a>  
                        @endif
                        </td>
                        <td>{{ $mtg->from }}</td> 
                        <td>{{ $mtg->to }}</td> 
                        <td>{{ $mtg->programme }}</td>
                        <td>{{ $mtg->facultyAssociation }}</td>
                        <td>{{ $mtg->noOfBeneficiaries }}</td>
                        <td>{{ $mtg->level }}</td>
                        <td>{{ $mtg->department }}</td> 
                        <td>{{ $mtg->desc }}</td>
                        @if($mtg->userId != null)
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/staff/{{$mtg->userId}}/majorProgram/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Edit Major Programme" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/staff/{{$mtg->userId}}/majorProgram/delete/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Delete Major Programme" >
                                <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                            </a>
                        </td>
                        @elseif($mtg->deptId != null)
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/department/{{$mtg->deptId}}/majorProgram/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Edit Major Programme" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/department/{{$mtg->deptId}}/majorProgram/delete/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Delete Major Programme" >
                                <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                            </a>
                        </td>
                        @else
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/admin/{{$mtg->adminId}}/majorProgram/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Edit Major Programme" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/admin/{{$mtg->adminId}}/majorProgram/delete/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Delete Major Programme" >
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