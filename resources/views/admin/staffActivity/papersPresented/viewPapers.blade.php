@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4><span class="text-capitalize">{{ $type}}</span> Papers Presented
            {{$user['0']->name}}
        </h4>
        <div>
            <a href="/admin/activity/papers" class="btn btn-primary" data-toggle="tooltip" >
                <span class="btn-inner--icon"><i class="ti-control-record"></i>View All Papers Presented</span> 
            </a>
            <a href="/admin/staffActivity/{{$type}}/{{ $staffId }}/papers/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Papers" >
                <span class="btn-inner--icon"><i class="ti-plus"></i></span> 
            </a>
            <a onclick="goBack()" class="btn btn-primary"><i class="ti-angle-double-left text-white"></i></a>
        </div>
    </div>
    <hr>
    @if(count($papers) == 0)
        <div class="text-center" style="align-items: center;">
            <h5>No Papers Found</h5>
            <a class="btn btn-danger text-white" href="/admin/staffActivity/{{$type}}/{{ $staffId }}/papers/create">Add Papers</a>
        </div>
    @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>Sl no</th>
                    <th>Conference Name</th> 
                    <th>Staff Name</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Nature</th>
                    <th>Venue</th>
                    <th>Prizes</th>
                    <th>Department</th>
                    <th>Theme</th> 
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($papers as $key=>$p)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $user['0']->name }}</td>
                        <td>{{ $p->title }}</td>
                        <td>{{ $p->date }}</td>
                        <td>{{ $p->type }}</td>
                        <td>{{ $p->nature }}</td>
                        <td>{{ $p->venue }}</td>
                        <td>{{ $p->prizes }}</td>
                        <td>{{ $p->dept }}</td>
                        <td>{{ $p->theme }}</td>  
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/{{$type}}/{{$staffId}}/papers/{{ $p->id}}" data-toggle="tooltip" data-original-title="Edit Paper" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/{{$type}}/{{$staffId}}/papers/delete/{{ $p->id}}" data-toggle="tooltip" data-original-title="Delete Paper" >
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