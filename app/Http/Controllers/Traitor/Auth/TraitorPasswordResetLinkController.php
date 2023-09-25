<?php

namespace App\Http\Controllers\Traitor\Auth;

use App\Models\Traitor;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\TraitorPasswordResetLink;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class TraitorPasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('traitor.auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.

        $traitor = Traitor::where('email', $request->email)->first();

        if ($traitor !== null) {
            Mail::to($traitor->email)->send(new TraitorPasswordResetLink($traitor));
            Alert::toast('Votre requête a été soumise', 'success');
            return back();
        }
    }
}
