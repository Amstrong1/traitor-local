<?php

namespace App\Http\Controllers\Traitor\Auth;

use App\Models\Traitor;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class TraitorNewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('traitor.auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $traitor = Traitor::where('email', $request->email)->first();

        if ($traitor !== null) {
            $traitor->password = Hash::make($request->password);
            $traitor->save();
            Alert::toast('Mot de passe réinitialisé avec succes', 'success');
            return redirect('login-traitor');
        } else {
            Alert::toast('Email non trouvé', 'error');
            return back();
        }
    }
}
