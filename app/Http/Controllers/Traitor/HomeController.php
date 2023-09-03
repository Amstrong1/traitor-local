<?php

namespace App\Http\Controllers\Traitor;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $pendingOrders = Order::where('traitor_id', Auth::id())->where('status', 'pending')->get();
        $allowedOrders = Order::where('traitor_id', Auth::id())->where('status', 'allowed')->get();
        $deniedOrders = Order::where('traitor_id', Auth::id())->where('status', 'denied')->get();
        $deliveredOrders = Order::where('traitor_id', Auth::id())->where('status', 'delivered')->get();

        $pendingOrdersSum = $pendingOrders->sum('amount');
        $allowedOrdersSum = $allowedOrders->sum('amount');
        $deniedOrdersSum = $deniedOrders->sum('amount');
        $deliveredOrdersSum = $deliveredOrders->sum('amount');


        return view('traitor.dashboard', compact(
            'pendingOrders',
            'allowedOrders',
            'deniedOrders',
            'deliveredOrders',
            'pendingOrdersSum',
            'allowedOrdersSum',
            'deniedOrdersSum',
            'deliveredOrdersSum',
        ));
    }
}
