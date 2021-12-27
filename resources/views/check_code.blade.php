@extends('layouts.layout')
@section('title-header','ParkSys - Check Code')

@section('content')
<div class=" card col-10 col-lg-6 col-md-7 m-auto text-center border-2 bg-light border-warning">
    <div class="card-header menu-bg">
        <p class="m-0 fw-bolder fs-2">Check Code</p>
    </div>
    <div class="card-body">
        <div class="m-2 text-center">
            <p class="fw-bold m-0">License Plate:</p>
            <p>{{session('parking') ? session('parking')->vehicle->license_plate : "LICENSE PLATE"}}</p>
            <p class="fw-bold m-0">Your Code:</p>
            <p id="code">{{session('parking') ? session('parking')->unique_code : "UNIQUE CODE"}}</p>
            <div class="tooltip-copy mb-3">
                <button class="btn btn-secondary" onclick="copyText()">
                    <span class="tooltiptext" id="toolTip">Copy to clipboard</span>
                    Copy
                </button>
            </div>
        </div>   
        <a href="{{route('home')}}" class="btn btn-warning">Home</a>
        <a href="{{route('checkout')}}" class="btn btn-danger">Checkout</a>
    </div>
</div>
@endsection

@section('script')
    <script>
        function copyText() {
            var copy = document.getElementById("code");
            navigator.clipboard.writeText(copy.innerHTML);
            
            var tooltip = document.getElementById("toolTip");
            tooltip.innerHTML = "Copied!";
        }
    </script>
@endsection