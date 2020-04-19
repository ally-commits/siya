@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Publications</h5>
            <a href="/staff/publication/create" class="btn btn-primary">Add One</a>
        </div>
        <div class="card-body">
            @if(count($publications) == 0)
                <h6 class="text-center">
                    No Publications Found
                </h6> 
            @else 
                <table class="table table-bordered mb-0" style="font-size: 14px;">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th> 
                            <th>Staff Name</th>
                            <th>ISSN / ISBN</th> 
                            <th>Date</th>
                            <th>Indexing</th>
                            <th>Volume</th>
                            <th>Issues</th>
                            <th>Subject</th>
                            <th>Number of Pages</th>
                            <th>Collabration</th> 
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($publications as $key=>$prg)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $prg->name }}</td>
                                <td>{{ $prg->staffname }}</td>
                                <td>{{ $prg->type }}</td>
                                <td>{{ $prg->date }}</td>
                                <td>{{ $prg->indexing }}</td>
                                <td>{{ $prg->volume }}</td>
                                <td>{{ $prg->issues }}</td>
                                <td>{{ $prg->subject }}</td>
                                <td>{{ $prg->NumberOfPages }}</td>
                                <td>{{ $prg->collabration }}</td> 
                                <td class="d-flex jes-sp" >
                                    <a href="/staff/publication/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Program" >
                                        <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                                    </a>
                                    <a href="/staff/publication/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Program" >
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