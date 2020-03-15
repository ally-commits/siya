@extends("layouts.admin")

@section("content")
    <div class="container">
        <div class="row d-flex" style="justify-content: space-around;">
            @foreach($values as $key=>$value) 
                <div class="card col-md-3 m-2 p-2 shadow">
                    <i class="{{ $icon[rand(0,9)]}} text-center {{ $color[rand(0,9)]}}" style="font-weight: 100;font-size: 30px;"></i>
                    <h6 class="text-center">{{ $value }}</h6>
                    <div class="d-flex" style="justify-content: space-around">
                        <a href="/admin/activity/{{$key}}" class="btn btn-primary" style="width: 100px;">Add</a>
                        <a href="/admin/report/{{$key}}" class="btn btn-danger" style="width: 100px;">Report</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection