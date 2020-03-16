@extends('layouts.admin')

@section('content')
<div class="container"> 
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4>All Staff Majar Program</h4>
        <div>
            <a href="/admin/staffActivity/000/majorProgram/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Association" >
                <span class="btn-inner--icon"><i class="ti-plus"></i></span> 
            </a>
            <a href="/admin/activity" class="btn btn-info"><i class="ti-angle-double-left text-white"></i></a>
        </div>
    </div>
    @if(count($programs) == 0)
        <h3 class="text-center">
            No Major Programs Found
        </h3> 
    @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>#</th> 
                    <th>From</th> 
                    <th>To</th> 
                    <th>Programme</th>
                    <th>Faculty Association</th>
                    <th>Number Of Beneficiaries</th>
                    <th>Level</th>
                    <th>Department</th> 
                    <th>Description</th> 
                    <th>Action</th>  
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $key=>$mtg)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $mtg->from }}</td> 
                        <td>{{ $mtg->to }}</td> 
                        <td>{{ $mtg->programme }}</td>
                        <td>{{ $mtg->facultyAssociation }}</td>
                        <td>{{ $mtg->noOfBeneficiaries }}</td>
                        <td>{{ $mtg->level }}</td>
                        <td>{{ $mtg->department }}</td> 
                        <td>{{ $mtg->desc }}</td>
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/{{$mtg->userId}}/majorProgram/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Edit Major Programme" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/{{$mtg->userId}}/majorProgram/delete/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Delete Major Programme" >
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