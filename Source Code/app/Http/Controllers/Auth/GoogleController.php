<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log; 


class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('google-oauth-placeholder'),
                ]
            );

            auth()->guard('web')->login($user);  // ✅ FORCE use 'web' guard
            session()->regenerate();             // ✅ Persist the session ID

            Log::info("Logged in with Google as role: {$user->role}");

            return redirect()->route($user->role === 'admin' ? 'admin.dashboard' : 'dashboard');

        } catch (\Exception $e) {
		Log::error('Google login failed: ' . $e->getMessage());
		Log::error($e->getTraceAsString());
            return redirect('/login')->with('error', 'Google login failed: ' . $e->getMessage());
        }
    }
}
