@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4>All Association Program</h4>
        <div> 
            <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/association" class="btn btn-primary" data-toggle="tooltip" data-original-title="View Admin Association Program" >
                <span class="btn-inner--icon">View Admin Association Program <i class="ti-eye"></i></span> 
            </a>
            <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/association/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Admin Association Program" >
                <span class="btn-inner--icon">Admin <i class="ti-plus"></i></span> 
            </a>
            <a href="/admin/staffActivity/staff/1" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Staff Association Program" >
                <span class="btn-inner--icon">Staff <i class="ti-plus"></i></span> 
            </a>
            <a onclick="goBack()" class="btn btn-primary"><i class="ti-angle-double-left text-white"></i></a>
        </div>
    </div>
    @if(count($programs) == 0)
        <div class="text-center" style="align-items: center;">
            <h5>No Association Program Found</h5>
        </div> 
    @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>Sl No</th>
                    <th>User</th> 
                    <th>Name</th>
                    <th>Count(Students)</th>
                    <th>Date</th>
                    <th>Guest</th>
                    <th>Place</th>
                    <th>Nature</th>
                    <th>Level</th> 
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $key=>$prg)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $prg->userType }} ( {{ $prg->userName }} )</td>
                        <td>{{ $prg->name }}</td>
                        <td>{{ $prg->NumberOfStudents }}</td>
                        <td>{{ $prg->date }}</td>
                        <td>{{ $prg->guest }}</td>
                        <td>{{ $prg->place }}</td>
                        <td>{{ $prg->nature }}</td>
                        <td>{{ $prg->level }}</td>
                        @if($prg->userId != null)
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/staff/{{$prg->userId}}/association/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Program" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/staff/{{$prg->userId}}/association/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Program" >
                                <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                            </a>
                        </td>
                        @else 
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/admin/{{$prg->adminId}}/association/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Program" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/admin/{{$prg->adminId}}/association/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Program" >
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