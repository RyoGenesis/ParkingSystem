@extends('layouts.layout')
@section('title-header','ParkSys - Report')

@section('content')
    <div class="text-center">
        <h1 class="fw-bold">View Report</h1>
        <p class="fw-bold">Please Choose From Options Below</p>
    </div>
    <div class="container d-flex flex-column align-content-center justify-content-center p-4 text-center">
        <div class="m-auto my-3">
            <a class="btn btn-danger fs-3" href="{{ route('admin.report.all')}}">View All Parking Data</a>
        </div>
        <p class="fs-3 my-3">OR</p>
        <div class="m-auto">
            <form action="{{ route('admin.report.range')}}">
                <div class="row mb-2">
                    <div class="col p-2">
                        <label for="date_start">Date From</label>
                        <input class="form-control @error('date_start') is-invalid @enderror" type="date" name="date_start" id="date_start">
                        @error('date_start')
                                <p class="mb-0">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col p-2">
                        <label for="date_end">Date To*</label>
                        <input class="form-control @error('date_end') is-invalid @enderror" type="date" name="date_end" id="date_end">
                        @error('date_end')
                                <p class="mb-0">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-danger fs-3 my-2" type="submit">View From Date Range</button>
                <p>(* Please select today's date if there's no end date spcification)</p>
            </form>
        </div>
    </div>
@endsection