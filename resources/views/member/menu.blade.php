@extends('layouts.master')

@section('title', 'Menu — Le Petite Pasta')

@section('styles')
<style>
    * {
        font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
    }

    .jumbotron {
        background-color: #000000;
        height: 500px;
        margin-top: -120px;
    }

    .card .btn {
        background-color: #000000;
        color: #ffffff;
        border-radius: 10px;
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

    hr {
        border-color: #000000;
        width: 100px;
        margin-top: 50px;
    }

    h5, .card p, .card a {
        margin-left: -10px;
    }
</style>
@endsection

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            
        </div>
    </div>

    <h1 class="font-weight-bold text-center mt-5 ">Our Menu</h1>
    <hr>
    <div class="container my-5">
        <div class="row justify-content-center">
            @forelse ($products as $product)
                <div class="col-md-3 my-3">
                    <div class="card bg-transparent border-light mt-5" style="width: 15rem;">
                            <img src="{{ asset('assets/image/' . $product->image) }}" style="height:250px" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold text-dark">{{ $product->name }}</h5>
                                <p class="card-text">Rp {{ $product->price }}</p>
                                <div class="row justify-content-start">
                                <div class="col-md-12 my-2">
                                    <a href="/menu/{{ $product->id }}" class="btn">Order</a>
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
    </div>

    @for ($i = 0; $i < 3; $i++)
        <br>
    @endfor

@endsection