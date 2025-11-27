<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
protected function redirectTo()
{
    $user = Auth::user();

    if ($user->role === 'admin') {
        return '/admin/dashboard'; // or route('admin.dashboard')
    }

    return '/dashboard'; // default for all other roles
}
}
