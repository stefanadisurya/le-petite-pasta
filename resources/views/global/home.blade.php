@extends('layouts.master')

@section('title', 'Home — Le Petite Pasta')

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

        .btn1, .card .btn1 {
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

        .card .btn-danger {
            border-radius: 10px;
        }

        hr {
        border-color: #000000;
        width: 100px;
        margin-top: 50px;
    }
    </style>
@endsection

@section('content')
<div class="container my-5">

    <h1 class="font-weight-bold text-center mt-5">Menu</h1>
    <hr>

    @if (auth()->user()->role=="admin")

    <div class="row">
        <div class="col-md-12 d-flex justify-content-center mt-5">
            <a href="{{ route('add') }}" class="btn btn1 btn-large btn-lg">Add Menu</a>
        </div>
    </div>

    <div class="row justify-content-start">
        @forelse ($products as $product)
            <div class="col-md-3 my-3">
                <div class="card mt-5" style="width: 15rem;">
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
    @endif
</div>
@endsection