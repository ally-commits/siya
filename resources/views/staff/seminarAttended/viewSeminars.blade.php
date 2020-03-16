@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Seminar Attended</h5>
            <a href="/staff/seminarAttended/create" class="btn btn-primary">Add One</a>
        </div>
        <div class="card-body">
            @if(count($seminar) == 0)
                <h6 class="text-center">
                    No Seminar Attended Yet
                </h6> 
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
                                    <a href="/staff/seminarAttended/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Program" >
                                        <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                                    </a>
                                    <a href="/staff/seminarAttended/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Program" >
                                        <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            @endif
        </div>
    </div>
</div>
@endsection