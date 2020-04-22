@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="d-flex" style="justify-content: space-between; align-items: center;">
            <h4>All Fdp / Meeting</h4>
            <div> 
                <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/fdpMeeting" class="btn btn-primary" data-toggle="tooltip" data-original-title="View Admin Fdp / Meeting" >
                    <span class="btn-inner--icon">View Admin Fdp / Meeting <i class="ti-eye"></i></span> 
                </a>
                <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/fdpMeeting/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Admin Fdp / Meeting" >
                    <span class="btn-inner--icon">Admin <i class="ti-plus"></i></span> 
                </a>
                <a href="/admin/staffActivity/staff/1" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Staff Fdp / Meeting" >
                    <span class="btn-inner--icon">Staff <i class="ti-plus"></i></span> 
                </a>
                <a onclick="goBack()" class="btn btn-primary"><i class="ti-angle-double-left text-white"></i></a>
            </div>
        </div>
    @if(count($meetings) == 0)
        <div class="text-center" style="align-items: center;">
            <h5>No Fdp / Meeting Found</h5>
        </div> 
    @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>User Type</th>
                    <th>Name</th>
                    <th>Type of Meeting</th> 
                    <th>From</th>
                    <th>To</th>
                    <th>Organisers</th>
                    <th>Place</th> 
                    <th>Department</th> 
                    <th>Level</th> 
                    <th>Description</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($meetings as $key=>$mtg)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $mtg->userType }} ( {{ $mtg->userName }} )</td>
                        <td>{{ $mtg->name }}</td>
                        <td>{{ $mtg->typeOfMeeting }}</td>
                        <td>{{ $mtg->from }}</td>
                        <td>{{ $mtg->to }}</td>
                        <td>{{ $mtg->organisers }}</td>
                        <td>{{ $mtg->place }}</td>
                        <td>{{ $mtg->department }}</td>
                        <td>{{ $mtg->level }}</td> 
                        <td>{{ $mtg->desc}}</td>
                        @if($mtg->userId != null) 
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/staff/{{$mtg->userId}}/fdpMeeting/{{ $mtg->id}}" data-toggle="tooltip"  >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/staff/{{$mtg->userId}}/fdpMeeting/delete/{{ $mtg->id}}" data-toggle="tooltip">
                                <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                            </a>
                        </td>
                        @elseif($mtg->deptId != null) 
                            <td class="d-flex jes-sp" >
                                <a href="/admin/staffActivity/department/{{$mtg->deptId}}/fdpMeeting/{{ $mtg->id}}" data-toggle="tooltip">
                                    <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                                </a>
                                <a href="/admin/staffActivity/department/{{$mtg->deptId}}/fdpMeeting/delete/{{ $mtg->id}}" data-toggle="tooltip">
                                    <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                                </a>
                            </td> 
                        @else
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/admin/{{$mtg->adminId}}/fdpMeeting/{{ $mtg->id}}" data-toggle="tooltip">
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/admin/{{$mtg->adminId}}/fdpMeeting/delete/{{ $mtg->id}}" data-toggle="tooltip">
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