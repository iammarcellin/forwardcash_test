@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
<section class="auth-section" style="padding: 60px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="box-shadow: 0 0 20px rgba(0,0,0,0.1); border: none; border-radius: 10px;">
                    <div class="card-body" style="padding: 40px;">
                        <h2 class="text-center mb-40" style="color: #323232; font-weight: 700; margin-bottom: 30px;">Sign In to Your Account</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Login Failed!</strong>
                                <p style="margin-bottom: 0;">Invalid email or password. Please try again.</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('login.store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="email" class="form-label" style="font-weight: 600; color: #444;">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="form-label" style="font-weight: 600; color: #444;">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1">
                                <label class="form-check-label" for="remember" style="color: #666;">
                                    Remember me
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100" style="padding: 12px; font-weight: 600; background: #29b2fe; border: none;">
                                Sign In
                            </button>
                        </form>

                        <hr style="margin: 30px 0; border-color: #ddd;">

                        <div class="text-center">
                            <p style="color: #666; margin-bottom: 15px;">Don't have an account? <a href="{{ route('register') }}" style="color: #29b2fe; font-weight: 600;">Create one here</a></p>
                            <p style="color: #666;"><a href="{{ route('password.request') }}" style="color: #29b2fe; font-weight: 600;">Forgot your password?</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
