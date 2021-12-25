@extends('layouts.layout')
@section('title-header','ParkSys - Welcome')

@section('content')
<div class=" card col-5 m-auto">
    <div class="card-header">
        <p class="m-0 text-center fw-bolder">Admin Login</p>
    </div>
    <div class="card-body">
        <div class="w-75 m-auto">
            <form action="{{ url('/parkVehicle') }}" method="POST">
                @csrf
                <label for="license_plate">E-mail Address</label>
                <input class="form-control" type="text" name="license_plate" id="license_plate" @error('license_plate') is-invalid @enderror>
                    @error('email_address')
                            <p>{{$message}}</p>
                    @enderror
                <td><button class="btn btn-warning" type="submit">Login</button></td>                 
            </form>
        </div>
    </div>
</div>
@endsection