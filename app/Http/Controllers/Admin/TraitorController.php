<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Traitor;
use App\Mail\TraitorDenied;
use App\Mail\TraitorAllowed;
use Illuminate\Http\Request;
use App\Mail\ContactTraitorMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class TraitorController extends Controller
{
    public function index()
    {
        $admins = Admin::all();

        foreach ($admins as $admin) {
            $admin->unreadNotifications->markAsRead();
        }

        $traitors = Traitor::where('status', 'pending')->get();

        return view('admin.traitors.index', [
            'traitors' => $traitors,
            'my_attributes' => $this->traitor_columns(),
            'my_actions' => $this->traitor_actions(),
        ]);
    }

    public function mailCreate($id)
    {
        $traitor = Traitor::find($id);

        return view('admin.traitors.mail-create', [
            'traitor' => $traitor,
            'my_fields' => $this->traitor_fields(),
        ]);
    }

    public function mailSend(Request $request, $id)
    {
        $traitor = Traitor::find($id);

        $request->validate([
            'object' => 'required|min:2|max:50',
            'message' => 'required'
        ]);

        Contact::create([
            'name' => $traitor->name,
            'email' => $traitor->email,
            'object' => $request->object,
            'message' => $request->message,
            'type' => 'sent',
        ]);

        $mail = [
            'name' => $traitor->name,
            'email' => $traitor->email,
            'object' => $request->object,
            'message' => $request->message
        ];

        Mail::to($traitor->email)->send(new ContactTraitorMail($mail));
        Alert::toast('Message envoyé', 'success');
        return back();    
    }

    public function allowed()
    {
        $admins = Admin::all();

        foreach ($admins as $admin) {
            $admin->unreadNotifications->markAsRead();
        }

        $traitors = Traitor::where('status', 'allowed')->get();

        return view('admin.traitors.index', [
            'traitors' => $traitors,
            'my_attributes' => $this->traitor_columns(),
            'my_actions' => $this->traitor_actions(),
        ]);
    }

    public function denied()
    {
        $admins = Admin::all();

        foreach ($admins as $admin) {
            $admin->unreadNotifications->markAsRead();
        }

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
            Alert::error('Erreur', 'Elément introuvable');
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
            'mail' => 'Mail',
            'show' => 'Voir',
            'edit' => 'Modifier',
            'delete' => 'Supprimer',
        );

        return $actions;
    }

    private function traitor_fields()
    {
        $fields = [
            'company' => [
                'title' => 'Dénomination sociale',
                'field' => 'text'
            ],
            'name' => [
                'title' => 'Nom du propriétaire/gérant',
                'field' => 'text'
            ],
            'email' => [
                'title' => 'Email',
                'field' => 'email'
            ],
            'contact' => [
                'title' => 'Contact',
                'field' => 'tel'
            ],
            'city' => [
                'title' => 'Ville',
                'field' => 'text'
            ],
            'postal' => [
                'title' => 'Code postal',
                'field' => 'text'
            ],
            'address' => [
                'title' => 'Adresse',
                'field' => 'textarea'
            ],
        ];

        return $fields;
    }
}
