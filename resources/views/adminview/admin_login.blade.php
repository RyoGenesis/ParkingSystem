@extends('layouts.layout')
@section('title-header','ParkSys - Admin Login')

@section('content')
        <div class=" card col-5 m-auto">
            <div class="card-header">
                <p class="m-0 text-center fw-bolder">Admin Login</p>
            </div>
            <div class="card-body">
                <div class="w-75 m-auto">
                    <form action="/doLogin" method="POST">
                        @csrf
                        <table class="table table-borderless">
                            <thead></thead>
                            <tbody>
                                <tr>
                                    <td class="col-5"><label for="email">E-mail Address</label></td>
                                    <td>
                                        <input class="form-control" type="text" name="email_address" id="email" value={{Cookie::get('email')!= null? Cookie::get("email"):""}} @error('email_address') is-invalid @enderror>
                                        @error('email_address')
                                            <p>{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-5"><label  for="password">Password</label></td>
                                    <td>
                                        <input class="form-control" type="password" name="password" id="password" @error('password') is-invalid @enderror>
                                        @error('password')
                                            <p>{{$message}}</p>
                                        @enderror
                                        @if ($errors != null)
                                            @foreach ($errors->all() as $error)
                                                @if($error == "Invalid Account!")<p>{{$error}}</p>@endif
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>                
                                <tr>
                                    <td colspan="2" class="text-center"><input type="checkbox" name="remember" id="remember"> Remember Me</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><button class="btn btn-warning" type="submit">Login</button></td>
                                </tr>
                            </tbody>
                        </table>                  
                    </form>
                </div>
            </div>
        </div>
@endsection