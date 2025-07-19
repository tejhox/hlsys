<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class NikPasswordResetController extends Controller
{
    public function create()
    {
        return view('auth.forgot-password');
    }

    public function checkNik(Request $request)
    {
        $request->validate([
            'nik' => ['required', 'string', 'exists:users,nik'],
        ]);

        return redirect()->route('password.reset.nik', ['nik' => $request->nik]);
    }

    public function showResetForm($nik)
    {
        $user = User::where('nik', $nik)->firstOrFail();
        return view('auth.reset-password', ['nik' => $nik]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'nik' => ['required', 'exists:users,nik'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::where('nik', $request->nik)->firstOrFail();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('status', 'Password berhasil direset');
    }
}

