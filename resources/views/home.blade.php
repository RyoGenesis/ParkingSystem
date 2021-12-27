@extends('layouts.layout')
@section('title-header','ParkSys - Welcome')

@section('content')
    <div class="row px-2 px-lg-5 flex-grow-1 d-flex flex-column">
        <div class="col-12 text-center">
            <h1 class="fw-bold">Welcome To ParkSys</h1>
            <p class="fw-bold fs-6 font-italic">Please Choose Our Following Services Below</p>
        </div>
        <div class="text-center mb-3">
            <button type="button" class="btn btn-success fw-bold" data-bs-toggle="modal" data-bs-target="#checkCode">
                Check Code
            </button>
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
    
    <div class="modal fade" id="checkCode" tabindex="-1" aria-labelledby="checkCodeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content text-center">
            <div class="modal-header">
              <h5 class="modal-title m-auto" id="checkCodeTitle">Check Code For Vehicle</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form action="{{ url('/checkCode') }}" method="POST">
                    @csrf
                    <div class="m-3 justify-content-center">
                        <label class="fw-bold py-2 fs-4" for="license_plate">Enter Your License Plate</label>
                        <input class="form-control form-control-lg w-75 m-auto text-uppercase @error('license_plate') is-invalid @enderror" type="text" name="license_plate" id="license_plate">
                        @error('license_plate')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        @error('notFound')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button class="btn btn-warning fs-5" type="submit">Check</button>                
                </form>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('script')
    @if (count($errors) > 0)
    <script>
        $(document).ready(function(){
            $('#checkCode').modal('show');
        });
    </script>
    @endif
@endsection