@extends('layouts.master')

@section('title', 'Le Petite Pasta')

@section('styles')
    <style>
        * {
            font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
        }

        .jumbotron {
            /* background-image: url('assets/header1.jpg'); */
            background-color: #000000;
            height: 500px;
            margin-top: -120px;
        }

        .jumbotron .display-4 {
            margin-top: 130px;
        }

        .jumbotron .btn {
            background-color: #ff552f;
            border-radius: 10px;
        }

        .card .btn {
            background-color: #000000;
            border-radius: 10px;
        }

        .card img {
            width: 160px;
            height: 160px;
            border-radius: 5px;
        }
    </style>
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 text-white">Le Petite Pasta</h1>
        <p class="lead text-white">your pasta buddy.</p>
        <a href="#">
            <button class="btn text-white mt-3">Our Menu</button>
        </a>
    </div>
</div>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4 d-flex justify-content-start">
            <div class="card mt-5 bg-transparent border-light" style="width: 30rem;">
                <div class="card-body">
                  <h1 class="card-title font-weight-bold mb-3">About</h1>
                  <p class="card-text">Created in 2020, Le Petite Pasta innovates to make an instant pasta. The presentation of the pasta is quite simple, namely by using a small container of aluminum foil, with the aim that it can be warmed if you want to consume it for a long time.</p>
                  <a href="#">
                    <button class="btn text-white mt-4 mb-5">Read More</button>
                  </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mt-5 bg-transparent border-light" style="width: 30rem;">
                <div class="card-body">
                  <h1 class="card-title font-weight-bold mb-3">Our Menu</h1>
                  <div class="row">
                    @foreach ($products as $product)
                    <div class="col-sm-5">
                        <img src="{{ asset('assets/' . $product->image) }}" alt="" class="mb-3">
                    </div>
                    
                  @endforeach
                  </div>
                    <a href="#">
                        <button class="btn text-white mt-4 mb-5">View All</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection