@extends('layouts.layout')
@section('title-header','ParkSys - Checkout Detail')

@section('content')
<h1 class="text-center p-3">Check Out Parking Lot</h1>
<div class=" card col-10 col-lg-6 col-md-7 m-auto text-center border-2 bg-light border-warning">
    <div class="card-header menu-bg">
        <p class="m-0 fw-bolder fs-2">Check Out Detail</p>
    </div>
    <div class="card-body">
        <p class="text-success">Successfully Check Out! See You Again Soon!</p>
        <div class="m-2 text-center">
            <p class="fw-bold m-0">For License Plate:</p>
            <p>{{session('parking') ? session('parking')->vehicle->license_plate : "LICENSE PLATE"}}</p>
            <p class="fw-bold m-0">With Unique Code:</p>
            <p>{{session('parking') ? session('parking')->unique_code : "UNIQUE CODE"}}</p>
            <div class="row">
                <div class="col">
                    <p class="fw-bold m-0">Time In:</p>
                    <p>{{session('parking') ? session('parking')->time_in : "TIME IN"}}</p>
                </div>
                <div class="col">
                    <p class="fw-bold m-0">Time Out:</p>
                    <p>{{session('parking') ? session('parking')->time_out : "TIME OUT"}}</p>
                </div>
            </div>
        </div>   
        <a href="{{ route('home')}}" class="btn btn-warning">OK</a>
    </div>
</div>
@endsection