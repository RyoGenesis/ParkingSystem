@extends('layouts.layout')
@section('title-header','ParkSys - Dashboard')

@section('content')
    <div class="text-center">
        <h1 class="fw-bold">Dashboard</h1>
        <p class="fw-bold" >Welcome, admin {{Auth::user()->name}}</p>
    </div>
    <div class="container text-center m-auto row d-flex flex-column align-content-center">
        <div class="col-9 p-3">
            <a class="btn btn-success fs-1 col-lg-6 col-12" href="{{ route('admin.report')}}">View Report</a>
        </div>
        <div class="col-9 p-3">
            <a class="btn btn-success fs-1 col-lg-6 col-12" href="{{ route('admin.profile')}}">Profile</a>
        </div>
    </div>
@endsection