@extends('layouts.layout')
@section('title-header','ParkSys - Dashboard')

@section('content')
    <div class="text-center">
        <h1>Dashboard</h1>
        <p class="fw-bold">Welcome, admin {{Auth::user()->name}}</p>
    </div>
    <div class="container">
        <a class="btn btn-danger" href="{{ route('admin.report.all')}}">View All Parking Data Report</a>
    </div>
@endsection