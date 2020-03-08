@extends("layouts.empty")

@section("content")
<div class="container-fluid">                
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="invoice-title">
                                <span class="mt-0 float-right font-14">Date: 12-Sept-2020</span>
                                <div class="mb-4">
                                    Department Report
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <span class="font-14"> 
                                        <strong>{{ $profile[0]->name }}</strong> <br> 
                                        {{ $profile[0]->email }} <br> 
                                    </span>
                                </div> 
                            </div> 
                        </div>
                    </div> 
                    <hr>
                    <div class="row">
                        @foreach($deptData as $key=>$data)  
                            <div class="col-md-12"> 
                                @if($key == 'fdp_meetings' and count($data) > 0)
                                    <h6 class="text-capitalize"><strong>{{ $value_arr[$key] }}<strong></h6>
                                    <table class="table w-100" style="font-size: 14px;">
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Name</th>
                                            <th>Type of Meeting</th>
                                            <th>Duration</th>
                                            <th>Date</th>
                                            <th>Organisers</th>
                                            <th>Place</th> 
                                            <th>Department</th> 
                                            <th>Level</th>  
                                        </tr>
                                        @foreach($data as $k=>$mtg)
                                            <tr>
                                                <td>{{ $k+1 }}</td>
                                                <td>{{ $mtg->name }}</td>
                                                <td>{{ $mtg->typeOfMeeting }}</td>
                                                <td>{{ $mtg->duration }}</td>
                                                <td>{{ $mtg->date }}</td>
                                                <td>{{ $mtg->organisers }}</td>
                                                <td>{{ $mtg->place }}</td>
                                                <td>{{ $mtg->department }}</td>
                                                <td>{{ $mtg->level }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <hr>
                                @endif
                            </div>   
                            <div class="col-md-12"> 
                                @if($key == 'seminar_organiseds' and count($data) > 0)
                                    <h6 class="text-capitalize"><strong>{{ $value_arr[$key] }}<strong></h6>
                                    <table class="table w-100" style="font-size: 14px;">
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Title</th> 
                                            <th>Date</th>
                                            <th>Collab Agency</th>
                                            <th>Speaker</th>
                                            <th>Topic</th>
                                            <th>Department</th>
                                            <th>Place & Designation</th> 
                                            <th>Level</th> 
                                            <th>Beneficiaries</th> 
                                        </tr>
                                        @foreach($data as $k=>$prg)
                                            <tr>
                                                <td>{{ $k+1 }}</td> 
                                                <td>{{ $prg->title }}</td>
                                                <td>{{ $prg->date }}</td>
                                                <td>{{ $prg->collabAgency }}</td>
                                                <td>{{ $prg->speaker }}</td>
                                                <td>{{ $prg->topic }}</td>
                                                <td>{{ $prg->department }}</td> 
                                                <td>{{ $prg->placeAndDesignation }}</td> 
                                                <td>{{ $prg->level }}</td> 
                                                <td>{{ $prg->beneficiaries }}</td> 
                                            </tr>
                                        @endforeach
                                    </table>
                                    <hr>
                                @endif
                            </div>   
                            <div class="col-md-12"> 
                                @if($key == 'major_programmes' and count($data) > 0)
                                    <h6 class="text-capitalize"><strong>{{ $value_arr[$key] }}<strong></h6>
                                    <table class="table w-100" style="font-size: 14px;">
                                        <tr>
                                            <th>Sl No</th> 
                                            <th>Duration</th> 
                                            <th>Programme</th>
                                            <th>Faculty Association</th>
                                            <th>Number Of Beneficiaries</th>
                                            <th>Level</th>
                                            <th>Department</th> 
                                            <th>Action</th> 
                                        </tr>
                                        @foreach($data as $k=>$mtg)
                                            <tr>
                                                <td>{{ $k+1 }}</td>
                                                <td>{{ $mtg->duration }}</td> 
                                                <td>{{ $mtg->programme }}</td>
                                                <td>{{ $mtg->facultyAssociation }}</td>
                                                <td>{{ $mtg->noOfBeneficiaries }}</td>
                                                <td>{{ $mtg->level }}</td>
                                                <td>{{ $mtg->department }}</td> 
                                            </tr>
                                        @endforeach
                                    </table>
                                    <hr>
                                @endif
                            </div> 
                        @endforeach
                    </div>
                </div>
            </div>
        </div>  
    </div> 
</div>
@endsection