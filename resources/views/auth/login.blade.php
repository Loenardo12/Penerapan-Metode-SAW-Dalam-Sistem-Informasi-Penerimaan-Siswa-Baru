@extends('layouts.master-login')

@section('content')
               <h6 class="font-weight-light">Sign in to continue.</h6>
              <form method="POST" action="{{ route('login') }}" class="pt-3">
               @csrf
                <div class="form-group">
                  <label for="email" class="font-weight-light">{{ __('Email Address') }}</label>
                  <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" id="email value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="password" class="font-weight-light">{{ __('PASSWORD') }}</label>
                  <input type="password" class="form-control form-control-lg" id="password @error('PASSWORD') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('PASSWORD')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">{{'SIGN IN'}}</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">

                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="{{route ('register')}}" class="text-primary">Create Account</a>
                </div>
              </form>
@endsection
