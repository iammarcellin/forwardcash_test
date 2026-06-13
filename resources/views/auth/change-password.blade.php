@extends('layouts.app')

@section('title', 'Change Password')

@section('content')
<section style="padding: 40px 0; background: #f9f9f9;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div style="background: white; padding: 30px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <h2 style="margin-bottom: 30px; color: #323232;">Change Your Password</h2>

                    @if (session('success'))
                        <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                            {{ session('success') }}
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

                    <form method="POST" action="{{ route('password.change') }}">
                        @csrf
                        @method('PUT')

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 600;">Current Password *</label>
                            <input type="password" name="current_password" class="form-control @error('current_password') has-error @enderror" required>
                            @error('current_password')
                                <span style="color: #d76666; font-size: 12px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 600;">New Password *</label>
                            <input type="password" name="password" class="form-control @error('password') has-error @enderror" required>
                            @error('password')
                                <span style="color: #d76666; font-size: 12px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div style="margin-bottom: 30px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 600;">Confirm New Password *</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary" style="padding: 10px 30px; font-weight: 600;">Change Password</button>
                            <a href="{{ route('profile.show') }}" class="btn btn-default" style="padding: 10px 30px; font-weight: 600; margin-left: 10px;">Back to Profile</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
