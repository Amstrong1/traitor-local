<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Traitor;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;

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
}
