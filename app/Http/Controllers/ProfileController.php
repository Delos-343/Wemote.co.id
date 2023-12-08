<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
<<<<<<< HEAD
use Illuminate\Contracts\Auth\MustVerifyEmail;
=======
>>>>>>> 7c68d75602681d5912517472dcb1f8f0aa6275e2
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
<<<<<<< HEAD
use Inertia\Inertia;
use Inertia\Response;
=======
use Illuminate\View\View;
>>>>>>> 7c68d75602681d5912517472dcb1f8f0aa6275e2

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
<<<<<<< HEAD
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
=======
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
>>>>>>> 7c68d75602681d5912517472dcb1f8f0aa6275e2
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

<<<<<<< HEAD
        return Redirect::route('profile.edit');
=======
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
>>>>>>> 7c68d75602681d5912517472dcb1f8f0aa6275e2
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
<<<<<<< HEAD
        $request->validate([
=======
        $request->validateWithBag('userDeletion', [
>>>>>>> 7c68d75602681d5912517472dcb1f8f0aa6275e2
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
