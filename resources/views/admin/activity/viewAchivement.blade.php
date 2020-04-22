@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4>All Achievements</h4>
        <div>
            <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/achivements" class="btn btn-primary" data-toggle="tooltip" data-original-title="View Admin Achivements" >
                <span class="btn-inner--icon">View Admin Achievements <i class="ti-eye"></i></span> 
            </a>
            <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/achivements/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Admin Achivements" >
                <span class="btn-inner--icon">Admin <i class="ti-plus"></i></span> 
            </a>
            <a href="/admin/staffActivity/staff/1" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Staff Achivements" >
                <span class="btn-inner--icon">Staff <i class="ti-plus"></i></span> 
            </a>
            <a onclick="goBack()" class="btn btn-primary"><i class="ti-angle-double-left text-white"></i></a>
        </div>
    </div>
    @if(count($achive) == 0)
        <div class="text-center" style="align-items: center;">
            <h5>No Achievement Found</h5>
        </div> 
    @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Achievement</th>
                    <th>PLace</th>
                    <th>Organisation</th>
                    <th>Nature</th> 
                    <th>Date</th> 
                    <th>Level</th> 
                    <th>Guided By</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($achive as $key=>$a)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $a->userType }} ( {{ $a->userName }} )</td>
                        <td>{{ $a->name }}</td>
                        <td>{{ $a->dept }}</td>
                        <td>{{ $a->achive }}</td>
                        <td>{{ $a->place }}</td>
                        <td>{{ $a->organisation }}</td>
                        <td>{{ $a->nature }}</td>
                        <td>{{ $a->date }}</td>
                        <td>{{ $a->level }}</td> 
                        <td>{{ $a->guidedBy }}</td> 
                        @if($a->userId != null)
                            <td class="d-flex jes-sp" >
                                <a href="/admin/staffActivity/staff/{{ $a->userId }}/achivements/{{ $a->id}}" data-toggle="tooltip" data-original-title="Edit Achivements" >
                                    <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                                </a>
                                <a href="/admin/staffActivity/staff/{{ $a->userId }}/achivements/delete/{{ $a->id}}" data-toggle="tooltip" data-original-title="Delete Achivements" >
                                    <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                                </a>
                            </td>
                        @else
                            <td class="d-flex jes-sp" >
                                <a href="/admin/staffActivity/admin/{{ $a->adminId }}/achivements/{{ $a->id}}" data-toggle="tooltip" data-original-title="Edit Achivements" >
                                    <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                                </a>
                                <a href="/admin/staffActivity/admin/{{ $a->adminId }}/achivements/delete/{{ $a->id}}" data-toggle="tooltip" data-original-title="Delete Achivements" >
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