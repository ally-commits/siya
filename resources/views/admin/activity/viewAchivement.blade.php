@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4>All Staff Achivements</h4>
        <div>
            <a href="/admin/staffActivity/000/achivements/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Achivements" >
                <span class="btn-inner--icon"><i class="ti-plus"></i></span> 
            </a>
            <a href="/admin/activity" class="btn btn-info"><i class="ti-angle-double-left text-white"></i></a>
        </div>
    </div>
    @if(count($achive) == 0)
        <div class="text-center" style="align-items: center;">
            <h5>No Achivements Found</h5>
        </div> 
    @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Achive</th>
                    <th>PLace</th>
                    <th>Organisation</th>
                    <th>Nature</th> 
                    <th>Date</th> 
                    <th>Level</th> 
                    <th>Guided By</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($achive as $key=>$a)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $a->name }}</td>
                        <td>{{ $a->dept }}</td>
                        <td>{{ $a->achive }}</td>
                        <td>{{ $a->place }}</td>
                        <td>{{ $a->organisation }}</td>
                        <td>{{ $a->nature }}</td>
                        <td>{{ $a->date }}</td>
                        <td>{{ $a->level }}</td> 
                        <td>{{ $a->guidedBy }}</td> 
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/{{ $a->userId }}/achivements/{{ $a->id}}" data-toggle="tooltip" data-original-title="Edit Achivements" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/{{ $a->userId }}/achivements/delete/{{ $a->id}}" data-toggle="tooltip" data-original-title="Delete Achivements" >
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