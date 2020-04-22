@extends("layouts.admin")

@section("content")
    <div class="container">
        <div class="row d-flex" style="justify-content: space-around;">
            @foreach($values as $key=>$value) 
                <div class="card col-md-3 m-2 p-2 shadow">
                    <i class="{{ $icon[rand(0,9)]}} text-center {{ $color[rand(0,9)]}}" style="font-weight: 100;font-size: 30px;"></i>
                    <h6 class="text-center">{{ $value }}</h6>
                    <div class="d-flex" style="justify-content: space-around">
                        <a href="/admin/activity/{{$key}}" class="btn btn-primary" style="width: 80px;">Add</a>
                        <a href="/admin/report/{{$key}}" class="btn btn-danger" style="width: 80px;">Report</a>
                        <a href="/admin/activity/{{$key}}" class="btn btn-primary" style="width: 80px;">Delete</a>
                    </div>
                </div>
            @endforeach
            <div class="card col-md-3 m-2 p-2 shadow">
                <i class="{{ $icon[rand(0,9)]}} text-center {{ $color[rand(0,9)]}}" style="font-weight: 100;font-size: 30px;"></i>
                <h6 class="text-center">Generate All Report</h6>
                <div class="d-flex" style="justify-content: space-around; aling-items: center;">
                    <a href="/admin/activity/report/allReport" class="btn btn-primary" style="width: 120px;">All Report</a> 
                </div>
            </div>
        </div>
    </div>
@endsection