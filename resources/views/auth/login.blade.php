@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container d-flex align-items-center justify-content-center">
    <div class="card mb-5 px-4 col-12 col-md-8 shadow">
        <div class="row">
            <div class="m-auto col-10 col-md-6 col-lg-5 col-xl-5 p-0">
                <img src="https://cdni.iconscout.com/illustration/premium/thumb/user-showing-user-login-page-in-website-or-application-1886527-1597938.png"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-12 col-lg-7 col-xl-7">
                <div class="card-body">
                    <h1 class="text-danger">Sign in</h1>
                    <form class="form form-horizontal" method="POST" action="{{ route('login') }}">
                        @csrf
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h6 class="text-white">ERROR! </h6>
                                <small>{{ $message }}</small>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="form-body pt-4">
                            <div class="row">
                                <div class="col-md-3 py-2">
                                    <label>Username</label>
                                </div>

                                <div class="col-md-9">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge"></i>
                                            </div>
                                        </div>
                                    </div>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 py-2">
                                    <label>Password</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-12 col-md-9 offset-md-3">
                                    <div class="form-check">
                                        <div class="checkbox text-danger">
                                            <input class="form-check-input" type="checkbox" name="remember_token" id="remember" {{ old('remember_token') ? 'checked' : '' }}>
                                            <label for="remember">Remember Me</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-9 offset-md-3">
                                    <button type="submit" class="btn btn-danger me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>

                                <div class="text-center mt-3 col-md-9 offset-md-2">
                                    <p class="text-gray-600">Don't have an account?
                                        <a href="{{ route('register') }}" class="font-bold">Sign up</a>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
