<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\NewOrderNotification;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    
    public function legal()
    {
        return view('user.legal');
    }

    public function indexProducts(Request $request)
    {
        $validated = $request->validate([
            'city' => 'required|string',
        ]);
        if ($validated) {
            return view('user.products');
        }
    }

    public function showProduct(Request $request, $id)
    {
        $product = Product::find($id);

        if (request()->method() === 'POST') {
            $validated = $request->validate([
                'quantity' => 'required',
                'date' => 'required',
                'hour' => 'required',
            ]);

            $cart = [
                'productId' => $request->productId,
                'productName' => $request->productName,
                'quantity' => $request->quantity,
                'deliveryDate' => $request->date,
                'deliveryHour' => $request->hour,
                'subTotal' => $request->total,
                'note' => $request->note,
            ];

            Session::push('cart', $cart);
            return back()->with(['product' => $product]);
        } else {
            return view('user.product-detail', compact('product'));
        }
    }

    public function profil()
    {

        return view('user.profile.edit');
    }

    public function cart()
    {
        return view('user.cart');
    }

    public function order()
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('status', '!=', 'delivered')->get();
        return view('user.order', compact('orders'));
    }

    public function storeOrder(Request $request)
    {
        if (Auth::user() !== null) {
            $error = 0;
            for ($i = 0; $i < sizeof(session('cart')); $i++) {
                $product = Product::find($request->input('productId' . $i));
                $order = new Order();

                $order->user_id = Auth::user()->id;
                $order->traitor_id = $product->traitor->id;
                $order->product_id = $product->id;
                $order->quantity = $request->input('productQte' . $i);
                $order->amount = $request->input('productSubTotal' . $i);
                $order->delivery_place = Auth::user()->city . ', ' . Auth::user()->square . ', ' . Auth::user()->address;
                $order->delivery_date = $request->input('deliveryDate' . $i);
                $order->delivery_hour = $request->input('deliveryHour' . $i);
                $order->user_note = $request->input('note' . $i);
                $order->status = 'pending';

                if ($order->save()) {
                    $traitor = $product->traitor;
                    $traitor->notify(new NewOrderNotification());
                } else {
                    $error++;
                }
            }
            if ($error == 0) {
                Session::forget('cart');
                Alert::toast('Commandes enregistrées', 'success');
            } else {
                Alert::toast('Une erreur est survenue', 'error');
            }
            return back();
        } else {
            return redirect()->route('login');
        }
    }

    public function removeProduct($session_product)
    {
        $cloud = array();
        for ($i = 0; $i < sizeof(session('cart')); $i++) {
            if (session('cart')[$i]['productId'] !== $session_product) {
                $cloud[$i] = session('cart')[$i];
            }
        }

        Session::forget('cart');

        Session::push('cart', $cloud);

        return back();
    }

    public function orderProduct($id)
    {
        $order = Order::find($id);

        return view('user.order-product', compact('order'));
    }
}
