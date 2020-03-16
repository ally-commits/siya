@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Association Program</h5>
            <a href="/staff/association/create" class="btn btn-primary">Add One</a>
        </div>
        <div class="card-body">
            @if(count($programs) == 0)
                <h6 class="text-center">
                    No Association Program Found
                </h6> 
            @else 
                <table class="table table-bordered mb-0" style="font-size: 14px;">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
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
                                <td>{{ $prg->name }}</td>
                                <td>{{ $prg->NumberOfStudents }}</td>
                                <td>{{ $prg->date }}</td>
                                <td>{{ $prg->guest }}</td>
                                <td>{{ $prg->place }}</td>
                                <td>{{ $prg->nature }}</td>
                                <td>{{ $prg->level }}</td>
                                <td class="d-flex jes-sp" >
                                    <a href="/staff/association/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Program" >
                                        <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                                    </a>
                                    <a href="/staff/association/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Program" >
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