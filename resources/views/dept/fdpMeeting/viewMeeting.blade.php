@extends('layouts.dept')

@section('content')
<div class="container">
    @if(count($meetings) == 0)
        <h3 class="text-center">
            No FDP meeting Found
        </h3> 
    @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type of Meeting</th>
                    <th>Duration</th>
                    <th>Date</th>
                    <th>Organisers</th>
                    <th>Place</th> 
                    <th>Department</th> 
                    <th>Level</th> 
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($meetings as $key=>$mtg)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $mtg->name }}</td>
                        <td>{{ $mtg->typeOfMeeting }}</td>
                        <td>{{ $mtg->duration }}</td>
                        <td>{{ $mtg->date }}</td>
                        <td>{{ $mtg->organisers }}</td>
                        <td>{{ $mtg->place }}</td>
                        <td>{{ $mtg->department }}</td>
                        <td>{{ $mtg->level }}</td> 
                        <td class="d-flex jes-sp" >
                            <a href="/dept/deptFdpMeeting/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Edit FDP Meeting" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/dept/deptFdpMeeting/delete/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Delete FDP Meeting" >
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