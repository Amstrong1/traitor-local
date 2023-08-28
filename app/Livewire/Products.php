<?php

namespace App\Livewire;

use App\Models\Traitor;
use Livewire\Component;
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
        session(['city' => request()->city]);
        $traitors = Traitor::where('city', 'LIKE', '%' . request()->city . '%')->get();
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
