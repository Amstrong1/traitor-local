<?php

namespace App\Http\Controllers;

use App\Models\Traitor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePasswordRequest;

class PasswordController extends Controller
{
    public function edit($id)
    {
        $traitor = Traitor::find($id);

        if ($traitor->status === 'allowed') {
            return view('password.create', compact('traitor'));
        } else {
            abort(403);
        }
    }

    public function update(StorePasswordRequest $request, $id)
    {
        $traitor = Traitor::find($id);
        $traitor->password = Hash::make($request->password);

        if ($traitor->save()) {
            Auth::guard('traitor')->login($traitor);
            return redirect()->route('traitor.dashboard');
        }
    }
}
