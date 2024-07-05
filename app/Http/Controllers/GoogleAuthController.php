<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check if user already exists
            $user = User::where('google_id', $googleUser->getId())->first();

            if (!$user) {
                // Create a new user record if not exists
                $newUser = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                ]);

                // Login the new user
                Auth::login($newUser);
                return redirect()->intended('dashboard');
            } else {
                // Login existing user
                Auth::login($user);
                return redirect()->intended('dashboard');
            }

        } catch (\Throwable $e) {
            // Handle exceptions
            dd('Something went wrong. Please try again.' . $e->getMessage());
        }
    }
}
