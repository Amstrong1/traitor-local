<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactUserMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users' => $users,
            'my_actions' => $this->user_actions(),
            'my_attributes' => $this->user_columns(),
        ]);
    }

    public function mailCreate($id)
    {
        $user = User::find($id);

        return view('admin.users.mail-create', [
            'user' => $user,
            'my_fields' => $this->user_fields(),
        ]);
    }

    public function mailSend(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'object' => 'required|min:2|max:50',
            'message' => 'required'
        ]);

        Contact::create([
            'name' => $user->name,
            'email' => $user->email,
            'object' => $request->object,
            'message' => $request->message,
            'type' => 'sent',
        ]);

        $mail = [
            'name' => $user->name,
            'email' => $user->email,
            'object' => $request->object,
            'message' => $request->message
        ];

        Mail::to($user->email)->send(new ContactUserMail($mail));
        Alert::toast('Message envoyé', 'success');
        return back();    
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $orders = Order::where('user_id', $id)->get();

        foreach ($orders as $order) {
            $order = $order->delete();
        }

        try {
            $user = $user->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect(url()->previous());
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Elément introuvable');
            return redirect()->back();
        }
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

    private function user_actions()
    {
        $actions = (object) array(
            'delete' => 'Supprimer',
        );

        return $actions;
    }
}
