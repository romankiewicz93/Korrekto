<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    //Show Register/Create Form
    public function create()
    {


        return view('users.register');
    }

    public function update(Request $request, User $user)
    {
        //dd($request->input('country.*.Test'));
        //dd($request->input('country', 'Test '));
        // dd($request->all());
        $formFields = $request->validate([
            'firstName' => ['required', 'min:3'],
            'lastName' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            //'role_id' => ['required', 'role_id', Rule::unique('users', 'email')],
            // 'password' => 'required|confirmed|min:6' //SOLL NATÜRLICH NICHT ÜBERSCHRIEBEN WERDEN
            // 'password' => ['required, confirmed, min:6'] //SOLL NATÜRLICH NICHT ÜBERSCHRIEBEN WERDEN
        ]);

        //dd( $request);
        $SelectedRole = $request->input('role_id');
        //dd($SelectedRole);
        //$Role = Role::where('name', 'Student')->first();
        $Role = Role::find($SelectedRole);
        //dd($Role);
        $formFields['role_id'] = $request->input('role_id', $Role->id); //Default-Werte
        $formFields['email'] = $request->input('email', ''); //Default-Werte
        $formFields['department'] = $Role->name;
        //$formFields['password'] = $request->input('password', ''); //SOLL NATÜRLICH NICHT ÜBERSCHRIEBEN WERDEN
        $formFields['country'] = ($request->input('country') == null ? "" : $request->input('country'));
        $formFields['city'] = ($request->input('city') == null ? "" : $request->input('city'));
        $formFields['postcode'] = ($request->input('postcode') == null ? "" : $request->input('postcode'));
        $formFields['streetName'] = ($request->input('streetName') == null ? "" : $request->input('streetName'));
        $formFields['jobTitle'] = ($request->input('jobTitle') == null ? "" : $request->input('jobTitle'));
        $formFields['languageCode'] = ($request->input('languageCode') == null ? "" : $request->input('languageCode'));
        $formFields['phoneNumber'] = ($request->input('phoneNumber') == null ? "" : $request->input('phoneNumber'));
        $formFields['title'] = ($request->input('title') == null ? "" : $request->input('title'));
        //dd($formFields );

        // dd($formFields);
        $user->update($formFields); // anstatt der Klasse wird die reguläre Methode update verwendet
        // Message welche hierbei ausgegeben wird

        //return back()->with('success', 'Modul wurde erfolgreich aktualisiert');
        return redirect('/users')->with('success', 'User wurde erfolgreich aktualisiert');
    }

    //Create New User
    public function store(Request $request)
    {

        //dd('STORE');
        //dd($request);

        $formFields = $request->validate([
            'firstName' => ['required', 'min:3'],
            'lastName' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'phoneNumber' => ['required', 'min:3'],
            'password' => 'required|confirmed|min:6'
            // 'password' => ['required, confirmed, min:6']
        ]);

        //dd($request->all());  //https://laravel.com/docs/9.x/requests
        //dd($request->email);
        //dd($request->input('firstName'));
        //dd($request->input('email'));
        //dd($request->file('firstName'));

        $Role = Role::where('name', 'Student')->first();
        //dd($Role->id);

        $formFields['role_id'] = $request->input('role_id', $Role->id); //Default-Werte
        $formFields['title'] = $request->input('title', ''); //Default-Werte
        $formFields['country'] = $request->input('country', '');
        $formFields['city'] = $request->input('city', '');
        $formFields['postcode'] = $request->input('postcode', '');
        $formFields['streetName'] = $request->input('streetName', '');
        $formFields['jobTitle'] = $request->input('jobTitle', '');
        $formFields['languageCode'] = $request->input('languageCode', 'de');
        //$formFields['phoneNumber'] = $request->input('phoneNumber', '');
        // $formFields['department'] = $request->input('department', 'Student');
        $formFields['department'] = $request->input('department', 'Student');
        //$formFields['is_admin'] = $request->input('is_admin', 0);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //dd($formFields);
        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('success', 'Ihr Account wurde erfolgreich angelegt und Bitte ergänzen Sie Ihre Profildaten!');
    }

    // Logout User
    public function logout(Request $request)
    {

        //dd($request);

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Sie wurden erfolgreich ausgeloggt!');
    }

    // Show Login Form
    public function login()
    {
        return view('users.login');
    }

    // // Show User Data
    // public function user() {
    //     return view('tickets.user');
    // }

    // Authenticate User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Sie sind nun eingeloggt!');
        }
        return back()->withErrors(['email' => 'Invalide Zugangsdaten'])->onlyInput('email');
    }

    public function edit(User $user)
    {
        //dd($user);
        //dd($user->bezeichnung); // return: Null --> TODO
        $roles = Role::all();
        //dd($roles);

        return (view('users.edit', ['user' => $user, 'roles' => $roles]));
    }


    // Delete Ticket
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users')->with('success', 'User wurde erfolgreich gelöscht');
    }



    public function index()
    {

        // return view('users.index', [
        //     'users' => User::all()//hier search hinzufügen, als weiteres Element

        // ]);

        // dd(User::all());

        // dd(
        //     User::latest()->filter(request(['tag', 'search'])) //hier search hinzufügen, als weiteres Element
        //         ->paginate(25)
        // );

        return view('users.index', [
            'users' => User::latest()->filter(request(['tag', 'search'])) //hier search hinzufügen, als weiteres Element
                ->paginate(25)
        ]);
    }



    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }
}
