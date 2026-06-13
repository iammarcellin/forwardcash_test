@extends('layouts.app')

@section('title', 'Register')

@section('content')
<section class="auth-section" style="padding: 60px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="box-shadow: 0 0 20px rgba(0,0,0,0.1); border: none; border-radius: 10px;">
                    <div class="card-body" style="padding: 40px;">
                        <h2 class="text-center mb-40" style="color: #323232; font-weight: 700; margin-bottom: 30px;">Create Your Account</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Registration Error!</strong>
                                <ul style="margin: 10px 0 0 0; padding: 0 0 0 20px;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('register.store') }}" method="POST">
                            @csrf

                            <!-- Row 1: First Name and Last Name -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="firstname" class="form-label" style="font-weight: 600; color: #444;">First Name *</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="lastname" class="form-label" style="font-weight: 600; color: #444;">Last Name *</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 2: Email and Confirm Email -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label" style="font-weight: 600; color: #444;">Email Address *</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="email_confirmation" class="form-label" style="font-weight: 600; color: #444;">Confirm Email *</label>
                                        <input type="email" class="form-control" id="email_confirmation" name="email_confirmation" value="{{ old('email_confirmation') }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 3: Password and Confirm Password -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="password" class="form-label" style="font-weight: 600; color: #444;">Password *</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        <small class="text-muted">At least 8 characters, with uppercase, lowercase, and number</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="password_confirmation" class="form-label" style="font-weight: 600; color: #444;">Confirm Password *</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 4: Phone Number -->
                            <div class="form-group mb-3">
                                <label for="phone" class="form-label" style="font-weight: 600; color: #444;">Phone Number *</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                            </div>

                            <!-- Row 5: Address -->
                            <div class="form-group mb-3">
                                <label for="address_1" class="form-label" style="font-weight: 600; color: #444;">Address *</label>
                                <input type="text" class="form-control" id="address_1" name="address_1" value="{{ old('address_1') }}" required>
                            </div>

                            <!-- Row 6: City and Postcode -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="city" class="form-label" style="font-weight: 600; color: #444;">City *</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="postcode" class="form-label" style="font-weight: 600; color: #444;">Post Code *</label>
                                        <input type="text" class="form-control" id="postcode" name="postcode" value="{{ old('postcode') }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 7: Country -->
                            <div class="form-group mb-3">
                                <label for="country_id" class="form-label" style="font-weight: 600; color: #444;">Country *</label>
                                <select class="form-control" id="country_id" name="country_id" required>
                                    <option value="">-- Select Your Country --</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                            {{ $country->country_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Row 8: Date of Birth -->
                            <div class="form-group mb-3">
                                <label for="date_of_birth" class="form-label" style="font-weight: 600; color: #444;">Date of Birth *</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                            </div>

                            <!-- Row 9: Submit Button -->
                            <button type="submit" class="btn btn-primary w-100" style="padding: 12px; font-weight: 600; background: #29b2fe; border: none; margin-top: 15px;">
                                Create Account
                            </button>
                        </form>

                        <hr style="margin: 30px 0; border-color: #ddd;">

                        <div class="text-center">
                            <p style="color: #666;">Already have an account? <a href="{{ route('login') }}" style="color: #29b2fe; font-weight: 600;">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
