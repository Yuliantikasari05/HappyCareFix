<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\GoogleLoginNotification;
use App\Notifications\GoogleRegistrationNotification;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Check if user exists
            $user = User::where('email', $googleUser->email)->first();
            
            $isNewUser = false;
            
            // If user doesn't exist, create a new one
            if (!$user) {
                $isNewUser = true;
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => bcrypt(Str::random(16)),
                    'role' => 'user', // Default role is user
                    'status' => 'active',
                    'email_verified_at' => Carbon::now(), // Auto verify email for Google users
                ]);
                
                // Send registration notification
                $user->notify(new GoogleRegistrationNotification());
            } else {
                // Update Google ID if it doesn't exist
                if (empty($user->google_id)) {
                    $user->google_id = $googleUser->id;
                    $user->save();
                }
                
                // Send login notification
                $user->notify(new GoogleLoginNotification());
            }
            
            // Login the user
            Auth::login($user);
            
            // Redirect based on user role
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard')
                    ->with('status', $isNewUser ? 'Account created and logged in successfully!' : 'Logged in successfully!');
            }
            
            return redirect()->route('home')
                ->with('status', $isNewUser ? 'Account created and logged in successfully!' : 'Logged in successfully!');
            
        } catch (Exception $e) {
            return redirect()->route('login')
                ->with('error', 'Google authentication failed: ' . $e->getMessage());
        }
    }
}
