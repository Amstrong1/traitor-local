<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Traitor;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class Products extends Component
{
    public $types = [
        'Tout' => 'Tout',
        'Entrée' => 'Entrée',
        'Plat' => 'Plat',
        'Dessert' => 'Dessert',
        'Boisson' => 'Boisson',
    ];

    public $type_id;

    public $products;

    protected $rules = [
        'type_id' => 'required',
    ];

    public function mount()
    {
        if (isset(request()->city)) {
            $city = request()->city;
            session(['city' => $city]);
            $traitors = Traitor::where('city', 'LIKE', '%' . $city . '%')->get();

            $products = new EloquentCollection();
            foreach ($traitors as $traitor) {
                $products[] = $traitor->products()->get();
            }
            $products = $products->collapse();
        } else {
            $latitude = request()->latitude; // Replace with the actual latitude value
            $longitude = request()->longitude; // Replace with the actual longitude value
            // dd(
            //     $latitude,
            //     $longitude
            // );

            $traitors = DB::table('traitors')
                ->select(
                    "id",
                    DB::raw("6371 * acos(cos(radians(?)) 
                    * cos(radians(latitude)) 
                    * cos(radians(longitude) - radians(?)) 
                    + sin(radians(?)) 
                    * sin(radians(latitude))) AS distance")
                )
                ->setBindings([$latitude, $longitude, $latitude])
                ->get();

            $products = new EloquentCollection();
            for ($i = 0; $i < count($traitors); $i++) {
                if ($traitors[$i]->distance > -1 && $traitors[$i]->distance < 20) {
                    $products[] = Product::where('traitor_id', $traitors[0]->id)->get();
                }
            }
            $products = $products->collapse();
        }

        $this->type_id = 'Tout';

        $this->products = $products;
    }

    public function render()
    {
        return view('livewire.products');
    }

    public function updateType($value)
    {
        $this->type_id = $value;

        $traitors = Traitor::where('city', session('city'))->get();

        $products = new EloquentCollection();
        foreach ($traitors as $traitor) {
            if ($value === 'Tout') {
                $products[] = $traitor->products()->get();
            } else {
                $products[] = $traitor->products()->where('type', $value)->get();
            }
        }
        $products = $products->collapse();

        $this->products = $products;
    }
}
