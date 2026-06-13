@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div style="display: flex; min-height: calc(100vh - 100px);">
    <!-- Sidebar -->
    <div style="width: 250px; background: #2c3e50; color: white; padding: 20px; box-shadow: 2px 0 5px rgba(0,0,0,0.1);">
        <h3 style="margin-top: 0; padding-bottom: 20px; border-bottom: 2px solid #34495e;">Menu</h3>
        
        <nav style="display: flex; flex-direction: column; gap: 10px;">
            <a href="{{ route('dashboard') }}" style="padding: 12px 15px; text-decoration: none; color: white; border-radius: 5px; {{ request()->routeIs('dashboard') ? 'background: #3498db;' : 'hover { background: #34495e; }' }}">
                <i class="fa fa-tachometer"></i> Dashboard
            </a>
            
            <a href="{{ route('dashboard.transactions') }}" style="padding: 12px 15px; text-decoration: none; color: white; border-radius: 5px; {{ request()->routeIs('dashboard.transactions') ? 'background: #3498db;' : 'hover { background: #34495e; }' }}">
                <i class="fa fa-exchange"></i> Transactions
            </a>
            
            <a href="{{ route('beneficiaries.index') }}" style="padding: 12px 15px; text-decoration: none; color: white; border-radius: 5px; {{ request()->routeIs('beneficiaries.*') ? 'background: #3498db;' : 'hover { background: #34495e; }' }}">
                <i class="fa fa-users"></i> Beneficiaries
            </a>
            
            <a href="{{ route('dashboard.my-account') }}" style="padding: 12px 15px; text-decoration: none; color: white; border-radius: 5px; {{ request()->routeIs('dashboard.my-account') ? 'background: #3498db;' : 'hover { background: #34495e; }' }}">
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
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h1 style="color: #2c3e50; margin-bottom: 30px;">Welcome back, {{ auth()->user()->firstname }}!</h1>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 40px;">
            <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <h4 style="margin: 0 0 10px 0; color: #7f8c8d;">Total Transactions</h4>
                <p style="margin: 0; font-size: 28px; font-weight: bold; color: #3498db;">{{ auth()->user()->sentTransactions()->count() }}</p>
            </div>
            
            <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <h4 style="margin: 0 0 10px 0; color: #7f8c8d;">Total Beneficiaries</h4>
                <p style="margin: 0; font-size: 28px; font-weight: bold; color: #27ae60;">{{ auth()->user()->beneficiaries()->count() }}</p>
            </div>
            
            <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <h4 style="margin: 0 0 10px 0; color: #7f8c8d;">Account Status</h4>
                <p style="margin: 0; font-size: 28px; font-weight: bold; color: #2ecc71;">{{ auth()->user()->status->name ?? 'Active' }}</p>
            </div>
        </div>

        <h2 style="color: #2c3e50; margin-bottom: 20px;">Recent Transactions</h2>
        
        @if($transactions->count() > 0)
            <div style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead style="background: #34495e; color: white;">
                        <tr>
                            <th style="padding: 15px; text-align: left;">Beneficiary</th>
                            <th style="padding: 15px; text-align: left;">Amount Sent</th>
                            <th style="padding: 15px; text-align: left;">Currency</th>
                            <th style="padding: 15px; text-align: left;">Status</th>
                            <th style="padding: 15px; text-align: left;">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            <tr style="border-bottom: 1px solid #ecf0f1;">
                                <td style="padding: 15px;">{{ $transaction->beneficiary->firstname }} {{ $transaction->beneficiary->lastname }}</td>
                                <td style="padding: 15px;">{{ number_format($transaction->amount_sent, 2) }}</td>
                                <td style="padding: 15px;">{{ $transaction->currencyFrom->currency_symbol ?? 'N/A' }}</td>
                                <td style="padding: 15px;">
                                    <span style="background: {{ $transaction->transactionStatus->name === 'completed' ? '#2ecc71' : '#f39c12' }}; color: white; padding: 5px 10px; border-radius: 3px; font-size: 12px;">
                                        {{ ucfirst($transaction->transactionStatus->name) }}
                                    </span>
                                </td>
                                <td style="padding: 15px;">{{ $transaction->created_at->format('M d, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 20px;">
                {{ $transactions->links() }}
            </div>
        @else
            <div style="background: #ecf0f1; padding: 30px; border-radius: 8px; text-align: center; color: #7f8c8d;">
                <p>No transactions yet. <a href="{{ route('beneficiaries.create') }}" style="color: #3498db;">Add a beneficiary</a> to get started.</p>
            </div>
        @endif
    </div>
</div>
@endsection
