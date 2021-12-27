@extends('layouts.layout')
@section('title-header','ParkSys - Profile')

@section('content')
        <div class=" card col-lg-5 m-auto bg-light border-warning">
            <div class="card-header menu-bg">
                <p class="m-0 text-center fw-bolder">Admin Profile</p>
            </div>
            <div class="card-body text-center">
                <div class="w-100 m-auto">
                    <table class="table table-borderless text-start">
                        <tbody>
                            <tr>
                                <td class="col-5 fw-bold">Name :</td>
                                <td>{{Auth::user()->name}}</td>
                            </tr>
                            <tr>
                                <td class="col-5 fw-bold">Email :</td>
                                <td>{{Auth::user()->email}}</td>
                            </tr>
                            <tr>
                                <td class="col-5 fw-bold">Address :</td>
                                <td>{{Auth::user()->address}}</td>
                            </tr> 
                            <tr>
                                <td class="col-5 fw-bold">Gender :</td>
                                <td>{{Auth::user()->gender}}</td>
                            </tr>
                            <tr>
                                <td class="col-5 fw-bold">Date Of Birth :</td>
                                <td>{{Auth::user()->dob}}</td>
                            </tr>                  
                        </tbody>
                    </table>  
                    <a class="btn btn-warning text-center" href="{{ route('admin.profile.edit')}}">Edit</a>                    
                </div>
            </div>
        </div>
@endsection