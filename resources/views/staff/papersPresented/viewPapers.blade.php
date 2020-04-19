@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Papers Presented</h5>
            <a href="/staff/papers/create" class="btn btn-primary">Add One</a>
        </div>
        <div class="card-body">
            @if(count($papers) == 0)
                <h6 class="text-center">
                    No Papers Found
                </h6> 
            @else 
                <table class="table table-bordered mb-0" style="font-size: 14px;">
                    <thead class="thead-light">
                        <tr>
                            <th>SL no</th>
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
                                <td>{{ Auth::user()->name }}</td>
                                <td>{{ $p->title }}</td>
                                <td>{{ $p->date }}</td>
                                <td>{{ $p->type }}</td>
                                <td>{{ $p->nature }}</td>
                                <td>{{ $p->venue }}</td>
                                <td>{{ $p->prizes }}</td>
                                <td>{{ $p->dept }}</td>
                                <td>{{ $p->theme }}</td> 
                                <td class="d-flex jes-sp" >
                                    <a href="/staff/papers/{{ $p->id}}" data-toggle="tooltip" data-original-title="Edit Paper" >
                                        <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                                    </a>
                                    <a href="/staff/papers/delete/{{ $p->id}}" data-toggle="tooltip" data-original-title="Delete Paper" >
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