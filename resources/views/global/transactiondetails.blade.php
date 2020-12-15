@extends('layouts.master')

@section('title', 'Transaction Details — Le Petite Pasta')

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
@if(auth()->user()->role=="admin" || auth()->user()->role=="member" )
@forelse ($transactions as $transaction)
    <div class="container my-5">
        <div class="row justify-content-start">
            <div class="col-md-12 my-0">
                <div class="card mt-0 mb-0">
                    <div class="row showcase-left">
                        <div class="col-sm-4 mr-0">
                            <img src="{{ asset('assets/image/' . $transaction->product->image) }}" class="mx-3 my-3" alt="{{ $transaction->product->name }}" style="width: 370px; height: 350px">
                        </div>
                        <div class="col-lg-6 mx-5 my-3">
                            <p class="h1 font-weight-bold">{{ $transaction->product->name }}</p>
                            <p class="mt-5"><b>Price: </b>Rp {{ $transaction->product->price }}</p>
                            <p><b>Quantity:</b>  {{ $transaction->quantity }}</p>
                            <p><b>Total Price:</b> Rp {{ ($transaction->product->price)*($transaction->quantity) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>

    @empty
        <div class="d-flex justify-content-center my-5">
            <p class="h4 text-muted">No transaction</p>
        </div>

@endforelse

@endif

@endsection