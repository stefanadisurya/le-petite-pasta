@extends('layouts.master')

@section('title', 'Register')

@section('styles')
<link href="{{ asset('css/main.css') }}" rel="stylesheet" media="all">
@endsection

@section('content')
<div class="page-wrapper p-t-100 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title d-flex justify-content-center">Register</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row row-space">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label for="first_name" class="label">First Name</label>
                                <input id="first_name" class="input--style-4 @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label for="last_name" class="label">Last Name</label>
                                <input id="last_name" class="input--style-4 @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ old('last_name') }}" required>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row row-space">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label for="username" class="label">Username</label>
                                <input id="username" class="input--style-4 @error('username') is-invalid @enderror" type="text" name="username" value="{{ old('username') }}" required>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label for="email" class="label">Email</label>
                                <input id="email" class="input--style-4 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row row-space">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label for="phone_number" class="label">Phone Number</label>
                                <input id="phone_number" class="input--style-4 @error('phone_number') is-invalid @enderror" type="text" name="phone_number" value="{{ old('phone_number') }}" required>
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label for="gender" class="label">Gender</label>
                                <div class="p-t-10">
                                    <label class="radio-container m-r-45">Male
                                        <input type="radio" name="gender" value="female" required>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">Female
                                        <input type="radio" name="gender" value="female" required>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-group">
                        <div class="col-lg-12">
                            <div class="input-group">
                                <label for="address" class="label">Address</label>
                                <input id="address" class="input--style-4 @error('address') is-invalid @enderror" type="text" name="address" value="{{ old('address') }}" required>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row row-space">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label for="password" class="label">Password</label>
                                <input id="password" class="input--style-4 @error('password') is-invalid @enderror" type="password" name="password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <label for="password_confirmation" class="label">Confirm Password</label>
                                <input id="password_confirmation" class="input--style-4" type="password" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-t-15 d-flex justify-content-center">
                        <button class="btn btn--radius-2 bg-dark" type="submit">Register</button>
                    </div>
                </form>

                <div class="p-t-15 d-flex justify-content-center">
                    <p>Already a member?
                        <a href="{{ route('login') }}">
                            Login
                        </a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
