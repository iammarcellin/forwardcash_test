@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<section class="auth-section" style="padding: 60px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="box-shadow: 0 0 20px rgba(0,0,0,0.1); border: none; border-radius: 10px;">
                    <div class="card-body" style="padding: 40px;">
                        <h2 class="text-center mb-40" style="color: #323232; font-weight: 700; margin-bottom: 30px;">Reset Password</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong>
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group mb-3">
                                <label for="email" class="form-label" style="font-weight: 600; color: #444;">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="form-label" style="font-weight: 600; color: #444;">New Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <small class="text-muted">At least 8 characters, uppercase, lowercase, and number</small>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password_confirmation" class="form-label" style="font-weight: 600; color: #444;">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100" style="padding: 12px; font-weight: 600; background: #29b2fe; border: none;">
                                Reset Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
