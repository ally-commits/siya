@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4>Staff Seminar Attended
            @if($staffId == 000)
                Admin
            @else
                {{$user['0']->name}}
            @endif
        </h4>
        <div>
            <a href="/admin/activity/seminar_attendeds" class="btn btn-primary" data-toggle="tooltip" >
                <span class="btn-inner--icon"><i class="ti-control-record"></i>View All Seminar Attended</span> 
            </a>
            <a href="/admin/staffActivity/{{ $staffId }}/seminarAttended/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Seminar Attended" >
                <span class="btn-inner--icon"><i class="ti-plus"></i></span> 
            </a>
            <a href="/admin/staffActivity/1" class="btn btn-info"><i class="ti-angle-double-left text-white"></i></a>
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
                        <td>{{ $prg->name }}</td>
                        <td>{{ $prg->type }}</td>
                        <td>{{ $prg->date }}</td>
                        <td>{{ $prg->prize }}</td>
                        <td>{{ $prg->dept }}</td>
                        <td>{{ $prg->place }}</td>
                        <td>{{ $prg->level }}</td>
                        <td>{{ $prg->title }}</td>  
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/{{ $staffId }}/seminarAttended/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Program" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/{{ $staffId }}/seminarAttended/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Program" >
                                <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    @endif
</div>
@endsection