<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Display login form
    public function login(): View
    {
        // Render the login view
        return view(
            'auth.login',
            [
                'title' => 'Log in'
            ]
        );
    }

    // Authenticate user
    public function authenticate(Request $request): RedirectResponse
    {
        // Extract only 'name' and 'password' from the request
        $credentials = $request->only('name', 'password');

        // Attempt authentication
        if (Auth::attempt($credentials)) {
            // Regenerate session ID to prevent session fixation
            $request->session()->regenerate();

            // Redirect to authors list (can later change to /books)
            return redirect('/authors');
        }

        // Authentication failed, redirect back with error message
        return back()->withErrors([
            'name' => 'Failed to authenticate',
        ]);
    }

    // End user session
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout(); // Log out the authenticated user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token
        return redirect('/'); // Redirect to the homepage
    }
}
