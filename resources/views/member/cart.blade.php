@extends('layouts.master')

@section('title', 'View Cart — Le Petite Pasta')

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

        .card img {
            border-radius: 5px;
        }
    </style>
@endsection

@section('content')
    @if(auth()->user()->role=="member")
        @foreach ($carts as $cart)
            <div class="container my-5">
                <div class="row justify-content-start">
                    <div class="col-md-12 my-3">
                        <div class="card mt-0 mb-0">
                            <div class="row showcase-left">
                                <div class="col-sm-4 mr-0">
                                    <img src="{{ asset('assets/image/' . $cart->product->image) }}" class="mx-3 my-3" alt="{{ $cart->product->name }}" style="width: 370px; height: 350px">
                                </div>
                                
                                <div class="col-lg-6 mx-5 my-3">
                                    <p class="h1 font-weight-bold">{{ $cart->product->name }}</p>
                
                                    <p class="mt-3"><b>Price: </b>Rp {{ $cart->product->price }}</p>
                                    
                                    <p><b>Quantity:</b>  {{ $cart->quantity }}</p>
                                    <br>
                                    <form method="POST" action="/cart/update/{{ $cart->id }} ">
                                        @csrf
                                        <div class="form-group row mx-0">
                                            <label for="Quantity">Quantity : </label>
                                            <div class="col-md-6">
                                                <input id="Quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>
                                                @error('quantity')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>  
                                                   
                                        </div>
                                        <div class="form-group row mx-0">
                                            <button type="submit" class="btn btn1 mt-5">
                                                {{ __('Update Quantity') }}
                                            </button>
                                        </div>
                                    </form>

                                    <div class="row mx-0 mb-3">
                                        <form action="/cart/remove/{{ $cart->id }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                {{ __('Remove From Cart') }}
                                            </button>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        
        @endforeach

        @if($carts->count() > 0)
            <div class="d-flex justify-content-center" style="text-align: center" >
                <form action="/cart" method="post">
                    @csrf
                    <button type="submit" class="btn btn1 my-3">
                        {{ __('Checkout') }}
                    </button>
                </form>
            </div>
        @else
            <div class="d-flex justify-content-center my-5">
                <p class="h4 text-muted">Cart empty</p>
            </div>
        @endif
    @endif

@endsection