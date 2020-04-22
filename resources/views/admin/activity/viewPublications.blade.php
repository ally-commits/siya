@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4>All Publication</h4>
        <div> 
            <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/publication" class="btn btn-primary" data-toggle="tooltip" data-original-title="View Admin Publication" >
                <span class="btn-inner--icon">View Admin Publication<i class="ti-eye"></i></span> 
            </a>
            <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/publication/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Admin Publication" >
                <span class="btn-inner--icon">Admin <i class="ti-plus"></i></span> 
            </a>
            <a href="/admin/staffActivity/staff/1" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Staff Publication" >
                <span class="btn-inner--icon">Staff <i class="ti-plus"></i></span> 
            </a>
            <a onclick="goBack()" class="btn btn-primary"><i class="ti-angle-double-left text-white"></i></a>
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
                    <th>User</th>
                    <th>Name</th> 
                    <th>ISSN / ISBN</th> 
                    <th>Date</th>
                    <th>Indexing</th>
                    <th>Volume</th>
                    <th>Issues</th>
                    <th>Subject</th>
                    <th>Number of Pages</th>
                    <th>Collaboration</th> 
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($publications as $key=>$prg)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $prg->userType }} ( {{ $prg->userName }} )</td>
                        <td>{{ $prg->name }}</td>
                        <td>{{ $prg->type }}</td>
                        <td>{{ $prg->date }}</td>
                        <td>{{ $prg->indexing }}</td>
                        <td>{{ $prg->volume }}</td>
                        <td>{{ $prg->issues }}</td>
                        <td>{{ $prg->subject }}</td>
                        <td>{{ $prg->NumberOfPages }}</td>
                        <td>{{ $prg->collabration }}</td> 
                        @if($prg->userId != null)
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/staff/{{$prg->userId}}/publication/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Publication" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/staff/{{$prg->userId}}/publication/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Publication" >
                                <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                            </a>
                        </td>
                        @else
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/admin/{{$prg->adminId}}/publication/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Edit Publication" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/admin/{{$prg->adminId}}/publication/delete/{{ $prg->id}}" data-toggle="tooltip" data-original-title="Delete Publication" >
                                <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                            </a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>    
    @endif
</div>
@endsection