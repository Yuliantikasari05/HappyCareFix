<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Hapus middleware auth untuk memungkinkan verifikasi tanpa login
        // $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request)
    {
        // Ambil user berdasarkan ID dari URL
        $user = \App\Models\User::find($request->route('id'));
        
        if (!$user) {
            return redirect()->route('login')
                ->with('error', 'User tidak ditemukan.');
        }

        // Jika email sudah diverifikasi, redirect ke login
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login')
                ->with('success', 'Email sudah diverifikasi. Silakan login.');
        }

        // Verifikasi email
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        // Redirect ke login dengan pesan sukses
        return redirect()->route('login')
            ->with('success', 'Email berhasil diverifikasi. Silakan login.');
    }
}