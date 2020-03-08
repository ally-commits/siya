@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4>Staff Papers Presented
            @if($staffId == 000)
                Admin
            @else
                {{$user['0']->name}}
            @endif
        </h4>
        <div>
            <a href="/admin/activity/papers" class="btn btn-primary" data-toggle="tooltip" >
                <span class="btn-inner--icon"><i class="ti-control-record"></i>View All Papers Presented</span> 
            </a>
            <a href="/admin/staffActivity/{{ $staffId }}/papers/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Papers" >
                <span class="btn-inner--icon"><i class="ti-plus"></i></span> 
            </a>
            <a href="/admin/staffActivity/1" class="btn btn-info"><i class="ti-angle-double-left text-white"></i></a>
        </div>
    </div>
    @if(count($papers) == 0)
        <div class="text-center" style="align-items: center;">
            <h5>No Papers Found</h5>
            <a class="btn btn-danger text-white" href="/admin/staffActivity/{{ $staffId }}/papers/create">Add Papers</a>
        </div>
    @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Nature</th>
                    <th>Venue</th>
                    <th>Prizes</th>
                    <th>Theme</th> 
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($papers as $key=>$p)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->title }}</td>
                        <td>{{ $p->nature }}</td>
                        <td>{{ $p->venue }}</td>
                        <td>{{ $p->prizes }}</td>
                        <td>{{ $p->theme }}</td> 
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/{{$staffId}}/papers/{{ $p->id}}" data-toggle="tooltip" data-original-title="Edit Paper" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/{{$staffId}}/papers/delete/{{ $p->id}}" data-toggle="tooltip" data-original-title="Delete Paper" >
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