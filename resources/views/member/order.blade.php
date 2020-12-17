@extends('layouts.master')

@section('title', 'Order — Le Petite Pasta')

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

    .card .btn1 {
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
<div class="container my-5 showcase-left">
    <div class="row justify-content-start">
        <div class="col-md-12 my-3">
            <div class="card border-light mt-5 mb-3">
                <div class="row">
                    <div class="col-sm-4 mr-0">
                        <img src="{{ asset('assets/image/' . $product->image) }}" class="mx-3 my-3" alt="{{ $product->name }}" style="width: 370px; height: 350px">
                    </div>
                    
                    <div class="col-lg-6 mx-5 my-3">
                        <p class="h1 font-weight-bold mx-0">{{ $product->name }}</p>
                        <p class="mx-0">{{ $product->description }}</p>
                        <br><br>
                        <p class="mx-0"><b>Price:</b> Rp {{ $product->price }}</p>
                        <br><br>
                        <form method="POST" action="{{ route('order', $product) }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="quantity"><b>Quantity:</b> </label>
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
                                    <button type="submit" class="btn btn1">
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

@for ($i = 0; $i < 5; $i++)
            <br>
@endfor
@endsection