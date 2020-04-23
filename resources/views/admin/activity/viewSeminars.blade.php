@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4>All Seminar Attended</h4>
        <div> 
            <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/seminarAttended" class="btn btn-primary" data-toggle="tooltip" data-original-title="View Admin Seminar Attended" >
                <span class="btn-inner--icon">View Admin Seminar Attended<i class="ti-eye"></i></span> 
            </a>
            <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/seminarAttended/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Admin Seminar Attended" >
                <span class="btn-inner--icon">Admin <i class="ti-plus"></i></span> 
            </a>
            <a href="/admin/staffActivity/staff/1" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Staff Seminar Attended" >
                <span class="btn-inner--icon">Staff <i class="ti-plus"></i></span> 
            </a>
            <a onclick="goBack()" class="btn btn-primary"><i class="ti-angle-double-left text-white"></i></a>
        </div>
    </div>
    @if(count($seminar) == 0)
        <h3 class="text-center">
            No Seminar Attended Yet
        </h3> 
    @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Name</th>
                    <th>Type</th> 
                    <th>Date</th>
                    <th>Prize</th>
                    <th>Department</th>
                    <th>Place</th> 
                    <th>Level</th> 
                    <th>Title</th> 
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($seminar as $key=>$prg)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                            @if($prg->userId != null)
                            <a href="/admin/staffActivity/{{$prg->userType}}/{{$prg->userId}}/seminarAttended" class="text-primary">
                                {{ $prg->userType }} ( {{ $prg->userName }} )
                            </a>
                            @elseif($prg->adminId != null)
                            <a href="/admin/staffActivity/{{$prg->userType}}/{{$prg->adminId}}/seminarAttended" class="text-primary">
                                {{ $prg->userType }} ( {{ $prg->userName }} )
                            </a> 
                            @endif
                        </td>
                        <td>{{ $prg->name }}</td>
                        <td>{{ $prg->type }}</td>
                        <td>{{ $prg->date }}</td>
                        <td>{{ $prg->prize }}</td>
                        <td>{{ $prg->dept }}</td>
                        <td>{{ $prg->place }}</td>
                        <td>{{ $prg->level }}</td>
                        <td>{{ $prg->title }}</td> 
                        @if($prg->userId != null) 
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/staff/{{ $prg->userId }}/seminarAttended/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Program" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/staff/{{ $prg->userId }}/seminarAttended/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Program" >
                                <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                            </a>
                        </td>
                        @else
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/admin/{{ $prg->adminId }}/seminarAttended/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Program" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/admin/{{ $prg->adminId }}/seminarAttended/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Program" >
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