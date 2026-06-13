@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
<section style="padding: 40px 0; background: #f9f9f9;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div style="background: white; padding: 30px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <h2 style="margin-bottom: 30px; color: #323232;">Reset Your Password</h2>

                    @if (session('status'))
                        <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                            <strong>Error:</strong>
                            <ul style="margin: 10px 0 0 0; padding: 0 0 0 20px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <p style="margin-bottom: 20px; color: #666;">Enter your email address and we'll send you a link to reset your password.</p>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div style="margin-bottom: 30px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 600;">Email Address *</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary" style="padding: 10px 30px; font-weight: 600;">Send Reset Link</button>
                            <a href="{{ route('login') }}" class="btn btn-default" style="padding: 10px 30px; font-weight: 600; margin-left: 10px;">Back to Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
