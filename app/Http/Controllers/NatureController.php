<?php

namespace App\Http\Controllers;

use App\Models\Nature;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class NatureController extends Controller
{
    public function natures()
    {
        $natures = Nature::all();
        return view('admin.natures.index', compact('natures'));
    }

    public function create()
    {

        return view('admin.natures.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $nature = new Nature();
        $nature->name = $request->name;
        $nature->save();
        Alert::toast('Nature crée avec succés', 'success');

        return redirect()->route('admin.natures')->with('success', 'Nature created successfully.');
    }

    public function destroy($id)
    {
        $nature = Nature::findOrFail($id); // Récupère la nature en fonction de son ID
        $nature->delete(); // Supprime la nature
    
        return redirect()->route('admin.natures')->with('success', 'Nature supprimée avec succès.');
    }

    public function edit(Request $request, $id){
        $nature = Nature::findOrFail($id);
        return view('admin.natures.edit', compact('nature'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
    ]);

    $nature = Nature::findOrFail($id); // Récupère la nature en fonction de son ID
    $nature->name = $request->name;
    $nature->save();
    Alert::toast('Nature modifiée avec succés', 'success');

    return redirect()->route('admin.natures')->with('success', 'Nature modifiée avec succès.');
}

} 