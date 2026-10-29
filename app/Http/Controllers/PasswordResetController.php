<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class PasswordResetController extends Controller
{
    /**
     * Halaman lupa password.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Mengirim tautan reset password ke email.
     */
    public function sendResetLinkEmail(
        Request $request
    ): RedirectResponse {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with(
                'status',
                'Tautan reset password berhasil dikirim ke email Anda.'
            );
        }

        return back()->withErrors([
            'email' => __($status),
        ]);
    }

    /**
     * Menampilkan formulir password baru.
     */
    public function showResetForm(
        Request $request,
        string $token
    ): View {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    /**
     * Menyimpan password baru ke database.
     */
    public function reset(
        Request $request
    ): RedirectResponse {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $status = Password::reset(
            $request->only(
                'email',
                'password',
                'password_confirmation',
                'token'
            ),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()
                ->route('login')
                ->with(
                    'status',
                    'Password berhasil diubah. Silakan login kembali.'
                );
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => __($status),
            ]);
    }
}
