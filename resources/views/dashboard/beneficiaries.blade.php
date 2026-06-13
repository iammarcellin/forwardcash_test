@extends('layouts.app')

@section('title', 'Beneficiaries')

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
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h2 style="color: #2c3e50; margin: 0;">Your Beneficiaries</h2>
            <a href="{{ route('beneficiaries.create') }}" class="btn btn-primary" style="padding: 10px 20px; background: #3498db; color: white; text-decoration: none; border-radius: 5px;">
                <i class="fa fa-plus"></i> Add Beneficiary
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @if($beneficiaries->count() > 0)
            <div style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead style="background: #34495e; color: white;">
                        <tr>
                            <th style="padding: 15px; text-align: left;">Name</th>
                            <th style="padding: 15px; text-align: left;">Country</th>
                            <th style="padding: 15px; text-align: left;">Phone</th>
                            <th style="padding: 15px; text-align: left;">Address</th>
                            <th style="padding: 15px; text-align: left;">Status</th>
                            <th style="padding: 15px; text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($beneficiaries as $beneficiary)
                            <tr style="border-bottom: 1px solid #ecf0f1;">
                                <td style="padding: 15px;">
                                    <strong>{{ $beneficiary->firstname }} {{ $beneficiary->lastname }}</strong>
                                </td>
                                <td style="padding: 15px;">{{ $beneficiary->country->country_name }}</td>
                                <td style="padding: 15px;">{{ $beneficiary->phone }}</td>
                                <td style="padding: 15px;">{{ $beneficiary->address }}</td>
                                <td style="padding: 15px;">
                                    <span style="background: {{ $beneficiary->status === 'active' ? '#2ecc71' : '#e74c3c' }}; color: white; padding: 5px 10px; border-radius: 3px; font-size: 12px;">
                                        {{ ucfirst($beneficiary->status) }}
                                    </span>
                                </td>
                                <td style="padding: 15px; text-align: center;">
                                    <a href="{{ route('beneficiaries.edit', $beneficiary) }}" class="btn btn-sm" style="background: #f39c12; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; margin-right: 5px;">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('beneficiaries.destroy', $beneficiary) }}" style="display: inline; margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm" style="background: #e74c3c; color: white; padding: 5px 10px; border: none; border-radius: 3px; cursor: pointer;" onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 20px;">
                {{ $beneficiaries->links() }}
            </div>
        @else
            <div style="background: #ecf0f1; padding: 30px; border-radius: 8px; text-align: center; color: #7f8c8d;">
                <p>No beneficiaries yet. <a href="{{ route('beneficiaries.create') }}" style="color: #3498db;">Add your first beneficiary</a></p>
            </div>
        @endif
    </div>
</div>
@endsection
