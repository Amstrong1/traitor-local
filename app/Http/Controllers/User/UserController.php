<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Nature;
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
    public function searchProducts(Request $request)
    {
        $minPrice = Product::min('price');
        $maxPrice = Product::max('price'); 
        $natures = Nature::all();       
        $city = $request->city;
        $name_nature = $request->name_nature;
        if($request->type == 'Tout'){
            $products = Product::where('name', 'LIKE', '%' . $request->name . '%')
                                ->where('price', 'LIKE', '%' . $request->price . '%')
                                ->where('min_order_qte', 'LIKE', '%' . $request->min_order_qte . '%')
                                ->whereHas('traitor', function ($query) use ($city) {
                                    $query->where('city', 'LIKE', '%' . $city . '%');
                                    })
                                ->whereHas('nature', function ($query) use ($name_nature) {
                                    $query->where('name', 'LIKE', '%' . $name_nature . '%');
                                    })
                                // ->orWhere('city', 'LIKE', '%' . $request->city . '%')                       
                                ->get();
        }else{

            $products = Product::where('name', 'LIKE', '%' . $request->name . '%')
                                ->where('type', 'LIKE', '%' . $request->type . '%')
                                ->where('price', 'LIKE', '%' . $request->price . '%')
                                ->where('min_order_qte', 'LIKE', '%' . $request->min_order_qte . '%')
                                ->whereHas('traitor', function ($query) use ($city) {
                                    $query->where('city', 'LIKE', '%' . $city . '%');
                                    })
                                ->whereHas('nature', function ($query) use ($name_nature) {
                                    $query->where('name', 'LIKE', '%' . $name_nature . '%');
                                    })
                                // ->orWhere('city', 'LIKE', '%' . $request->city . '%')                       
                                ->get();
        }

        //dd($products);
        return view('user.searchproducts', compact('products', 'minPrice', 'maxPrice', 'natures'));
    }

    // public function getSearchProducts(Request $request)
    // {
       

    // }

    public function indexProductsGeo()
    {
        return view('user.products');
    }

    public function showProduct(Request $request, $id)
    {
        $product = Product::find($id);

        // generation de id facture pk
        if (!$request->session()->has('product_count')) {
            $request->session()->put('product_count', 0);
        }

        if (request()->method() === 'POST') {
            $validated = $request->validate([
                'quantity' => 'required',
                'date' => 'required',
                'hour' => 'required',
            ]);

            $cart = [
                'id' => session('product_count'),
                'productId' => $request->productId,
                'productName' => $request->productName,
                'quantity' => $request->quantity,
                'deliveryDate' => $request->date,
                'deliveryHour' => $request->hour,
                'subTotal' => $request->total,
                'note' => $request->note,
            ];

            Session::push('cart', $cart);
            $request->session()->put('product_count', $request->session()->get('product_count') + 1);
            Alert::toast('Produit ajouté', 'success');
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
                $order->amount = floatval($request->input('productSubTotal' . $i));
                $order->delivery_place = Auth::user()->city . ', ' . Auth::user()->address;
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
        if (session('cart') !== null) {
            for ($i = 0; $i < sizeof(session('cart')); $i++) {
                if (session('cart')[$i]['id'] !== intval($session_product)) {
                    $cloud[] = session('cart')[$i];
                }
            }

            Session::forget('cart');

            if (isset($cloud)) {
                if (sizeof($cloud) !== 0) {
                    for ($i = 0; $i < sizeof($cloud); $i++) {
                        Session::push('cart', $cloud[$i]);
                    }
                }
            }
        }

        Alert::toast('Produit retiré du panier', 'error');
        return back();
    }

    public function orderProduct($id)
    {
        $order = Order::find($id);

        return view('user.order-product', compact('order'));
    }

    public function rate(Request $request, $id)
    {
        $product = Product::find($id);

        $validated = $request->validate([
            'rate' => 'required|string',
        ]);
        if ($validated) {
            if ($request->rate !== 0) {
                $product->rate = ceil(($product->rate + $request->rate) / 2);
            } else {
                $product->rate = $request->rate;
            }
            
            $product->save();

            Alert::toast('Merci de votre attention', 'success');
        }
        return redirect('/home');
    }
}
