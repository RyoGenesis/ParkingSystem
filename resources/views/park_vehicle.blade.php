@extends('layouts.layout')
@section('title-header','ParkSys - Park')

@section('content')
<h1 class="text-center p-3">Park Your Vehicle</h1>
<div class="card col-10 col-lg-6 col-md-7 m-auto text-center border-2 bg-light border-warning">
    <div class="card-header menu-bg">
        <p class="m-0 fw-bolder fs-2">Park Vehicle</p>
    </div>
    <div class="card-body">
        <div class="w-75 m-auto">
            <form action="{{ url('/parkVehicle') }}" method="POST">
                @csrf
                <div class="m-3 justify-content-center">
                    <label class="fw-bold py-2 fs-4" for="license_plate">Enter Your License Plate</label>
                    <input class="form-control form-control-lg w-75 m-auto @error('license_plate') is-invalid @enderror" type="text" name="license_plate" id="license_plate">
                    @error('license_plate')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    @error('isParked')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button class="btn btn-warning fs-5" type="submit">Confirm</button>                
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="parkConfirmation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="parkConfirmationLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title" id="parkConfirmationTitle">Successfully Register Parking Information</h5>
      </div>
      <div class="modal-body text-center">
        <p class="text-success">{{session('success')}}</p>
        <a href="{{ route('home')}}" class="btn btn-warning">OK</a>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
@if(session('success'))
<script>
    $(document).ready(function(){
        $('#parkConfirmation').modal('show');
    });
</script>
@endif
@endsection
  
