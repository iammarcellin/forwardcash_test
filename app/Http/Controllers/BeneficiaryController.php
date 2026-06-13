<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\Country;
use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $user = auth()->user();
        
        $beneficiaries = $user->beneficiaries()
            ->with('country')
            ->paginate(15);

        return view('dashboard.beneficiaries', compact('beneficiaries'));
    }

    public function create()
    {
        $countries = Country::where('display', true)->orderBy('country_name')->get();
        return view('dashboard.beneficiaries-create', compact('countries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'exists:countries,id'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        auth()->user()->beneficiaries()->create($validated);

        return redirect()->route('beneficiaries.index')->with('success', 'Beneficiary added successfully!');
    }

    public function edit(Beneficiary $beneficiary)
    {
        $this->authorize('update', $beneficiary);
        
        $countries = Country::where('display', true)->orderBy('country_name')->get();
        return view('dashboard.beneficiaries-edit', compact('beneficiary', 'countries'));
    }

    public function update(Request $request, Beneficiary $beneficiary)
    {
        $this->authorize('update', $beneficiary);

        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'exists:countries,id'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $beneficiary->update($validated);

        return redirect()->route('beneficiaries.index')->with('success', 'Beneficiary updated successfully!');
    }

    public function destroy(Beneficiary $beneficiary)
    {
        $this->authorize('delete', $beneficiary);
        
        $beneficiary->delete();

        return redirect()->route('beneficiaries.index')->with('success', 'Beneficiary deleted successfully!');
    }
}
