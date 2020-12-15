@extends('layouts.master')

@section('title', 'Order — Le Petite Pasta')

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

    .card .btn {
        background-color: #000000;
        border-radius: 10px;
    }

    .card img {
        /* width: 18rem; */
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
            <div class="card bg-transparent border-light mt-5 mb-3">
                <div class="row showcase-left">
                    <div class="col-sm-4 mr-0">
                        <img src="{{ asset('assets/image/' . $product->image) }}" class="mx-3 my-3" alt="{{ $product->name }}" style="width: 370px; height: 350px">
                    </div>
                    
                    <div class="col-lg-6 mx-5 my-3">
                        <p class="h1 font-weight-bold">{{ $product->name }}</p>
                        <p>{{ $product->description }}</p>
                        <br><br>
                        <p>Rp. {{ $product->price }}</p>
                        <br><br>
                        <form method="POST" action="{{ route('guestorder', $product) }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="quantity">Quantity: </label>
                                </div>
                                
                                <div class="col-md-6">
                                    <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>        
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary" disabled>
                                        {{ __('Add to Cart') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection