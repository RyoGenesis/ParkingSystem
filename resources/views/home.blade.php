@extends('layouts.layout')
@section('title-header','ParkSys - Welcome')

@section('content')
    <div class="row px-2 px-lg-5 flex-grow-1 d-flex flex-column">
        <div class="col-12 text-center text-white">
            <h1>Welcome To ParkSys</h1>
            <p class="fw-bold fs-6 font-italic">Please Choose Our Following Services Below</p>
        </div>
        <div class="row row-cols-1 row-cols-lg-2 m-auto">
            <div class="col">
                <a class="btn btn-primary container-fluid" href="{{ route('park-vehicle') }}">
                    <i class="fa fa-parking my-md-4 icon-img"></i>
                    <p class="mb-md-4 mb-0s fs-3 fw-bold">Park Vehicle</p>
                </a>
            </div>
            <div class="col mt-3 mt-lg-0">
                <a class="btn btn-danger container-fluid" href="{{ route('checkout') }}">
                    <i class="fa fa-car my-md-4 icon-img"></i>
                    <p class="mb-md-4 mb-0s fs-3 fw-bold">Parking Check Out</p>
                </a>
            </div>
        </div>
    </div>
    
@endsection