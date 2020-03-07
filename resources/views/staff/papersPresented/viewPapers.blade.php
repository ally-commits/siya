@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($papers) == 0)
        <h3 class="text-center">
            No Papers Found
        </h3> 
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
@endsection