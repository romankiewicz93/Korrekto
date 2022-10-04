<?php

namespace App\Models;

use App\Models\Ticket;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'firstName',
        'lastName',
        'country',
        'city',
        'postcode',
        'streetName',
        'jobTitle',
        'languageCode',
        'phoneNumber',
        'email',
        'registriert_am',
        'department',
        'email',
        'password',
        'role_id',
    ];

    public function scopeFilter($query, array $filters)
    {

        if ($filters['search'] ?? false) {
            $query->where('firstName', 'like', '%' . request('search') . '%')
                ->orWhere('lastName', 'like', '%' . request('search') . '%')
                ->orWhere('country', 'like', '%' . request('search') . '%')
                ->orWhere('city', 'like', '%' . request('search') . '%')
                ->orWhere('postcode', 'like', '%' . request('search') . '%')
                ->orWhere('streetName', 'like', '%' . request('search') . '%')
                ->orWhere('languageCode', 'like', '%' . request('search') . '%')
                ->orWhere('phoneNumber', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%')
                ->orWhere('id', 'like', '%' . request('search') . '%');
        }
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // public function tutortickets2()
    // {
    //     return 'hello';
    // }

    // // Relationship With Listings
    // public function tutortickets()
    // {

    //     return 'hello';
    //     // $tickets = DB::table('tickets')
    //     //     ->join('modules', 'user.id', '=', 'modules.user_id')
    //     //     ->join('orders', 'users.id', '=', 'orders.user_id')
    //     //     ->select('users.*', 'contacts.phone', 'orders.price')
    //     //     ->get();
    //     $tickets = DB::table('modules')
    //         ->join('modules', 'user.id', '=', 'modules.user_id')
    //         ->get();

    //     return $tickets;

    //     $module = $this->hasMany(Module::class, 'user_id');

    //     return $module->get();

    //     return $this->hasMany(Ticket::class, 'user_id');
    // }

    // Relationship With Listings
    /* Um alle zugewiesenen Module zum TUtor zu erhalten wird folgende Abfrage benötigt
            6 = user_id
    User::find(6)->modules()->get()
      */
    //  $modules = User::find(6)->modules()->get()
    public function modules()
    {
        return $this->hasMany(Module::class, 'user_id');
    }


    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'user_id');
    }


    public function tutortickets()
    {
        return $this->hasOneThrough(
            Ticket::class,
            Module::class,
            'user_id', // Foreign key on the Module table...
            'module_id', // Foreign key on the Ticket table...
            'id', // Local key on the Ticket table...
            'id' // Local key on the Module table...
        );
    }


    public function tutorticketsOLD()
    {

        $id = Auth::id();
        //echo $id;

        $tickets = DB::table('tickets')
            ->join('modules', 'modules.id', '=', 'tickets.module_id')
            ->join('materials', 'materials.id', '=', 'tickets.materials_id')
            ->join('users', 'users.id', '=', 'modules.user_id')
            // ->select('tickets.*', 'modules.*', 'users.*', 'materials.*')
            // ->select('tickets.*', 'modules.*', 'materials.*')
            ->select('tickets.*', 'materials.name as materials_name') //, 'modules.*', 'materials.*')
            ->where('users.id',  $id)
            ->orderBy('tickets.updated_at')
            ->get();


        return  $tickets;
    }




    /**
     * Get the car's owner.
     * https://laravel.com/docs/9.x/eloquent-relationships#has-one-of-many
     */
    /* TUTOR TICKET???
    public function carOwner()
    {
        return $this->hasOneThrough(
            Owner::class,
            Car::class,
            'mechanic_id', // Foreign key on the cars table...
            'car_id', // Foreign key on the owners table...
            'id', // Local key on the mechanics table...
            'id' // Local key on the cars table...
        );
    }

    */





    // ------------ KANN WEG - NUR ZUR SICHERUNG - FALLS ES DOCH MIT DER OBIGEN LÖSUNG  tutortickets() PROBLEME GIBT -------------
    // public function tutortickets2()
    // {
    //     $modules = $this->hasMany(Module::class, 'user_id');
    //     //$tickets = null;
    //     //$tickets = collect(['product_id' => 'prod-100', 'name' => 'Desk']);
    //     $tickets = collect([]);

    //     // $tickets = Ticket::all();

    //     //$collection->pull('name');

    //     //return $collection->all();


    //     // foreach ($modules as $module) {



    //     // }

    //     echo 'foreach ($modules as $modul)';
    //     dd($modules);

    //     foreach ($modules as $modul) {

    //         echo 'modul:';
    //         echo $modul->kurskuerzel;
    //         $ticket = $modul->tickets()->get();
    //         echo $ticket->id;
    //         //$tickets->push($modul->tickets()->get());
    //         //$tickets->prepend($module->tickets()->get());
    //     }
    //     return $tickets->all();



    //     for ($i = 0; $i < $modules->count(); $i++) {

    //         echo '$i = 0; $i < $modules->count(); $i++';
    //         $ticket = $modules[$i]->tickets()->get();

    //         echo $ticket->id;

    //         //$tickets->push($modules[$i]->tickets()->get());
    //     }

    //     return $tickets->all();



    //     foreach ($modules as $modul) {

    //         return $modul->tickets()->get();

    //         $tickets->push($modul->tickets()->get());
    //         //$tickets->prepend($module->tickets()->get());
    //     }

    //     //return $modules;
    //     return $tickets->all();
    // }

    // ------------ KANN WEG - NUR ZUR SICHERUNG - FALLS ES DOCH MIT DER OBIGEN LÖSUNG  tutortickets() PROBLEME GIBT -------------



    // Beziehung zu Rolle - Mehrere Benutzer haben die gleiche Rolle.
    // Ein Benutzer hat genau EINE Rolle
    // Befehle um diese Methoden zu prüfen
    /*
        1.
        php artisan tinker

        2. Gib mir den ersten Datensatz zurück
        \App\Models\User::first()

        3. Gib mir die Rolle mit der ID 3 zurück
        \App\Models\Role::find(3)

        4. Gib mir alle User welche die Rolle ID=3 haben
        \App\Models\Role::find(3)->users

    */
    public function rolle()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
