<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Language;
use App\Models\Role;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $countries = Country::where('display', true)->orderBy('country_name')->get();
        return view('auth.register', compact('countries'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'email_confirmation' => ['required', 'string', 'lowercase', 'email', 'same:email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required'],
            'phone' => ['required', 'string', 'max:20'],
            'address_1' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:20'],
            'country_id' => ['required', 'exists:countries,id'],
            'date_of_birth' => ['required', 'date', 'before:today'],
        ]);

        $customer_id = $this->generateCustomerId();
        
        // Default to first available language
        $defaultLanguage = Language::where('display', true)->first();
        $languageId = $defaultLanguage ? $defaultLanguage->id : 1;

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address_1' => $request->address_1,
            'city' => $request->city,
            'postcode' => $request->postcode,
            'country_id' => $request->country_id,
            'date_of_birth' => $request->date_of_birth,
            'language_id' => $languageId,
            'customer_id' => $customer_id,
            'role_id' => Role::where('name', 'customer')->first()->id,
            'user_status_id' => UserStatus::where('name', 'active')->first()->id,
        ]);

        event(new Registered($user));

        auth()->login($user);

        return redirect()->route('home')->with('success', 'Registration successful! Welcome to Forward Cash.');
    }

    private function generateCustomerId()
    {
        $prefix = 'CUST';
        $count = User::count() + 1;
        return $prefix . str_pad($count, 6, '0', STR_PAD_LEFT);
    }
}
