@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4>Staff Publication
            @if($staffId == 000)
                Admin
            @else
                {{$user['0']->name}}
            @endif
        </h4>
        <div>
            <a href="/admin/activity/publications" class="btn btn-primary" data-toggle="tooltip" >
                <span class="btn-inner--icon"><i class="ti-control-record"></i>View All Publications</span> 
            </a>
            <a href="/admin/staffActivity/{{ $staffId }}/publication/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Publication" >
                <span class="btn-inner--icon"><i class="ti-plus"></i></span> 
            </a>
            <a href="/admin/staffActivity/1" class="btn btn-info"><i class="ti-angle-double-left text-white"></i></a>
        </div>
    </div>
    @if(count($publications) == 0)
        <h3 class="text-center">
            No Publications Found
        </h3> 
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
                            <a href="/admin/staffActivity/{{$staffId}}/publication/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Publication" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/{{$staffId}}/publication/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Publication" >
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