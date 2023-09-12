<?php

namespace App\Http\Controllers\Traitor\Auth;

use App\Models\Admin;
use App\Models\Traitor;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Stevebauman\Location\Facades\Location;
use App\Notifications\NewTraitorRegistration;

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
            // 'square' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'postal' => ['required', 'string', 'max:5'],
        ]);

        $ip = $request->ip();
        $currentUserInfo = Location::get($ip);

        $traitor = Traitor::create([
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company,
            'contact' => $request->contact,
            'city' => $request->city,
            // 'square' => $request->square,
            'address' => $request->address,
            'postal' => $request->postal,
            'status' => 'pending',
            'latitude' => $currentUserInfo->latitude,
            'longitude' => $currentUserInfo->longitude,
        ]);

        event(new Registered($traitor));

        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new NewTraitorRegistration());
        }

        return view('traitor.welcome', compact('traitor'));
    }
}
