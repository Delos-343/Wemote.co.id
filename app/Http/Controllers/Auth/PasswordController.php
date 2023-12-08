<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
<<<<<<< HEAD
        $validated = $request->validate([
=======
        $validated = $request->validateWithBag('updatePassword', [
>>>>>>> 7c68d75602681d5912517472dcb1f8f0aa6275e2
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

<<<<<<< HEAD
        return back();
=======
        return back()->with('status', 'password-updated');
>>>>>>> 7c68d75602681d5912517472dcb1f8f0aa6275e2
    }
}
