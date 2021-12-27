@extends('layouts.layout')
@section('title-header','ParkSys - Change Password')

@section('content')
        <div class=" card col-lg-5 m-auto bg-light border-warning">
            <div class="card-header menu-bg">
                <p class="m-0 text-center fw-bolder">Change Password</p>
            </div>
            <div class="card-body text-center">
                <div class="w-100 m-auto">
                    <form action="{{ url('/admin/changepass')}}" method="POST">
                        @csrf
                        <table class="table table-borderless text-start">
                            <tbody> 
                                <tr>
                                    <td class="col-5"><label for="password">Current Password</label></td>
                                    <td>
                                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password">
                                        @error('password')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-5"><label  for="newPassword">New Password</label></td>
                                    <td>
                                        <input class="form-control @error('newPassword') is-invalid @enderror" type="password" name="newPassword" id="newPassword">
                                        @error('newPassword')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        
                                    </td>
                                </tr>                
                                <tr>
                                    <td class="col-5"><label  for="confirm">Confirm New Password</label></td>
                                    <td>
                                        <input class="form-control @error('confirm') is-invalid @enderror" type="password" name="confirm" id="confirm">
                                        @error('confirm')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>  
                        <button class="btn btn-primary" type="submit">Change</button>
                        @error('wrong_pass')
                            <p class="text-danger">{{$message}}</p>
                        @enderror 
                        @if (session('success'))
                            <p class="text-success">{{session('success')}}</p>
                        @endif                
                    </form>
                </div>
            </div>
        </div>
@endsection