@extends('layouts.master-login')

@section('content')
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Register to continue.</h6>
              <form method="POST" action="{{ route('register') }}" class="pt-3">
               @csrf
                <div class="form-group">
                <label for="NAMA_STAFF" class="font-weight-light">{{ __('NAMA_STAFF') }}</label>
                <input type="text" class="form-control form-control-lg @error('NAMA_STAFF') is-invalid @enderror" name="NAMA_STAFF" id="NAMA_STAFF" value="{{ old('NAMA_STAFF') }}" required autocomplete="NAMA_STAFF" autofocus>
                    @error('NAMA_STAFF')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
               <div class="form-group">
                <label for="USERNAME" class="font-weight-light">{{ __('USERNAME') }}</label>
                <input type="text" class="form-control form-control-lg @error('USERNAME') is-invalid @enderror" name="USERNAME" id="USERNAME" value="{{ old('USERNAME') }}" required autocomplete="USERNAME" autofocus>
                    @error('USERNAME')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
                <div class="form-group">
                  <label for="email" class="font-weight-light">{{ __('Email Address') }}</label>
                  <input type="email" class="form-control form-control-lg @error('EMAIL') is-invalid @enderror" name="EMAIL" id="EMAIL" value="{{ old('EMAIL') }}" required autocomplete="EMAIL" autofocus>
                    @error('EMAIL')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="PASSWORD" class="font-weight-light">{{ __('PASSWORD') }}</label>
                  <input type="PASSWORD" class="form-control form-control-lg @error('PASSWORD') is-invalid @enderror" id="PASSWORD" name="PASSWORD" required autocomplete="current-PASSWORD">
                    @error('PASSWORD')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="PASSWORD_confirmation" class="font-weight-light">{{ __('PASSWORD') }}</label>
                    <input type="PASSWORD" class="form-control form-control-lg" id="PASSWORD_confirmation" name="PASSWORD_confirmation" required autocomplete="new-PASSWORD">
                      @error('PASSWORD')
                          <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">{{'REGISTER'}}</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                    Already have an account? <a href="{{route ('login')}}" class="text-primary">Login</a>
                </div>
              </form>
@endsection
