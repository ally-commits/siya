@extends('layouts.dept')

@section('content')
<div class="container">
    @if(count($programs) == 0)
        <h3 class="text-center">
            No Major Programs Found
        </h3> 
    @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>#</th> 
                    <th>Duration</th> 
                    <th>Programme</th>
                    <th>Faculty Association</th>
                    <th>Number Of Beneficiaries</th>
                    <th>Level</th>
                    <th>Department</th> 
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $key=>$mtg)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $mtg->duration }}</td> 
                        <td>{{ $mtg->programme }}</td>
                        <td>{{ $mtg->facultyAssociation }}</td>
                        <td>{{ $mtg->noOfBeneficiaries }}</td>
                        <td>{{ $mtg->level }}</td>
                        <td>{{ $mtg->department }}</td> 
                        <td class="d-flex jes-sp" >
                            <a href="/dept/deptMajorProgram/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Edit Major Programme" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/dept/deptMajorProgram/delete/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Delete Major Programme" >
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