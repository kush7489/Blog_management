<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CustomerAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.customer_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('customer')->attempt($request->only('email', 'password'))) {
            return redirect()->route('customer.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showRegistrationForm()
    {
        return view('auth.customer_register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::guard('customer')->login($customer);
        return redirect()->route('customer.dashboard');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/');
    }
}
