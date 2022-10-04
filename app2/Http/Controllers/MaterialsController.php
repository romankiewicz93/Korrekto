<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MaterialsController extends Controller
{


    public function create()
    {
        return view('material.create');
    }

    // STORE - um das Formular zu speichern
    public function update(Request $request, Material $material)
    {
        //dd($request->all());
        $formFields = $request->validate(
            [
                "name" => ['required'],
                "description" => 'required',
            ]
        );

        // dd($formFields);
        $material->update($formFields); // anstatt der Klasse wird die reguläre Methode update verwendet
        // Message welche hierbei ausgegeben wird

        //return back()->with('success', 'Modul wurde erfolgreich aktualisiert');
        return redirect('/materials')->with('success', 'Kursmaterial wurde erfolgreich aktualisiert');
    }

    // https://dev.to/kingsconsult/how-to-implement-delete-confirmation-in-laravel-8-7-6-with-modal-29c5
    // CONFIRMATION DIALOG
    public function destroy(Material $material)
    {
        //dd($material);

        $material->delete();
        return redirect('/materials')->with('success', 'Kursmaterial wurde erforlgreich gelöscht');
    }


    public function store(Request $request)
    {
        //dd($request->all());
        $formFields = $request->validate(
            [
                "name" => ['required', Rule::unique('materials', 'name')],
                "description" => "required",
            ]
        );

        // dd($formFields);
        Material::create($formFields);
        // Message welche hierbei ausgegeben wird
        return redirect('/materials')->with('success', 'Neues Kursmaterial erstellt');
    }



    public function edit(Material $material)
    {
        //dd($material);
        //dd($material->bezeichnung); // return: Null --> TODO
        return (view('material.edit', ['material' => $material]));
    }


    public function index()
    {


        /*
        dd(
            Material::latest()->filter(request(['bezeichnung', 'beschreibung'])) //hier search hinzufügen, als weiteres Element
                ->paginate(2)
        );
*/
        return view('material.index', [
            'materials' => Material::latest()->filter(request(['tag', 'search'])) //hier search hinzufügen, als weiteres Element
                ->paginate(25)
        ]);
    }

    public function show(Material $material)
    {
        return view('material.show', [
            'material' => $material
        ]);
    }
}
