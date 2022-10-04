<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ModuleController extends Controller
{

    // SHOW CREATE - Modul
    public function create()
    {

        $rollen = Role::where('name', 'Tutor')->first();
        $tutors = User::where('role_id',$rollen->id)->get();

        //$modulematerials = ModuleMaterials::all();
        //dd($modulematerials);

        return view('module.create', ['tutors' => $tutors]);
    }

    // STORE - um das Formular zu speichern
    public function update(Request $request, Module $modul)
    {
        //dd($request->all());
        $formFields = $request->validate(
            [
                "kurskuerzel" => ['required'],
                "kurzbezeichnung" => 'required',
                "user_id" => 'required',
                "tags" => 'required',
                "beschreibung" => "required",
            ]
        );

        // if ($request->hasfile('logo')) {
        //     $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        // }

        // dd($formFields);
        $modul->update($formFields); // anstatt der Klasse wird die reguläre Methode update verwendet
        // Message welche hierbei ausgegeben wird

        //return back()->with('success', 'Modul wurde erfolgreich aktualisiert');
        return redirect('/modules')->with('success', 'Modul wurde erfolgreich aktualisiert');
    }

    public function destroy(Module $modul)
    {

        //dd($modul);
        //    alert('Text wurde ausgewählt');

        $modul->delete();
        return redirect('/modules')->with('success', 'Modul wurde erforlgreich gelöscht');
    }


    public function store(Request $request)
    {
        //dd($request->all());
        // dd($request->file('logo')->store()); --> den inhalt des logos anzeigenlassen

        $formFields = $request->validate(
            [
                "kurskuerzel" => ['required', Rule::unique('modules', 'kurskuerzel')],
                //"kurskuerzel" => 'required',
                "kurzbezeichnung" => 'required',
                "user_id" => 'required',
                "tags" => 'required',
                "beschreibung" => "required",
                /*"logo" => null
            */

            ]
        );

        //dd($request->hasfile('logo'));
        //dd($request->file('logo'));
        // if ($request->hasfile('logo')) {
        //     //lade die Datei hoch und erzeuge einen neuen Ordner "logos"
        //     $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        // }


        // dd($formFields);
        Module::create($formFields);

        // Information für Successfull
        //$request->session()->flash('message', 'Modul wurde erstellt');


        // Message welche hierbei ausgegeben wird
        return redirect('/modules')->with('success', 'Modul wurde erstellt');
    }


    // Editiere
    /* dd ergibt folgendes ergebnis:
  #attributes: array:8 [▼
"id" => 54
"kurskuerzel" => "ZZZC"
"kurzbezeichnung" => "Projekt Seminar"
"beschreibung" => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At v ▶"
"tags" => "IU, Modul, WI"
"logo" => "logos/nFgR2JZrlvIwlKQDu69sdLBEn3FxF4e0Pxprq5Xz.jpg"
"created_at" => "2022-06-27 06:17:50"
"updated_at" => "2022-06-27 06:17:50"
]
#original: array:8 [▼
"id" => 54
"kurskuerzel" => "ZZZC"
"kurzbezeichnung" => "Projekt Seminar"
"beschreibung" => "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At v ▶"
"tags" => "IU, Modul, WI"
"logo" => "logos/nFgR2JZrlvIwlKQDu69sdLBEn3FxF4e0Pxprq5Xz.jpg"
"created_at" => "2022-06-27 06:17:50"
"updated_at" => "2022-06-27 06:17:50"
]*/
    public function edit(Module $modul)
    {
        //dd($modul);
        //dd($modul->kurskuerzel); // return: ^ "ZZZC"

        $rollen = Role::where('name', 'Tutor')->first();
        $tutors = User::where('role_id',$rollen->id)->get();

        return (view('module.edit', ['modul' => $modul,'tutors' => $tutors]));
    }


    // OHNE LOGO
    /*    public function store(Request $request)
{
    //dd($request->all());


    $formFields = $request->validate(
        [
            "kurskuerzel" => ['required', Rule::unique('modules', 'kurskuerzel')],
            //"kurskuerzel" => 'required',
            "kurzbezeichnung" => 'required',
            "tags" => 'required',
            "beschreibung" => "required",
            #"logo" => null


        ]
    );

    // dd($formFields);
    Module::create($formFields);

    // Information für Successfull
    //$request->session()->flash('message', 'Modul wurde erstellt');


    // Message welche hierbei ausgegeben wird
    return redirect('/')->with('success', 'Modul wurde erstellt');
}
*/

    // STORE - um das Formular zu speichern
    /*public function store(Request $request)
{
    //dd($request->all());

    $formFields = $request->validate(
        [
            "kurskuerzel" => ['required', Rule::unique('modules', 'kurskuerzel')],
            //"kurskuerzel" => 'required',
            "kurzbezeichnung" => 'required',
            "tags" => 'required',
            "beschreibung" => "required",
        ]
    );

    // dd($formFields);
    Module::create($formFields);

    return redirect('/');
}*/



    // Pagination mit einbinden
    public function index()
    {
        //dd(request('search'));

        //  return view('module.index', [
        //          'module' => Module::latest()->filter(request(['search'])) //hier search hinzufügen, als weiteres Element
        //              ->paginate(25)
        //      ]);

        return view('module.index', [
            'module' => Module::latest()->filter(request(['tag', 'search'])) //hier search hinzufügen, als weiteres Element
                ->paginate(25)
        ]);
    }


    /*
public function index()
{
    // dd(request('tag')); //Dump, Die, Debug -> wirft eine Excpetion // Ergebnis: "Mathematik Studium"

    return view('module.index', [
        'module' => Module::latest()->filter(request(['tag', 'search'])) //hier search hinzufügen, als weiteres Element
            ->get()
    ]);
}
*/
    /*
// index mit Tag-Filter
public function indexMitTagFilter()
{
    // dd(request('tag')); //Dump, Die, Debug -> wirft eine Excpetion // Ergebnis: "Mathematik Studium"

    return view('module.index', [
        'module' => Module::latest()->filter(request(['tag']))
        ->get()
    ]);
}
*/


    // EInfacher Scope Filter für Tags
    /*
public function index()
{
    // dd(request('tag')); //Dump, Die, Debug -> wirft eine Excpetion // Ergebnis: "Mathematik Studium"

    return view('module.index', [
        'module' => Module::latest()->filter(request(['tag']))
        ->get()
    ]);
}
*/


    // ---------------------------------------------------------------------------------------
    // Weiteres Beispiel für Dependencies Injection
    /* Informationen der Daten findest du unter:
                +query: Symfony\Component\HttpFoundation\InputBag {#50 ▼
            #parameters: array:1 [▼
            "tag" => "Module"
            ]
        }
*/
    /* public function index()
{
    // request() funktion ist ein helper
    ddd(request()); //Dump, Die, Debug -> wirft eine Excpetion

    return view('module.index', [
        'module' => Module::all()
    ]);
}*/

    // ---------------------------------------------------------------------------------------
    // Beispiel für Dependencies Injection
    /*
+query: Symfony\Component\HttpFoundation\InputBag {#50 ▼
#parameters: array:1 [▼
  "tag" => "Module"
]
}
*/
    /* public function index(Request $request)
{
    // dd(); //Dump, Debug -> bringt den Request Json
    dd($request); // wenn man herausfinden möchte was in der request steckt dann mit der FUnktion dd oder ddd arbeiten

    return view('module.index', [
        'module' => Module::all()
    ]);
}*/
    /*public function index()
{

    return view('module.index', [
        'module' => Module::all()
    ]);
}*/
    public function show(Module $modul)
    {
        return view('module.show', [
            'modul' => $modul
        ]);
    }
}
