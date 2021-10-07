@extends('layouts.blog')

@section('title')

Green Garden Blog | {{ __('Login') }}

@endsection

@section('content')
<section class="wrapper mt-5">
  <div class="container">
    <div class="row">
      <h2 class="text-center text-uppercase mb-5">Login form</h2>
      <div class="col-md-6 offset-md-3">
        <div class="row border rounded p-3">
          <div class="col-md-10 offset-md-1 mt-5">
            <!-- validate form begin -->
            <!-- validate form end -->
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group mb-3">
                <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                <input type="text" name="email" id="email" placeholder="email"
                  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                  autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input type="password" name="password" id="password" placeholder="Password"
                  class="form-control @error('password') is-invalid @enderror" name="password"
                  autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>
              </div>

              <div class="form-group mb-3">
                <button type="submit" class="btn mt-3 mx-2 add_article_btn">
                  {{ __('Login') }}
                </button>
              </div>

              <div class="form-group mb-3">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
                @endif
              </div>
            </form>
            <div class="form-group mb-3">
              @if (Route::has('register'))
              <a href="{{ route('register') }}">{{ __('Register New User') }}</a>
              @endif
              <div>
              </div>
            </div>
          </div>
        </div>
      </div>

</section>

@endsection