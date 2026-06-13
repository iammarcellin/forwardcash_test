@extends('layouts.app')

@section('title', 'Transactions')

@section('content')
<div style="display: flex; min-height: calc(100vh - 100px);">
    <!-- Sidebar -->
    <div style="width: 250px; background: #2c3e50; color: white; padding: 20px; box-shadow: 2px 0 5px rgba(0,0,0,0.1);">
        <h3 style="margin-top: 0; padding-bottom: 20px; border-bottom: 2px solid #34495e;">Menu</h3>
        
        <nav style="display: flex; flex-direction: column; gap: 10px;">
            <a href="{{ route('dashboard') }}" style="padding: 12px 15px; text-decoration: none; color: white; border-radius: 5px;">
                <i class="fa fa-tachometer"></i> Dashboard
            </a>
            
            <a href="{{ route('dashboard.transactions') }}" style="padding: 12px 15px; text-decoration: none; color: white; border-radius: 5px; background: #3498db;">
                <i class="fa fa-exchange"></i> Transactions
            </a>
            
            <a href="{{ route('beneficiaries.index') }}" style="padding: 12px 15px; text-decoration: none; color: white; border-radius: 5px;">
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
        <h2 style="color: #2c3e50; margin-bottom: 30px;">Your Transactions</h2>
        
        @if($transactions->count() > 0)
            <div style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead style="background: #34495e; color: white;">
                        <tr>
                            <th style="padding: 15px; text-align: left;">Beneficiary</th>
                            <th style="padding: 15px; text-align: left;">Amount Sent</th>
                            <th style="padding: 15px; text-align: left;">Amount Received</th>
                            <th style="padding: 15px; text-align: left;">Currencies</th>
                            <th style="padding: 15px; text-align: left;">Status</th>
                            <th style="padding: 15px; text-align: left;">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            <tr style="border-bottom: 1px solid #ecf0f1;">
                                <td style="padding: 15px;">
                                    <strong>{{ $transaction->beneficiary->firstname }} {{ $transaction->beneficiary->lastname }}</strong><br>
                                    <small style="color: #7f8c8d;">{{ $transaction->beneficiary->country->country_name }}</small>
                                </td>
                                <td style="padding: 15px;">{{ number_format($transaction->amount_sent, 2) }}</td>
                                <td style="padding: 15px;">{{ number_format($transaction->amount_received, 2) }}</td>
                                <td style="padding: 15px;">
                                    {{ $transaction->currencyFrom->currency_symbol }} → {{ $transaction->currencyTo->currency_symbol }}
                                </td>
                                <td style="padding: 15px;">
                                    <span style="background: {{ $transaction->transactionStatus->name === 'completed' ? '#2ecc71' : ($transaction->transactionStatus->name === 'pending' ? '#f39c12' : '#e74c3c') }}; color: white; padding: 5px 10px; border-radius: 3px; font-size: 12px;">
                                        {{ ucfirst($transaction->transactionStatus->name) }}
                                    </span>
                                </td>
                                <td style="padding: 15px;">{{ $transaction->created_at->format('M d, Y H:i') }}</td>
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
