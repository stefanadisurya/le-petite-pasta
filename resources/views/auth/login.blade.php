@extends('layouts.master')

@section('title', 'Login — Le Petite Pasta')

@section('styles')
<link href="{{ asset('css/main.css') }}" rel="stylesheet" media="all">
<link href="{{ asset('css/login.css')}}" rel="stylesheet">
@endsection

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
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

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card card-4">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/image/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <p class="title d-flex justify-content-center">Login</p>

              <form method="POST" action="{{ route('login') }}">
                @csrf

                  <div class="row row-space">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <label for="email" class="label">Email</label>
                            <input id="email" class="input--style-4 @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                  </div>

                  <div class="row row-space">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <label for="password" class="label">Password</label>
                            <input id="password" class="input--style-4 @error('password') is-invalid @enderror" type="password" name="password" value="{{ old('password') }}" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                  </div>

                  <div class="custom-control custom-checkbox login-card-check-box">
                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="custom-control-label" for="customCheck1">Remember me</label>
                  </div>
                  
                  <div class="p-t-15 d-flex justify-content-center">
                    <button class="btn btn--radius-2 bg-dark" type="submit">Login</button>
                  </div>
                </form>
                <div class="p-t-15 d-flex justify-content-center">
                    <p>
                        <a href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    </p>
                </div>
                <div class="p-t-15 d-flex justify-content-center">
                    <p>Don't have an account?
                        <a href="{{ route('register') }}">
                            Register
                        </a>
                    </p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>
@endsection
