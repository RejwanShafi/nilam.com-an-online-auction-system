<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    //
    public function index()
    {
        // Dashboard content
        // return view('admin.dashboard');
        $admin = Auth::user();


        return view('admin.dashboard', compact('admin'));
    }

    public function sellerDashboard()
    {
        $seller = Auth::user();  // Assuming the authenticated user is the seller

        return view('seller.dashboard', compact('seller'));
    }

    public function users()
    {
        // Fetch normal users
        $normalUsers = User::where('role', 3)->get(['id', 'name', 'email']);
        return view('admin.users', compact('normalUsers'));
    }

    public function sellers()
    {
        // Fetch sellers (assuming role 2 is for sellers)
        $sellers = User::where('role', 1)->get(['id', 'name', 'email']);
        return view('admin.sellers', compact('sellers'));
    }

    public function showAddAdminForm()
    {
        return view('admin.add-admin');
    }

    // Handle the registration of the new admin
    public function registerAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2, // Set role to 2 for admin
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'New admin registered successfully!');
    }
}
