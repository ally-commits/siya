@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4>Staff Publication</h4>
        <div>
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
                    <th>ISSN /ISBN</th> 
                    <th>Collabration</th> 
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($publications as $key=>$prg)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $prg->name }}</td>
                        <td>{{ $prg->publication_number }}</td>
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