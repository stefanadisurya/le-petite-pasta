@extends('layouts.master')

@section('title', 'Edit Product — Le Petite Pasta')

@section('styles')
    <style>
        * {
            font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
        }

        .btn1 {
            background-color: #000000;
            color: #ffffff;
            border-radius: 10px;
        }

        .btn1:hover {
            color: #ffffff;
        }

        .card .btn-danger {
            border-radius: 10px;
        }

        .card .btn:hover {
            color: #fffff;
        }

        .card, .card img {
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
    </style>
@endsection

@section('content')
<div class="container my-5">
    <div class="row justify-content-start">
        <div class="col-md-12 my-3">
            <div class="card border-light mt-5 mb-3">
                <div class="row showcase-left">
                    <div class="col-sm-3 mr-0">
                        <img src="{{ asset('assets/image/' . $product->image) }}" class="mx-3 my-3" alt="{{ $product->name }}" style="width: 270px; height: 250px">
                    </div>
                    
                    <div class="col-lg-6 mx-5 my-3">
                        <h1 class="text-dark mb-4">Edit Product</h1>
                        <form method="POST" action="/edit/{{ $product->id }}" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-6 col-form-label text-md-left">{{ __('Product Name') }}:</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-6 col-form-label text-md-left">{{ __('Product Price') }}:</label>
    
                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required autocomplete="price">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-6 col-form-label text-md-left">{{ __('Product Description') }}:</label>
    
                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $product->description }}" required autocomplete="description">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-6 col-form-label text-md-left">{{ __('Product Image') }}:</label>
    
                                <div class="col-md-6">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" required>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-left">
                                    <button type="submit" class="btn btn1">
                                        {{ __('Update') }}
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