<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Apply authentication middleware to all methods in this controller
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // Dashboard index
    public function index()
    {
        $user = auth()->user();

        // Get recent transactions with pagination
        $transactions = $user->sentTransactions()
            ->with([
                'beneficiary',
                'beneficiary.country',
                'currencyFrom',
                'currencyTo',
                'transactionStatus'
            ])
            ->latest()
            ->paginate(10);

        return view('dashboard.index', compact('transactions'));
    }

    // Transactions page
    public function transactions()
    {
        $user = auth()->user();

        $transactions = $user->sentTransactions()
            ->with([
                'beneficiary',
                'beneficiary.country',
                'currencyFrom',
                'currencyTo',
                'transactionStatus'
            ])
            ->latest()
            ->paginate(15);

        return view('dashboard.transactions', compact('transactions'));
    }

    // My Account page
    public function myAccount()
    {
        $user = auth()->user();
        $languages = \App\Models\Language::where('display', true)->get();
        $countries = \App\Models\Country::where('display', true)
            ->orderBy('country_name')
            ->get();

        return view('dashboard.my-account', compact('user', 'languages', 'countries'));
    }
}
