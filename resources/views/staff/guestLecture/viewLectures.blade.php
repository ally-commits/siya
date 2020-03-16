@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Guest Lecture</h5>
            <a href="/staff/guestLecture/create" class="btn btn-primary">Add One</a>
        </div>
        <div class="card-body">
            @if(count($lectures) == 0)
                <h6 class="text-center">
                    No Guest Lectures Found
                </h6> 
            @else 
                <table class="table table-bordered mb-0" style="font-size: 14px;">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th> 
                            <th>Date</th> 
                            <th>Designation</th>
                            <th>Resource Person</th>
                            <th>Place</th>
                            <th>Topic</th>
                            <th>Department</th>
                            <th>Beneficiaries</th>
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lectures as $key=>$mtg)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $mtg->date }}</td> 
                                <td>{{ $mtg->designation }}</td>
                                <td>{{ $mtg->resourcePerson }}</td>
                                <td>{{ $mtg->place }}</td>
                                <td>{{ $mtg->topic }}</td>
                                <td>{{ $mtg->department }}</td>
                                <td>{{ $mtg->beneficiaries }}</td> 
                                <td class="d-flex jes-sp" >
                                    <a href="/staff/guestLecture/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Edit Guest Lecture" >
                                        <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                                    </a>
                                    <a href="/staff/guestLecture/delete/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Delete Guest Lecture" >
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