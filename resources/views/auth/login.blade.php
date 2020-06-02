@extends('layouts.app')

@section('content')
<div class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>{{ __('Hapo') }}</b>{{ __('RS') }}</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{ __('Sign in to start') }}</p>
                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="email">Email address</label>
                        <input 
                            id="email" type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            placeholder="Email" 
                            name="email" value="{{ old('email') }}" 
                            autocomplete="email" 
                        >

                        @error('email')
                        <p class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </pn>
                        @enderror                   
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input 
                            id="password" type="password" 
                            placeholder="Password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            name="password" 
                            autocomplete="current-password"
                        >

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Sign In') }}
                            </button>
                        </div>
                    </div>                                             
                </form>
            </div>
            <div class="card-footer">
                @if (Route::has('password.request'))
                    <p class="mb-1">
                        <a href="{{ route('password.request') }}">I forgot my password</a>
                    </p>
                @endif
                <p class="mb-0">
                        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                </p>  
            </div>
        </div>
    </div>        
</div>
@endsection
