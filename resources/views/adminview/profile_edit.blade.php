@extends('layouts.layout')
@section('title-header','ParkSys - Edit Profile')

@section('content')
        <div class=" card col-lg-5 m-auto bg-light border-warning">
            <div class="card-header menu-bg">
                <p class="m-0 text-center fw-bolder">Edit Profile</p>
            </div>
            <div class="card-body text-center">
                <div class="w-100 m-auto">
                    <form action="{{ url('/admin/update')}}" method="POST">
                        @csrf
                        <table class="table table-borderless text-start">
                            <tbody>
                                <tr>
                                    <td class="col-5"><label for="name">Name :</label></td>
                                    <td>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{Auth::user()->name}}">
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-5"><label for="email">Email :</label></td>
                                    <td>
                                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{Auth::user()->email}}">
                                        @error('email')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-5"><label for="address">Address</label></td>
                                    <td>
                                        <textarea class="form-control  @error('address') is-invalid @enderror" name="address" id="address" cols="50" rows="2">{{Auth::user()->address}}</textarea>  
                                        @error('address')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="col-4" for="gender">Gender</label></td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="@error('gender') is-invalid @enderror" type="radio" name="gender" id="male" value="Male" {{ Auth::user()->gender == 'Male' ? "checked" : "" }}>
                                            <label for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="@error('gender') is-invalid @enderror" type="radio" name="gender" id="female" value="Female" {{ Auth::user()->gender == 'Female' ? "checked" : "" }}>
                                            <label for="female">Female</label>
                                        </div>
                                        @error('gender')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-5"><label for="dob">Date Of Birth</label></td>
                                    <td>
                                        <input class="form-control @error('dob') is-invalid @enderror" type="date" name="dob" id="dob" value="{{Auth::user()->dob}}">
                                        @error('dob')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>                
                            </tbody>
                        </table>  
                        <button class="btn btn-primary" type="submit">Save</button>
                        @error('error')
                            <p class="text-danger">{{$message}}</p>
                        @enderror                   
                    </form>
                </div>
            </div>
        </div>
@endsection