<?php

namespace App\Livewire;

use App\Models\Traitor;
use Livewire\Component;
use Stevebauman\Location\Facades\Location;
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
        } else {
            $ip = request()->ip();
            $currentUserInfo = Location::get($ip);
            if ($currentUserInfo !== false) {
                $city = $currentUserInfo->cityName;
            } else {
                $city = 'all';
            }
            
        }
        
        session(['city' => $city]);


        if ($city !== 'all') {
            $traitors = Traitor::where('city', 'LIKE', '%' . $city . '%')->get();
        } else {
            $traitors = Traitor::all();
        }
        
        $products = new EloquentCollection();
        foreach ($traitors as $traitor) {
            $products[] = $traitor->products()->get();
        }
        $products = $products->collapse();

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
