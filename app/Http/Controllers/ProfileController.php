<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        $user = auth()->user();
        return view('profile', ['user' => $user]);
    }

    public function showEditProfile() {
        return view('edit.profile');
    }

    public function showEditPassword() {
        return view('edit.password');
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $request->user()->update(
            $request->all()
        );

        return redirect()->route('profile')->with('success', 'Your name has been changed successfully!');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6',
        ]);

        $user = User::where('email', Auth::user()->email)->first();
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->route('password.edit')
            ->withErrors([
                'password_incorrect' => 'Your password is incorrect'
            ]);
        }

        $request->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('profile')->with('success', 'Your password has been changed successfully!');
    }
}
