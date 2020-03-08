@extends('layouts.empty')

@section('content')
<div class="w-100" style="background: #7c0a0a;">
    <div class="d-flex container" style="justify-content: flex-start;height: 60px;align-items: center; ">
        <img src="" />
        <h5 class="text-white">St Aloyisus College (Autonomous) Mangaluru</h5> 
    </div>
</div>

<div class="d-flex w-100" style="height: calc(100vh - 60px); align-items: center; justify-content: center;
    background-color: #0a0a0a;
">
    <a href="/login" class="btn btn-lg btn-info m-1 ">Staff Login</a>
    <a href="/login" class="btn btn-lg btn-info m-1">Department Login</a>
    <a href="/login" class="btn btn-lg btn-info m-1">Admin Login</a>
</div>
@endsection