<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users' => $users,
            'my_attributes' => $this->user_columns(),
        ]);
    }

    private function user_columns()
    {
        $columns = (object) [
            'name' => 'Nom',
            'email' => 'Email',
            'city' => 'Ville',
            // 'square' => 'Rue',
            'address' => 'Adresse',
        ];
        return $columns;
    }
}
