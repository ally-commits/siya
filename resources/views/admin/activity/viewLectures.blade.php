@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex" style="justify-content: space-between; align-items: center;">
        <h4>All Guest Lecture</h4>
        <div> 
            <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/guestLecture" class="btn btn-primary" data-toggle="tooltip" data-original-title="View Admin Guest Lecture" >
                <span class="btn-inner--icon">View Admin Guest Lecture <i class="ti-eye"></i></span> 
            </a>
            <a href="/admin/staffActivity/admin/{{ Auth::user()->id }}/guestLecture/create" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Admin Guest Lecture" >
                <span class="btn-inner--icon">Admin <i class="ti-plus"></i></span> 
            </a>
            <a href="/admin/staffActivity/staff/1" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add Staff Guest Lecture" >
                <span class="btn-inner--icon">Staff <i class="ti-plus"></i></span> 
            </a>
            <a onclick="goBack()" class="btn btn-primary"><i class="ti-angle-double-left text-white"></i></a>
        </div>
    </div>
    @if(count($lectures) == 0)
        <h3 class="text-center">
            No Guest Lectures Found
        </h3> 
    @else 
        <table class="table table-bordered mb-0" style="font-size: 14px;">
            <thead class="thead-light">
                <tr>
                    <th>#</th> 
                    <th>User</th>
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
                        <td>
                            @if($mtg->userId != null)
                            <a href="/admin/staffActivity/{{$mtg->userType}}/{{$mtg->userId}}/guestLecture" class="text-primary">
                                {{ $mtg->userType }} ( {{ $mtg->userName }} )
                            </a>
                            @elseif($mtg->adminId != null)
                            <a href="/admin/staffActivity/{{$mtg->userType}}/{{$mtg->adminId}}/guestLecture" class="text-primary">
                                {{ $mtg->userType }} ( {{ $mtg->userName }} )
                            </a> 
                            @endif
                        </td>
                        <td>{{ $mtg->date }}</td> 
                        <td>{{ $mtg->designation }}</td>
                        <td>{{ $mtg->resourcePerson }}</td>
                        <td>{{ $mtg->place }}</td>
                        <td>{{ $mtg->topic }}</td>
                        <td>{{ $mtg->department }}</td>
                        <td>{{ $mtg->beneficiaries }}</td>
                        @if($mtg->userId != null) 
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/staff/{{$mtg->userId}}/guestLecture/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Edit Guest Lecture" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/staff/{{$mtg->userId}}/guestLecture/delete/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Delete Guest Lecture" >
                                <span class="btn-inner--icon"><i class="ti-close"></i></span> 
                            </a>
                        </td>
                        @else
                        <td class="d-flex jes-sp" >
                            <a href="/admin/staffActivity/admin/{{$mtg->adminId}}/guestLecture/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Edit Guest Lecture" >
                                <span class="btn-inner--icon"><i class="ti-pencil"></i></span> 
                            </a>
                            <a href="/admin/staffActivity/admin/{{$mtg->adminId}}/guestLecture/delete/{{ $mtg->id}}" data-toggle="tooltip" data-original-title="Delete Guest Lecture" >
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