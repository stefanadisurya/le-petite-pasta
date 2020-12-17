@extends('layouts.master')

@section('title', 'About — Le Petite Pasta')

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

    hr {
        border-color: #000000;
        width: 100px;
        margin-top: 50px;
    }

    img {
        border-radius: 200px;
        width: 200px;
        height: 200px
    }

    .btn {
        background-color: #000000;
        color: #ffffff;
        border-radius: 10px;
    }

    .mtx {
        margin-top: 100px;
    }
</style>
@endsection

@section('content')
@if (!Auth::check() || auth()->user()->role=="member")
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            
        </div>
    </div>

    <h1 class="font-weight-bold text-center mt-5 showcase-left">About</h1>
    <hr class="showcase-left">

    <div class="container my-5 showcase-left">
        <div class="row">
            <p class="text-center">
                Pasta is a typical Italian processed food, which is usually made from unleavened dough made from wheat flour mixed with
                water or eggs and formed into sheets or other shapes, which are then cooked by boiling or grilling. One of the well-known
                types of pasta, namely spaghetti, is favored by many people in Indonesia of all ages and ages. In their home country, Italy,
                there are many variants of pasta besides spaghetti, such as agnolotti, cacio e pepe, spatzle thyrolesi, and others.
                The manufacturing process and the raw materials used are not difficult to make pasta, but there are times when someone wants
                to consume pasta instantly.
                <br><br>
                Created in 2020, Le Petite Pasta innovates to make an instant pasta.
                The presentation of the pasta is quite simple, namely by using a small
                container of aluminum foil, with the aim that it can be warmed if you want
                to consume it for a long time.
                <br><br>
                <b>We are open at:<br>
                Monday - Saturday (09.00 - 20.00 WIB)<br>
                Sunday (09.00 - 15.00  WIB)
                <br><br>
                Jalan Gajahmada 1, no. 1,<br>
                Central Jakarta, Indonesia</b>
            </p>
        </div>
    </div>

    <h1 class="font-weight-bold text-center mtx showcase-top">Team</h1>
    <hr class="showcase-top">

    <div class="container my-5">
        <div class="row mb-5 d-flex justify-content-center">
            <div class="col-lg-4 showcase-left">
                <img src="{{ asset('assets/image/user1.jpg') }}" alt="" class="mx-auto d-block mb-3">
                <p class="h4 text-center font-weight-bold">Stefan Adisurya</p>
                <p class="text-muted text-center"><em>Project Manager</em></p>
            </div>

            <div class="col-lg-4 showcase-top">
                <img src="{{ asset('assets/image/user1.jpg') }}" alt="" class="mx-auto d-block mb-3">
                <p class="h4 text-center font-weight-bold">Nicholas Owen</p>
                <p class="text-muted text-center"><em>Data Engineer</em></p>
            </div>

            <div class="col-lg-4 showcase-right">
                <img src="{{ asset('assets/image/user1.jpg') }}" alt="" class="mx-auto d-block mb-3">
                <p class="h4 text-center font-weight-bold">Ravli A. Kahfi</p>
                <p class="text-muted text-center"><em>Business Analyst</em></p>
            </div>

            <div class="col-lg-3 my-5 showcase-bottom">
                <img src="{{ asset('assets/image/user1.jpg') }}" alt="" class="mx-auto d-block mb-3">
                <p class="h4 text-center font-weight-bold">Fraderic</p>
                <p class="text-muted text-center"><em>Developer</em></p>
            </div>

            <div class="col-lg-3 my-5 showcase-bottom">
                <img src="{{ asset('assets/image/user1.jpg') }}" alt="" class="mx-auto d-block mb-3">
                <p class="h4 text-center font-weight-bold">Ruben Marton R.</p>
                <p class="text-muted text-center"><em>Developer</em></p>
            </div>
        </div>
    </div>
@elseif(auth()->user()->role=="admin")
    <p class="text-muted text-center h3 my-5">Whoops, this page is not available for you!</p>

    <div class="row">
        <div class="col-lg-12 text-center">
            <a href="{{ url()->previous() }}">
                <button class="btn btn-dark">
                    Go Back
                </button>
            </a>
        </div>
    </div>
@endif
@endsection