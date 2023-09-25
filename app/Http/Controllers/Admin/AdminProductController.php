<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', [
            'products' => $products,
            'my_actions' => $this->product_actions(),
            'my_attributes' => $this->product_columns(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $orders = Order::where('product_id', $product->id)->get();
            foreach ($orders as $order) {
                $order = $order->delete();
            }
            $product = $product->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('admin/products');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
        }
    }

    private function product_actions()
    {
        $actions = (object) array(
            'delete' => "Supprimer",
        );
        return $actions;
    }

    private function product_columns()
    {
        $columns = (object) [
            'image' => '',
            'name' => 'Produit',
            'type' => 'Type',
            'price' => 'Prix',
            'min_order_qte' => 'Qte Min de Commande',
            'preparation_delay' => 'Temps de préparation',
            'description' => 'Desciption',
        ];
        return $columns;
    }
}
