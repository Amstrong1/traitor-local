<?php

namespace App\Http\Controllers\Traitor;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('traitor_id', Auth::guard('traitor')->user()->id)->get();
        return view('traitor.products.index', [
            'products' => $products,
            'my_actions' => $this->product_actions(),
            'my_attributes' => $this->product_columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('traitor.products.create', [
            'my_fields' => $this->product_fields(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();

        $fileName = time() . '.' . $request->image->extension();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');

        $product->traitor_id = Auth::guard('traitor')->user()->id;
        $product->type = $request->type;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->min_order_qte = $request->min_order_qte;
        $product->preparation_delay = $request->preparation_delay;
        $product->description = $request->description;
        $product->image = $path;

        if ($product->save()) {
            Alert::toast("Données enregistrées", 'success');
            return redirect('traitor/products');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('traitor.products.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('traitor.products.edit', [
            'product' => $product,
            'my_fields' => $this->product_fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product = Product::find($product->id);

        if ($request->file !== null) {
            $fileName = time() . '.' . $request->image->extension();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
        }

        $product->type = $request->type;
        $product->name = $request->name;
        $product->price = abs($request->price);
        $product->min_order_qte = abs($request->min_order_qte);
        $product->preparation_delay = abs($request->preparation_delay);
        $product->description = $request->description;
        if (isset($path)) {
            $product->image = $path;
        }

        if ($product->save()) {
            Alert::toast('Les informations ont été modifiées', 'success');
            return redirect('traitor/products');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {

            $product = $product->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('traitor/products');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
        }
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

    private function product_actions()
    {
        $actions = (object) array(
            // 'show' => "Voir",
            'edit' => "Modifier",
            'delete' => "Supprimer",
        );
        return $actions;
    }

    private function product_fields()
    {
        $type = [
            'Entrée' => 'Entrée',
            'Plat' => 'Plat',
            'Dessert' => 'Dessert',
            'Boisson' => 'Boisson',
        ];
        $fields = [
            'name' => [
                'title' => 'Nom',
                'field' => 'text'
            ],
            'type' => [
                'title' => 'Type',
                'field' => 'select',
                'options' => $type,
            ],
            'price' => [
                'title' => 'Prix',
                'field' => 'text'
            ],
            'min_order_qte' => [
                'title' => 'Quantité Minimal Commande',
                'field' => 'number'
            ],
            'preparation_delay' => [
                'title' => 'Temps de préparation (heures)',
                'field' => 'number'
            ],
            'image' => [
                'title' => 'Image',
                'field' => 'file'
            ],
            'description' => [
                'title' => 'Description',
                'field' => 'textarea'
            ],
        ];
        return $fields;
    }
}
