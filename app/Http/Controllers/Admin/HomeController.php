<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Traitor;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::count();
        $traitors = Traitor::count();

        $products = Product::all();
        $productsSum = $products->sum('price');

        $deliveredOrders = Order::where('status', 'delivered')->get();        
        $deliveredOrdersSum = $deliveredOrders->sum('amount');

        return view('admin.dashboard', compact(
            'users',
            'traitors',
            'products',
            'productsSum',
            'deliveredOrders',
            'deliveredOrdersSum',
        ));
    }

    public function mailSent() {
        $mails = Contact::where('type', 'sent')->get();

        return view('admin.mail-box.sent', [
            'mails' => $mails,
            'my_attributes' => $this->mail_columns(),
            'my_actions' => $this->mail_actions(),
        ]);
    }

    public function mailReceipt() {
        $mails = Contact::where('type', 'receipt')->get();

        return view('admin.mail-box.receipt', [
            'mails' => $mails,
            'my_attributes' => $this->mail_columns(),
            'my_actions' => $this->mail_actions(),
        ]);
    }

    public function show($id) {
        $mail = Contact::find($id);

        return view('admin.mail-box.show', [
            'mail' => $mail,
            'my_fields' => $this->mail_fields(),
        ]);
    }

    public function destroy($id) {
        $mail = Contact::find($id);

        try {
            $mail = $mail->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect(url()->previous());
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Elément introuvable');
            return redirect()->back();
        }
    }

    private function mail_columns()
    {
        $columns = (object) [
            'name' => 'Nom et Prénom',
            'email' => 'Email',
            'object' => 'Objet',
        ];
        return $columns;
    }

    private function mail_actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
            'delete' => 'Supprimer',
        );

        return $actions;
    }

    private function mail_fields()
    {
        $fields = [
            'name' => [
                'title' => 'Nom et Prénom',
                'field' => 'text'
            ],
            'email' => [
                'title' => 'Email',
                'field' => 'text'
            ],
            'object' => [
                'title' => 'Objet',
                'field' => 'text'
            ]
        ];

        return $fields;
    }
}
