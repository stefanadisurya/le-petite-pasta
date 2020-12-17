@extends('layouts.master')

@section('title', 'Profile — Le Petite Pasta')

@section('styles')
    <style>
        * {
            font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
        }

        .card {
            background: #fff;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
        }

        .btn-dark {
            border-radius: 10px;
            -webkit-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            -moz-transition: all 0.4s ease;
            transition: all 0.4s ease;
            cursor: pointer;
            color: #000000;
            font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
        }

        .btn-dark:hover, .btn-dark:focus {
            color: #000000;
        }

        .btn-danger {
            border-radius: 10px;
            -webkit-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            -moz-transition: all 0.4s ease;
            transition: all 0.4s ease;
            cursor: pointer;
            color: #fff;
            font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
        }

        .btn-danger:hover {
            color: #ffffff;
        }

        img {
            border-radius: 300px;
            width: 300px;
            height: 300px
        }
    </style>
@endsection

@section('content')
    <div class="container my-5 showcase-left">
        <div class="row justify-content-start">
            <div class="col-md-12 my-3">
                <div class="card border-light mt-5 mb-3">
                    <div class="row">
                        <div class="col-sm-4 mr-0">
                            <img src="{{ asset('assets/image/' . $user->image) }}" class="mx-3 my-3" alt="{{ $user->name }}">
                        </div>
                        
                        <div class="col-lg-6 mx-5 my-3">
                            <p class="h1 font-weight-bold">{{ $user->first_name }} {{ $user->last_name }}</p>
                            <p><b>Username:</b> {{ $user->username }}</p>
                            <p><b>Role:</b> {{ $user->role }}</p>
                            <p><b>Address:</b> {{ $user->address }}</p>
                            <p><b>Phone Number:</b> {{ $user->phone_number }}</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><b>Gender:</b> {{ $user->gender }}</p>
                                </div>

                                <div class="col-md-8">
                                    <a href="/profile/{{ $user->id }}/edit">
                                        <button type="submit" class="btn btn-dark bg-transparent">Edit Profile</button>
                                    </a>
                                </div>
                                

                                <div class="col-md-4 d-flex justify-content-end">
                                    <form action="/profile/{{ $user->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Remove Account</button>
                                    </form>
                                </div>
                            </div>
                            <br>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br>
@endsection