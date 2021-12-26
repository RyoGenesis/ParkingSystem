@extends('layouts.layout')
@section('title-header','ParkSys - Report')

@section('content')
    <div class="text-center">
        <h1>Report</h1>
        <p class="fw-bold">Report Result</p>
    </div>
    <div class="container">
        <a class="btn btn-danger" href="{{ route('admin.report.all')}}">View All Parking Data Report</a>
    </div>
@endsection