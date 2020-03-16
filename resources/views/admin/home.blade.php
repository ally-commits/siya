@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Admin Dashboard</h5>
            </div>
            <div class="card-body row">
                @foreach($value_names as $key=>$name)
                    <div class="col-md-3">
                        <div class="card text-center shadow m-2 d-flex flex-row align-items-center justify-content-between">
                            <i class="{{$icons[$key] }} p-2 {{ $colors[rand(0,6)] }}" style="font-size: 45px;"></i>
                            <div class="d-flex flex-column justify-content-center align-items-center p-2">
                                <h6 class="p-0 m-0">{{$name}}</h6>
                                <p class="p-0 m-0" style="font-size: 30px; font-weight: 100;">{{ $value_count[$key] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection