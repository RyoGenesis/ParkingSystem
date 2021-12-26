@extends('layouts.layout')
@section('title-header','ParkSys - Checkout Detail')

@section('content')
<div class=" card col-10 col-lg-6 col-md-7 m-auto text-center border-2 bg-light border-warning">
    <div class="card-header menu-bg">
        <p class="m-0 fw-bolder fs-2">Check Out Detail</p>
    </div>
    <div class="card-body">
        <p class="text-success fw-bold">Successfully Check Out! See You Again Soon!</p>
        <div class="m-2 text-center">
            <p class="fw-bold m-0">For License Plate:</p>
            <p>{{session('parking') ? session('parking')->vehicle->license_plate : "LICENSE PLATE"}}</p>
            <p class="fw-bold m-0">With Code:</p>
            <p>{{session('parking') ? session('parking')->unique_code : "CODE"}}</p>
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
            <p class="fw-bold m-0">Time Parked:</p>
            <p>{{session('difference') ? session('difference')->h . ' hour(s) ' 
                                        . session('difference')->i . ' min(s) ' 
                                        . session('difference')->s . ' second(s)'
                                    : "XX hour(s) XX min(s) XX second(s)"}}
            </p>
            <p class="fw-bold m-0">Total Payment (Rp 3000/hr):</p>
            <p>Rp. {{session('price') ?: "XXXXX"}}
            </p>
        </div>   
        <a href="{{ route('home')}}" class="btn btn-warning">OK</a>
    </div>
</div>
@endsection