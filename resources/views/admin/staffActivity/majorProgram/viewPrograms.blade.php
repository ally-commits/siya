@extends('layouts.admin')

@section('content')
<div class="container"> 
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4><span class="text-capitalize">{{ $type}}</span> Major Programmes
            -{{$user['0']->name}}
        </h4>
        <div>
            <a href="/admin/activity/major_programmes" class="btn btn-primary" data-toggle="tooltip" >
                <span class="btn-inner--icon"><i class="ti-control-record"></i>View Major Programmes</span> 
            </a>
            <a href="/admin/staffActivity/{{$type}}/{{ $staffId }}/majorProgram/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Association" >
                <span class="btn-inner--icon"><i class="ti-plus"></i></span> 
            </a>
            <a onclick="goBack()" class="btn btn-primary"><i class="ti-angle-double-left text-white"></i></a>
        </div>
    </div>
    <hr>
    @if(count($programs) == 0)
        <h3 class="text-center">
            No Major Programmes Found <br>
            <a class="btn btn-danger text-white mt-4" href="/admin/staffActivity/{{$type}}/{{ $staffId }}/majorProgram/create">Add Major Programmes</a>
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
                            <a href="/admin/staffActivity/{{$type}}/{{$staffId}}/majorProgram/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Edit Major Programme" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/{{$type}}/{{$staffId}}/majorProgram/delete/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Delete Major Programme" >
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