<?php

namespace App\Http\Controllers\Traitor;

use App\Models\Flyer;
use App\Http\Controllers\Controller;

class FlyerController extends Controller
{
    public function index()
    {
        return view('traitor.flyers.index', [
            'flyers' => Flyer::all()
        ]);
    }
}
