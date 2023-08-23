<?php

namespace App\Http\Controllers\Traitor\Auth;

use App\Http\Controllers\Controller;
use App\Models\Traitor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredTraitorController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('traitor.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Traitor::class],
            'contact' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'postal' => ['required', 'string', 'max:8'],
        ]);

        $traitor = Traitor::create([
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company,
            'contact' => $request->contact,
            'city' => $request->city,
            'address' => $request->address,
            'postal' => $request->postal,
            'status' => 'pending',
        ]);

        event(new Registered($traitor));

        // $admins = Admin::all();
        // foreach ($admins as $admin) {
        //     $admin->notify(new NewTraitorRegistration());
        // }

        // Auth::guard('traitor')->login($traitor);

        return view('traitor.welcome', compact('traitor'));
    }
}
