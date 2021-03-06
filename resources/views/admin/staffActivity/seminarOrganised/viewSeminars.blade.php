@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4><span class="text-capitalize">{{ $type }}</span> Seminar Organised
            - {{$user['0']->name}}  
        </h4>
        <div>
            <a href="/admin/activity/seminar_organiseds" class="btn btn-primary" data-toggle="tooltip" >
                <span class="btn-inner--icon"><i class="ti-control-record"></i>View All Seminar Organised</span> 
            </a>
            <a href="/admin/staffActivity/{{$type}}/{{ $staffId }}/seminarOrganised/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Seminar Organised" >
                <span class="btn-inner--icon"><i class="ti-plus"></i></span> 
            </a>
            <a onclick="goBack()" class="btn btn-primary"><i class="ti-angle-double-left text-white"></i></a>
        </div>
    </div>
    <hr>
    @if(count($seminar) == 0)
        <h3 class="text-center">
            No Seminar Organised Yet <br>
            <a class="btn btn-danger text-white mt-4" href="/admin/staffActivity/{{$type}}/{{ $staffId }}/seminarOrganised/create">Add Seminar Organised</a>
        </h3> 
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
                            <a href="/admin/staffActivity/{{$type}}/{{$staffId}}/seminarOrganised/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Program" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/{{$type}}/{{$staffId}}/seminarOrganised/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Program" >
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