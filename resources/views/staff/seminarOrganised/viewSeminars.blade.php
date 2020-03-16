@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Seminar Organised</h5>
            <a href="/staff/seminarOrganised/create" class="btn btn-primary">Add One</a>
        </div>
        <div class="card-body">
            @if(count($seminar) == 0)
                <h6 class="text-center">
                    No Seminar Organised Yet
                </h6> 
            @else 
                <table class="table table-bordered mb-0" style="font-size: 14px;">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Title</th> 
                            <th>Date</th>
                            <th>Collab Agency</th>
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
                                <td>{{ $prg->title }}</td>
                                <td>{{ $prg->date }}</td>
                                <td>{{ $prg->collabAgency }}</td>
                                <td>{{ $prg->speaker }}</td>
                                <td>{{ $prg->topic }}</td>
                                <td>{{ $prg->department }}</td> 
                                <td>{{ $prg->placeAndDesignation }}</td> 
                                <td>{{ $prg->level }}</td> 
                                <td>{{ $prg->beneficiaries }}</td> 
                                <td class="d-flex jes-sp" >
                                    <a href="/staff/seminarOrganised/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Program" >
                                        <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                                    </a>
                                    <a href="/staff/seminarOrganised/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Program" >
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