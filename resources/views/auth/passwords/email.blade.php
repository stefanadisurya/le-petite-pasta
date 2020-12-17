@extends('layouts.master')

@section('title', 'Reset Password — Le Petite Pasta')

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

    .bg-black {
        background-color: #000000;
        color: #ffffff;
    }
</style>
@endsection

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-black">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@for ($i = 0; $i < 20; $i++)
    <br>
@endfor
@endsection
