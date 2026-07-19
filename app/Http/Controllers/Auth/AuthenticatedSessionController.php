<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();

    $request->session()->regenerate();
$role = strtolower(auth()->user()->role->name ?? '');
    

    switch ($role) {

        case 'administrator':
            return redirect()->route('dashboard');

        case 'kitchen':
            return redirect()->route('kitchen.index');

        case 'receptionist':
            return redirect()->route('guest-room-allocations.index');

        case 'community member':
            return redirect()->route('member.dashboard');

        case 'staff':
            return redirect()->route('staff.dashboard');

        case 'guest':
            return redirect()->route('guest.dashboard');

        default:
            return redirect()->route('dashboard');
    }
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
