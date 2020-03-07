@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($seminar) == 0)
        <h3 class="text-center">
            No Seminar Attended Yet
        </h3> 
    @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th> 
                    <th>Date</th>
                    <th>Prize</th>
                    <th>Place</th> 
                    <th>Level</th> 
                    <th>Title</th> 
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($seminar as $key=>$prg)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $prg->name }}</td>
                        <td>{{ $prg->date }}</td>
                        <td>{{ $prg->prize }}</td>
                        <td>{{ $prg->place }}</td>
                        <td>{{ $prg->level }}</td>
                        <td>{{ $prg->title }}</td> 
                        <td class="d-flex jes-sp" >
                            <a href="/staff/seminarAttended/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Program" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/staff/seminarAttended/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Program" >
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