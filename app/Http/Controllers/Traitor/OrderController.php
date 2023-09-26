<?php

namespace App\Http\Controllers\Traitor;

use App\Models\User;
use App\Models\Order;
use App\Mail\OrderDenied;
use App\Mail\OrderAllowed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function index()
    {
        return view('traitor.orders.index', [
            'orders' => Order::where('traitor_id', Auth::guard('traitor')->user()->id)->where('status', 'pending')->get(),
            'my_attributes' => $this->order_columns(),
            'my_actions' => $this->order_actions(),
        ]);
    }

    public function allowed()
    {
        return view('traitor.orders.index', [
            'orders' => Order::where('traitor_id', Auth::guard('traitor')->user()->id)->where('status', 'allowed')->get(),
            'my_attributes' => $this->order_columns(),
            'my_actions' => $this->order_actions(),
        ]);
    }

    public function denied()
    {
        return view('traitor.orders.index', [
            'orders' => Order::where('traitor_id', Auth::guard('traitor')->user()->id)->where('status', 'denied')->get(),
            'my_attributes' => $this->order_columns(),
            'my_actions' => $this->order_actions(),
        ]);
    }

    public function delivered()
    {
        return view('traitor.orders.index', [
            'orders' => Order::where('traitor_id', Auth::guard('traitor')->user()->id)->where('status', 'delivered')->get(),
            'my_attributes' => $this->order_columns(),
            'my_actions' => $this->order_actions(),
        ]);
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('traitor.orders.edit', [
            'order' => $order,
            'my_fields' => $this->order_fields(),
        ]);
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('traitor.orders.show', [
            'order' => $order,
            'my_fields' => $this->order_fields(),
        ]);
    }

    public function allow(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = 'allowed';
        $order->traitor_note = $request->message;
        $order->save();
        $user = User::find($order->user_id);
        Mail::to($user->email)->send(new OrderAllowed($order));
        Alert::toast('Commande confirmé', 'success');
        return redirect()->route('traitor.orders.index');
    }

    public function deny(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = 'denied';
        $order->traitor_note = $request->message;
        $order->save();
        $user = User::find($order->user_id);
        Mail::to($user->email)->send(new OrderDenied($order));
        Alert::toast('Commande refusé', 'error');
        return redirect()->route('traitor.orders.index');
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        try {
            $order = $order->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect(url()->previous());
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Elément introuvable');
            return redirect()->back();
        }
    }

    private function order_columns()
    {
        $columns = (object) [
            'product_name' => 'Produit',
            'quantity' => 'Quantité',
            'delivery_place' => 'Adresse de livraison',
            'formatted_delivery_date' => 'Date de livraison',
            'delivery_hour' => 'Heure de livraison',
            'formatted_paid' => 'Payé',
        ];
        return $columns;
    }

    private function order_actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
            'edit' => 'Modifier',
            'delete' => 'Supprimer',
        );

        return $actions;
    }

    private function order_fields()
    {
        $fields = [
            'user_name' => [
                'title' => 'Client',
                'field' => 'text',

            ],
            'product_name' => [
                'title' => 'Produit',
                'field' => 'text'
            ],
            'quantity' => [
                'title' => 'Quantité',
                'field' => 'text'
            ],
            'amount' => [
                'title' => 'Montant',
                'field' => 'text'
            ],
            'delivery_place' => [
                'title' => 'Lieu de livraison',
                'field' => 'textarea'
            ],
            'delivery_date' => [
                'title' => 'Date de livraison',
                'field' => 'date'
            ],
            'delivery_hour' => [
                'title' => 'Heure de livraison',
                'field' => 'time'
            ],
            'user_note' => [
                'title' => 'Note du client',
                'field' => 'textarea'
            ]
        ];

        return $fields;
    }
}
