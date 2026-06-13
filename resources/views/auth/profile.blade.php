@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<section style="padding: 40px 0; background: #f9f9f9;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div style="background: white; padding: 30px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <h2 style="margin-bottom: 30px; color: #323232;">Edit Your Profile</h2>

                    @if (session('success'))
                        <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                            <strong>Please fix the following errors:</strong>
                            <ul style="margin: 10px 0 0 0; padding: 0 0 0 20px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">First Name *</label>
                                    <input type="text" name="firstname" class="form-control" value="{{ old('firstname', $user->firstname) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Last Name *</label>
                                    <input type="text" name="lastname" class="form-control" value="{{ old('lastname', $user->lastname) }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Email *</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Phone *</label>
                                    <input type="tel" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Pseudo</label>
                                    <input type="text" name="pseudo" class="form-control" value="{{ old('pseudo', $user->pseudo) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Language *</label>
                                    <select name="language_id" class="form-control" required>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}" @selected($user->language_id == $language->id)>
                                                {{ $language->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Address 1</label>
                                    <input type="text" name="address_1" class="form-control" value="{{ old('address_1', $user->address_1) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Address 2</label>
                                    <input type="text" name="address_2" class="form-control" value="{{ old('address_2', $user->address_2) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">City</label>
                                    <input type="text" name="city" class="form-control" value="{{ old('city', $user->city) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Postcode</label>
                                    <input type="text" name="postcode" class="form-control" value="{{ old('postcode', $user->postcode) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Date of Birth</label>
                                    <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $user->date_of_birth) }}">
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 30px;">
                            <button type="submit" class="btn btn-primary" style="padding: 10px 30px; font-weight: 600;">Update Profile</button>
                            <a href="{{ route('password.edit') }}" class="btn btn-default" style="padding: 10px 30px; font-weight: 600; margin-left: 10px;">Change Password</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
