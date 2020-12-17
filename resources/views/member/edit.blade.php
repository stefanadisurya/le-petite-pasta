@extends('layouts.master')

@section('title', 'Profile — Le Petite Pasta')

@section('styles')
<link href="{{ asset('css/main.css') }}" rel="stylesheet" media="all">

<style>
    img {
        border-radius: 200px;
        width: 200px;
        height: 200px
    }

    .disabled {
        opacity: 70%;
    }
</style>
@endsection

@section('content')
<div class="page-wrapper p-t-100 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card showcase-bottom card-4">
            <div class="card-body">
                <h2 class="title d-flex justify-content-center">Edit Profile</h2>
                <form method="POST" action="{{ route('editprofile', $user->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row row-space">
                        <div class="col-lg-12">
                            <div class="input-group d-flex justify-content-center">
                                <img src="{{ asset('assets/image/' . $user->image) }}" alt="">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="input-group d-flex justify-content-center">
                                <div class="col-md-6">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{ old('image') }}">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="input-group">
                                <label for="first_name" class="label">First Name</label>
                                <input id="first_name" class="input--style-4 @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ $user->first_name }}" required>
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
                                <input id="last_name" class="input--style-4 @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ $user->last_name }}" required>
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
                                <input id="username" class="disabled input--style-4 @error('username') is-invalid @enderror" type="text" name="username" value="{{ $user->username }}" disabled>
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
                                <input id="email" class="disabled input--style-4 @error('email') is-invalid @enderror" type="email" name="email" value="{{ $user->email }}" disabled>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row row-space">
                        <div class="col-lg-12">
                            <div class="input-group">
                                <label for="phone_number" class="label">Phone Number</label>
                                <input id="phone_number" class="input--style-4 @error('phone_number') is-invalid @enderror" type="text" name="phone_number" value="{{ $user->phone_number }}" required>
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row row-space">
                        <div class="col-lg-12">
                            <div class="input-group">
                                <label for="address" class="label">Address</label>
                                <input id="address" class="input--style-4 @error('address') is-invalid @enderror" type="text" name="address" value="{{ $user->address }}" required>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row row-space">
                        <div class="col-lg-12">
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
                    </div> --}}
                    
                    <div class="p-t-15 d-flex justify-content-center">
                        <button class="btn btn--radius-2 bg-dark" type="submit">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection