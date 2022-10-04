<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleMaterials;
use Illuminate\Validation\Rule;

class ModuleMaterialsController extends Controller
{


    public function create()
    {
        return view('modulematerial.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $formFields = $request->validate(
            [
                "bezeichnung" => ['required', Rule::unique('module_materials', 'bezeichnung')],
                //"bezeichnung" => 'required',
                "beschreibung" => "required",
            ]
        );

        // dd($formFields);
        ModuleMaterials::create($formFields);
        // Message welche hierbei ausgegeben wird
        return redirect('/modulematerials')->with('success', 'Neues modulematerial erstellt');
    }


    // FUNKTIONIERT NOCH NICHT!!!
    public function destroy(ModuleMaterials $ModuleMaterial)
    {
        //dd($ModuleMaterial);

        $ModuleMaterial->delete();
        return redirect('/modulematerials')->with('success','modulematerial wurde erforlgreich gelöscht');
    }

    public function edit(ModuleMaterials $ModuleMaterial)
    {
        //dd($ModuleMaterial);
        //dd($ModuleMaterial->bezeichnung); // return: Null --> TODO
        return (view('modulematerial.edit', ['modulematerial' => $ModuleMaterial]));
    }


    public function index()
    {


        /*
        dd(
            ModuleMaterials::latest()->filter(request(['bezeichnung', 'beschreibung'])) //hier search hinzufügen, als weiteres Element
                ->paginate(2)
        );
*/
        return view('modulematerial.index', [
            'modulematerials' => ModuleMaterials::latest()->filter(request(['tag', 'search'])) //hier search hinzufügen, als weiteres Element
                ->paginate(25)
        ]);
    }

    public function show(ModuleMaterials $modulematerial)
    {
        return view('modulematerial.show', [
            'modulematerial' => $modulematerial
        ]);
    }
}

