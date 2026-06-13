@extends('layouts.app')

@section('title', 'Edit Beneficiary')

@section('content')
<div style="display: flex; min-height: calc(100vh - 100px);">
    <!-- Sidebar -->
    <div style="width: 250px; background: #2c3e50; color: white; padding: 20px; box-shadow: 2px 0 5px rgba(0,0,0,0.1);">
        <h3 style="margin-top: 0; padding-bottom: 20px; border-bottom: 2px solid #34495e;">Menu</h3>
        
        <nav style="display: flex; flex-direction: column; gap: 10px;">
            <a href="{{ route('dashboard') }}" style="padding: 12px 15px; text-decoration: none; color: white; border-radius: 5px;">
                <i class="fa fa-tachometer"></i> Dashboard
            </a>
            
            <a href="{{ route('dashboard.transactions') }}" style="padding: 12px 15px; text-decoration: none; color: white; border-radius: 5px;">
                <i class="fa fa-exchange"></i> Transactions
            </a>
            
            <a href="{{ route('beneficiaries.index') }}" style="padding: 12px 15px; text-decoration: none; color: white; border-radius: 5px; background: #3498db;">
                <i class="fa fa-users"></i> Beneficiaries
            </a>
            
            <a href="{{ route('dashboard.my-account') }}" style="padding: 12px 15px; text-decoration: none; color: white; border-radius: 5px;">
                <i class="fa fa-user"></i> My Account
            </a>
            
            <hr style="border: none; border-top: 1px solid #34495e; margin: 20px 0;">
            
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" style="width: 100%; padding: 12px 15px; background: #e74c3c; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 14px; text-align: left;">
                    <i class="fa fa-sign-out"></i> Logout
                </button>
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div style="flex: 1; padding: 30px;">
        <h2 style="color: #2c3e50; margin-bottom: 30px;">Edit Beneficiary</h2>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>
                <ul style="margin: 10px 0 0 0; padding: 0 0 0 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); max-width: 600px;">
            <form method="POST" action="{{ route('beneficiaries.update', $beneficiary) }}">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="firstname" class="form-label" style="font-weight: 600; color: #444;">First Name *</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname', $beneficiary->firstname) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="lastname" class="form-label" style="font-weight: 600; color: #444;">Last Name *</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname', $beneficiary->lastname) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="country_id" class="form-label" style="font-weight: 600; color: #444;">Country *</label>
                    <select class="form-control" id="country_id" name="country_id" required>
                        <option value="">-- Select Country --</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id', $beneficiary->country_id) == $country->id ? 'selected' : '' }}>
                                {{ $country->country_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="phone" class="form-label" style="font-weight: 600; color: #444;">Phone Number *</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone', $beneficiary->phone) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="address" class="form-label" style="font-weight: 600; color: #444;">Address *</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $beneficiary->address) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="status" class="form-label" style="font-weight: 600; color: #444;">Status *</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="active" {{ old('status', $beneficiary->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $beneficiary->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 30px;">
                    <button type="submit" class="btn btn-primary" style="padding: 10px 30px; background: #3498db; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: 600;">
                        Update Beneficiary
                    </button>
                    <a href="{{ route('beneficiaries.index') }}" class="btn btn-default" style="padding: 10px 30px; background: #95a5a6; color: white; text-decoration: none; border-radius: 5px; font-weight: 600;">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
