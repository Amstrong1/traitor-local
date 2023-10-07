<?php

namespace App\Http\Controllers\Admin;

use App\Models\Flyer;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreFlyersRequest;
use App\Http\Requests\UpdateFlyersRequest;

class FlyersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flyers = Flyer::all();

        return view('admin.flyers.index', [
            'flyers' => $flyers,
            'my_actions' => $this->flyer_actions(),
            'my_attributes' => $this->flyer_columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.flyers.create', [
            'my_fields' => $this->flyer_fields(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFlyersRequest $request)
    {
        $flyer = new Flyer();

        $fileName = time() . '.' . $request->image->extension();
        // $path = $request->file('image')->storeAs('images', $fileName, 'public');

        $request->image->move(public_path('storage'), $fileName);

        $flyer->name = $request->name;
        $flyer->price = $request->price;
        $flyer->image = $fileName;

        if ($flyer->save()) {
            Alert::toast("Données enregistrées", 'success');
            return redirect('admin/flyers');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Flyer $flyer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flyer $flyer)
    {
        return view('admin.flyers.edit', [
            'flyer' => $flyer,
            'my_fields' => $this->flyer_fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFlyersRequest $request, Flyer $flyer)
    {
        $flyer = Flyer::find($flyer->id);

        if ($request->file !== null) {
            $fileName = time() . '.' . $request->image->extension();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
        }

        $flyer->name = $request->name;
        $flyer->price = abs($request->price);
        if (isset($path)) {
            $flyer->image = $path;
        }

        if ($flyer->save()) {
            Alert::toast('Les informations ont été modifiées', 'success');
            return redirect('admin/flyers');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flyer $flyer)
    {
        try {

            $flyer = $flyer->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('admin/flyers');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Elément introuvable');
            return redirect()->back();
        }
    }

    private function flyer_columns()
    {
        $columns = (object) [
            'image' => '',
            'name' => 'Nom',
            'price' => 'Prix €',
        ];
        return $columns;
    }

    private function flyer_actions()
    {
        $actions = (object) array(
            'edit' => "Modifier",
            'delete' => "Supprimer",
        );
        return $actions;
    }

    private function flyer_fields()
    {
        $fields = [
            'name' => [
                'title' => 'Nom',
                'field' => 'text'
            ],
            'price' => [
                'title' => 'Prix',
                'field' => 'number'
            ],
            'image' => [
                'title' => 'Image',
                'field' => 'file'
            ]
        ];
        return $fields;
    }
}
