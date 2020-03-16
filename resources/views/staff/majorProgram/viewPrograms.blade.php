@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Major Programmes</h5>
            <a href="/staff/majorProgram/create" class="btn btn-primary">Add One</a>
        </div>
        <div class="card-body">
            @if(count($programs) == 0)
                <h6 class="text-center">
                    No Major Programs Found
                </h6> 
            @else 
                <table class="table table-bordered mb-0" style="font-size: 14px;">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th> 
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
                                <td>{{ $mtg->from }}</td> 
                                <td>{{ $mtg->to }}</td> 
                                <td>{{ $mtg->programme }}</td>
                                <td>{{ $mtg->facultyAssociation }}</td>
                                <td>{{ $mtg->noOfBeneficiaries }}</td>
                                <td>{{ $mtg->level }}</td>
                                <td>{{ $mtg->department }}</td> 
                                <td>{{ $mtg->desc }}</td> 
                                <td class="d-flex jes-sp" >
                                    <a href="/staff/majorProgram/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Edit Major Programme" >
                                        <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                                    </a>
                                    <a href="/staff/majorProgram/delete/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Delete Major Programme" >
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