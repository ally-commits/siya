@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($qualification) == 0)
        <h3 class="text-center">
            No Qualification Found
        </h3> 
    @else 
        <table class="table table-bordered mb-0" style="font-size: 15px;">
            <thead class="thead-light">
                <tr>
                    <th>Sl No</th>
                    <th>Course</th>
                    <th>College Name</th>
                    <th>Year Of Passing</th>
                    <th>Place</th>
                </tr>
            </thead>
            <tbody>
                @foreach($qualification as $key=>$qlf)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $qlf->course }}</td>
                        <td>{{ $qlf->college }}</td>
                        <td>{{ $qlf->year }}</td>
                        <td>{{ $qlf->place }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    @endif
</div>

@endsection