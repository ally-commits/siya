@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Achivements</h5>
            <a href="/staff/achivements/create" class="btn btn-primary">Add One</a>
        </div>
        <div class="card-body">
            @if(count($achive) == 0)
                <h6 class="text-center">
                    No Achivements Found
                </h6> 
            @else 
                <table class="table table-bordered mb-0" style="font-size: 14px;">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Achive</th>
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
                                <td>{{ $a->name }}</td>
                                <td>{{ $a->dept }}</td>
                                <td>{{ $a->achive }}</td>
                                <td>{{ $a->place }}</td>
                                <td>{{ $a->organisation }}</td>
                                <td>{{ $a->nature }}</td>
                                <td>{{ $a->date }}</td>
                                <td>{{ $a->level }}</td> 
                                <td>{{ $a->guidedBy }}</td> 
                                <td class="d-flex jes-sp" >
                                    <a href="/staff/achivements/{{ $a->id}}" data-toggle="tooltip" data-original-title="Edit Achivements" >
                                        <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                                    </a>
                                    <a href="/staff/achivements/delete/{{ $a->id}}" data-toggle="tooltip" data-original-title="Delete Achivements" >
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