<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Product;
use App\Models\Traitor;
use App\Mail\TraitorDenied;
use App\Mail\TraitorAllowed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class TraitorController extends Controller
{
    public function index()
    {
        $admin = Admin::find(1);

        $admin->unreadNotifications->markAsRead();

        $traitors = Traitor::where('status', 'pending')->get();

        return view('admin.traitors.index', [
            'traitors' => $traitors,
            'my_attributes' => $this->traitor_columns(),
            'my_actions' => $this->traitor_actions(),
        ]);
    }

    public function allowed()
    {
        $traitors = Traitor::where('status', 'allowed')->get();

        return view('admin.traitors.index', [
            'traitors' => $traitors,
            'my_attributes' => $this->traitor_columns(),
            'my_actions' => $this->traitor_actions(),
        ]);
    }

    public function denied()
    {
        $traitors = Traitor::where('status', 'denied')->get();

        return view('admin.traitors.index', [
            'traitors' => $traitors,
            'my_attributes' => $this->traitor_columns(),
            'my_actions' => $this->traitor_actions(),
        ]);
    }

    public function edit($id)
    {
        $traitor = Traitor::find($id);
        return view('admin.traitors.edit', [
            'traitor' => $traitor,
            'my_fields' => $this->traitor_fields(),
        ]);
    }

    public function show($id)
    {
        $traitor = Traitor::find($id);
        return view('admin.traitors.show', [
            'traitor' => $traitor,
            'my_fields' => $this->traitor_fields(),
        ]);
    }

    public function allow(Request $request, $id)
    {
        $traitor = Traitor::find($id);
        $traitor->status = 'allowed';
        $traitor->message = $request->message;
        $traitor->save();
        Mail::to($traitor->email)->send(new TraitorAllowed($traitor));
        Alert::toast('Traiteur confirmé', 'success');
        return redirect()->route('admin.traitors.index');
    }

    public function deny(Request $request, $id)
    {
        $traitor = Traitor::find($id);
        $traitor->status = 'denied';
        $traitor->message = $request->message;
        $traitor->save();
        Mail::to($traitor->email)->send(new TraitorDenied($traitor));
        Alert::toast('Traiteur refusé', 'error');
        return redirect()->route('admin.traitors.index');
    }

    public function destroy($id)
    {
        $traitor = Traitor::find($id);
        $products = Product::where('traitor_id', $id)->get();

        foreach ($products as $product) {
            $orders = Order::where('product_id', $product->id)->get();
            foreach ($orders as $order) {
                $order = $order->delete();
            }
            $product = $product->delete();
        }

        try {
            $traitor = $traitor->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect(url()->previous());
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
        }
    }

    private function traitor_columns()
    {
        $columns = (object) [
            'company' => 'Nom',
            'name' => 'Propriétaire/Gérant',
            'city' => 'Ville',
            'address' => 'Adresse',
        ];
        return $columns;
    }

    private function traitor_actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
            'edit' => 'Modifier',
            'delete' => 'Supprimer',
        );

        return $actions;
    }

    private function traitor_fields()
    {
        $fields = [
            'denomination' => [
                'title' => 'Dénomination sociale',
                'field' => 'time'
            ],
            'nom' => [
                'title' => 'Nom du propriétaire/gérant',
                'field' => 'date'
            ],
            'email' => [
                'title' => 'Email',
                'field' => 'date'
            ],
            'contact' => [
                'title' => 'Contact',
                'field' => 'time'
            ],
            'ville' => [
                'title' => 'Ville',
                'field' => 'textarea'
            ],
            'adresse' => [
                'title' => 'Adresse',
                'field' => 'textarea'
            ],
            'code_postal' => [
                'title' => 'Code postal',
                'field' => 'textarea'
            ],
        ];

        return $fields;
    }
}
