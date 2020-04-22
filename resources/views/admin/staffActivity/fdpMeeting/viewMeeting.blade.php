@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="d-flex" style="justify-content: space-between; align-items: center;">
            <h4> <span class="text-capitalize">{{ $type}}</span> Fdp Meeting
                - {{$user['0']->name}} 
            </h4>
            <div>
                <a href="/admin/activity/fdp_meetings" class="btn btn-primary" data-toggle="tooltip" data-original-title="View All FDP Meetings" >
                    <span class="btn-inner--icon"><i class="ti-control-record"></i>View All FDP Meetings</span> 
                </a>
                <a href="/admin/staffActivity/{{$type}}/{{ $staffId }}/fdpMeeting/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Association" >
                    <span class="btn-inner--icon"><i class="ti-plus"></i></span> 
                </a>
                <a onclick="goBack()" class="btn btn-primary"><i class="ti-angle-double-left text-white"></i></a>
            </div>
        </div>
        <hr>
        @if(count($meetings) == 0)
            <div class="text-center" style="align-items: center;">
                <h5>No Fdp Meeting Found</h5>
                <a class="btn btn-danger text-white" href="/admin/staffActivity/{{$type}}/{{ $staffId }}/fdpMeeting/create">Add Fdp / Meeting</a>
            </div> 
        @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type of Meeting</th> 
                    <th>From</th>
                    <th>To</th>
                    <th>Organisers</th>
                    <th>Place</th> 
                    <th>Department</th> 
                    <th>Level</th> 
                    <th>Description</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($meetings as $key=>$mtg)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $mtg->name }}</td>
                        <td>{{ $mtg->typeOfMeeting }}</td>
                        <td>{{ $mtg->from }}</td>
                        <td>{{ $mtg->to }}</td>
                        <td>{{ $mtg->organisers }}</td>
                        <td>{{ $mtg->place }}</td>
                        <td>{{ $mtg->department }}</td>
                        <td>{{ $mtg->level }}</td> 
                        <td>{{ $mtg->desc}}</td>
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/{{$type}}/{{$staffId}}/fdpMeeting/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Edit FDP Meeting" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/{{$type}}/{{$staffId}}/fdpMeeting/delete/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Delete FDP Meeting" >
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