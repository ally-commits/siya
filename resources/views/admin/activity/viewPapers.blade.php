@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4>All Papers Presented</h4>
        <div>  
            <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/papers" class="btn btn-primary" data-toggle="tooltip" data-original-title="View Admin Papers" >
                <span class="btn-inner--icon">View Admin  Papers Presented<i class="ti-eye"></i></span> 
            </a>
            <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/papers/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Admin Papers" >
                <span class="btn-inner--icon">Admin <i class="ti-plus"></i></span> 
            </a>
            <a href="/admin/staffActivity/staff/1" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Staff Papers" >
                <span class="btn-inner--icon">Staff <i class="ti-plus"></i></span> 
            </a>
            <a onclick="goBack()" class="btn btn-primary"><i class="ti-angle-double-left text-white"></i></a>
        </div>
    </div>
    @if(count($papers) == 0)
        <div class="text-center" style="align-items: center;">
            <h5>No Papers Found</h5>
        </div>
    @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Conference Name</th> 
                    <th>Title</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Nature</th>
                    <th>Venue</th>
                    <th>Prizes</th>
                    <th>Department</th>
                    <th>Theme</th> 
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($papers as $key=>$p)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $p->userType }} ( {{ $p->userName }} )</td>
                        <td>{{ $p->name }}</td>  
                        <td>{{ $p->title }}</td>
                        <td>{{ $p->date }}</td>
                        <td>{{ $p->type }}</td>
                        <td>{{ $p->nature }}</td>
                        <td>{{ $p->venue }}</td>
                        <td>{{ $p->prizes }}</td>
                        <td>{{ $p->dept }}</td>
                        <td>{{ $p->theme }}</td>
                        @if($p->userId != null)  
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/staff/{{$p->userId}}/papers/{{ $p->id}}" data-toggle="tooltip" data-original-title="Edit Paper" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/staff/{{$p->userId}}/papers/delete/{{ $p->id}}" data-toggle="tooltip" data-original-title="Delete Paper" >
                                <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                            </a>
                        </td>
                        @else
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/admin/{{$p->adminId}}/papers/{{ $p->id}}" data-toggle="tooltip" data-original-title="Edit Paper" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/admin/{{$p->adminId}}/papers/delete/{{ $p->id}}" data-toggle="tooltip" data-original-title="Delete Paper" >
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