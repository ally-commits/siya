@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4>Staff Guest Vsist
            @if($staffId == 000)
                Admin
            @else
                {{$user['0']->name}}
            @endif
        </h4>
        <div>
            <a href="/admin/activity/guest_lecture_m_d_p_s" class="btn btn-primary" data-toggle="tooltip">
                <span class="btn-inner--icon"><i class="ti-control-record"></i>View All Guest Lectures</span> 
            </a>
            <a href="/admin/staffActivity/{{ $staffId }}/guestVisited/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Association" >
                <span class="btn-inner--icon"><i class="ti-plus"></i></span> 
            </a>
            <a href="/admin/staffActivity/1" class="btn btn-info"><i class="ti-angle-double-left text-white"></i></a>
        </div>
    </div>
    @if(count($visits) == 0)
        <h3 class="text-center">
            No Guest Visits Found
        </h3> 
    @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th> 
                    <th>Date</th> 
                    <th>Designation</th>
                    <th>Activity Held</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($visits as $key=>$mtg)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $mtg->Name }}</td> 
                        <td>{{ $mtg->date }}</td>
                        <td>{{ $mtg->Designation }}</td>
                        <td>{{ $mtg->activityHeld }}</td> 
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/{{$staffId}}/guestVisited/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Edit Guest Visit" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/{{$staffId}}/guestVisited/delete/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Delete Guest Visit" >
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