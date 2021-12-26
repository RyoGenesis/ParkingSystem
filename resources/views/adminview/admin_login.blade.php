@extends('layouts.layout')
@section('title-header','ParkSys - Admin Login')

@section('content')
        <div class=" card col-lg-5 m-auto bg-light border-warning">
            <div class="card-header menu-bg">
                <p class="m-0 text-center fw-bolder">Admin Login</p>
            </div>
            <div class="card-body">
                <div class="w-75 m-auto">
                    <form class="text-center" action="{{ url('/login') }}" method="POST">
                        @csrf
                        <table class="table table-borderless">
                            <thead></thead>
                            <tbody>
                                <tr>
                                    <td class="col-5"><label for="email">E-mail Address</label></td>
                                    <td>
                                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value={{Cookie::get('email')!= null? Cookie::get("email"):""}}>
                                        @error('email')
                                            <p>{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-5"><label  for="password">Password</label></td>
                                    <td>
                                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" >
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
                            </tbody>
                        </table>  
                        <button class="btn btn-warning" type="submit">Login</button>                
                    </form>
                </div>
            </div>
        </div>
@endsection