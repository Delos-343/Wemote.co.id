<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
<<<<<<< HEAD
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;
=======
use Illuminate\View\View;
>>>>>>> 7c68d75602681d5912517472dcb1f8f0aa6275e2

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
<<<<<<< HEAD
    public function create(): Response
    {
        return Inertia::render('Auth/ForgotPassword', [
            'status' => session('status'),
        ]);
=======
    public function create(): View
    {
        return view('auth.forgot-password');
>>>>>>> 7c68d75602681d5912517472dcb1f8f0aa6275e2
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
<<<<<<< HEAD
            'email' => 'required|email',
=======
            'email' => ['required', 'email'],
>>>>>>> 7c68d75602681d5912517472dcb1f8f0aa6275e2
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

<<<<<<< HEAD
        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
=======
        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
>>>>>>> 7c68d75602681d5912517472dcb1f8f0aa6275e2
    }
}
