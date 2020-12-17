@extends('layouts.master')

@section('title', 'Home — Le Petite Pasta')

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

        .cardx {
            background: #fff;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
        }

        .btn1, .card .btn1 {
            padding-right: 24px;
            padding-left: 24px;
            background-color: #000000;
            color: #ffffff;
            border-radius: 10px;
            -webkit-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            -moz-transition: all 0.4s ease;
            transition: all 0.4s ease;
            cursor: pointer;
            color: #fff;
            font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
        }

        .btn1:hover {
            color: #ffffff;
        }

        .btn-large {
            width: 250px;
            padding: 10px;
            box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
        }

        .cardx .btn-danger {
            border-radius: 10px;
        }

        .card img {
            width: 160px;
            height: 160px;
            border-radius: 5px;
        }

        hr {
        border-color: #000000;
        width: 100px;
        margin-top: 50px;
    }
    </style>
@endsection

@section('content')
    @if (auth()->user()->role=="admin")
    <div class="container my-5">
    <h1 class="font-weight-bold text-center mt-5">Menu</h1>
    <hr>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mt-5">
                <a href="{{ route('add') }}" class="btn btn1 btn-large btn-lg">Add Product</a>
            </div>
        </div>

        <div class="row justify-content-center">
            @forelse ($products as $product)
                <div class="col-md-3 my-3">
                    <div class="cardx mt-5" style="width: 15rem;">
                        <a href="/product/{{ $product->id }}">
                            <img src="{{ asset('assets/image/' . $product->image) }}" style="height:250px" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold text-dark">{{ $product->name }}</h5>
                        </a>
                                <p class="card-text">Rp {{ $product->price }}</p>
                                <div class="row justify-content-center">
                                <div class="col-md-6 my-2">
                                    <a href="/edit/{{ $product->id }}" class="btn btn1">Edit</a>
                                </div>

                                <div class="col-md-6 my-2">
                                    <a href="/delete/{{ $product->id }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @empty
                    <div class="d-flex justify-content-center my-5">
                        <p class="h4 text-muted">No item in the store</p>
                    </div>
            @endforelse
        </div>
        @for ($i = 0; $i < 3; $i++)
            <br>
        @endfor
    </div>
    
    @elseif(auth()->user()->role=="member")
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-white">Le Petite Pasta</h1>
            <p class="lead text-white">your pasta buddy.</p>
            <a href="{{ route('menu') }}">
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
                      <a href="{{ route('about') }}">
                        <button class="btn btn1 mt-4 mb-5">Read More</button>
                      </a>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="card mt-5 bg-transparent border-light" style="width: 30rem;">
                    <div class="card-body">
                      <h1 class="card-title font-weight-bold mb-3">Our Menu</h1>
                      <div class="row">
                        @foreach ($halfproducts as $p)
                        <div class="col-sm-5">
                            <img src="{{ asset('assets/image/' . $p->image) }}" alt="" class="mb-3">
                        </div>
                        
                      @endforeach
                      </div>
                        <a href="{{ route('menu') }}">
                            <button class="btn btn1 mt-4 mb-5">View All</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    @for ($i = 0; $i < 3; $i++)
        <br>
    @endfor
    @endif

@endsection