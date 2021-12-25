@extends('layouts.layout')
@section('title-header','ParkSys - Checkout')

@section('content')
<h1 class="text-center p-3">Check Out Parking Lot</h1>
<div class=" card col-10 col-lg-6 col-md-7 m-auto text-center border-2 bg-light border-warning">
    <div class="card-header menu-bg">
        <p class="m-0 fw-bolder fs-2">Check Out</p>
    </div>
    <div class="card-body">
        <div class="w-75 m-auto">
            <form action="{{ url('/checkoutVehicle') }}" method="POST">
                @csrf
                <div class="m-3 justify-content-center">
                    <label class="fw-bold py-2 fs-4" for="code">Enter Unique Code</label>
                    <input class="form-control form-control-lg w-75 m-auto @error('unique_code') is-invalid @enderror" type="text" name="code" id="code" >
                    @error('code')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    @error('invalid')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button class="btn btn-warning fs-5" type="submit">Confirm</button>                 
            </form>
        </div>
        @if (session('success'))
            <p class="text-success">{{session('success')}}</p>
        @endif 
    </div>
</div>
@endsection