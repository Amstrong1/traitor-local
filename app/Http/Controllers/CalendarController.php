<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    public $sources = [
        [
            'model'      => 'App\Models\Order',
            'date_field' => 'delivery_date',
            'field1'      => 'product_name',
            'field2'      => 'user_name',
            'field3'      => 'delivery_hour',
            'prefix1'     => 'Nom du Repas :',
            'prefix2'     => 'Nom du Client :',
            'prefix3'     => 'Heure de Livraison :',
            'suffix'     => '',
            'route'      => 'traitor.orders.calendar',
        ]
    ];
    public function index()
    {   

        $events = [];

        $orders = Order::where('status', 'pending')->get();

        foreach ($this->sources as $source) {
            $calendarEvents = $source['model']::when(request('id') && $source['model'] == 'App\Models\Order', function($query) {
                return $query->where('id', request('id'));
            })->get();
            foreach ($calendarEvents as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix1'] . "\n" . $model->{$source['field1']} . "\n" . $source['prefix2'] . "\n" . $model->{$source['field2']} . "\n" . $source['prefix3'] . "\n" . $model->{$source['field3']}
                        . " " . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }
 
        // $orders = Order::with(['user', 'product'])->get();
        
        // foreach ($orders as $order) {
        //     $events[] = [
        //         'title' => $order->user->name . ' ('.$order->product->name.')',
        //         'start' => $order->delivery_hour,
        //         'end' => $order->delivery_hour,
        //     ];
        // }
       
        return view('traitor.calendar.index',compact('events'));
    }
}
