@extends('layouts.master')

@section('title', 'Delete product — Le Petite Pasta')

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

    .card {
            background: #fff;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
        }

    .card .btn {
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

    .card img {
        height: 160px;
        border-radius: 5px;
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
    <div class="container my-5">
        <div class="row justify-content-start">
            <div class="col-md-12 my-3">
                <div class="card border-light mt-5 mb-3">
                    <div class="row showcase-left">
                        <div class="col-sm-4 mr-0">
                            <img src="{{ asset('assets/image/' . $product->image) }}" class="mx-3 my-3" alt="{{ $product->name }}" style="width: 370px; height: 350px">
                        </div>
                        
                        <div class="col-lg-6 mx-5 my-3">
                            <p class="h1 font-weight-bold mx-1">{{ $product->name }}</p>
                            <p class="mx-1 mt-2">{{ $product->description }}</p>
                            <br><br>
                            <p class="mx-1"><b>Price: </b>Rp {{ $product->price }}</p>
                            <br><br>
                            <form action="{{ $product->id }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger mt-5">Delete Product</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection