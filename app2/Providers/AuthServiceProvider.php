<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /* TODO: Rollenbelegung
    Neue VIEW in der, der Admin die Rolle verteilt
    */

    public static $permissions = [
        // --- Permissions für Kursmateralien ---
        /* TODO: Nice to have
        'create-modulematerials'
        'destroy-modulematerials' sollte nur Admin
        'create-modulematerials' => ['Admin'],
        'destroy-modulematerials' => ['Admin'],
        */
        'index-materials' => ['Tutor', 'Admin'],
        'show-materials' => ['Tutor', 'Admin'],
        'create-materials' => ['Tutor', 'Admin'],
        'store-materials' => ['Tutor', 'Admin'],
        'edit-materials' => ['Tutor', 'Admin'],
        'update-materials' => ['Tutor', 'Admin'],
        'destroy-materials' => ['Tutor', 'Admin'],
        // --- Permissions für Module ---
        'index-module' => ['Tutor', 'Admin'],
        'show-module' => ['Tutor', 'Admin'],
        'create-module' => ['Tutor', 'Admin'],
        'store-module' => ['Tutor', 'Admin'],
        'edit-module' => ['Tutor', 'Admin'],
        'update-module' => ['Tutor', 'Admin'],
        'destroy-module' => ['Tutor', 'Admin'],
        // --- Permissions für Tickets ---
        /* Löschen des Tickets sollte nur der Admin dürfen,
        Tutor sollte nur ein Ticket abschließen dürfen, aber nicht löschen!*/
        'index-tickets' => ['Student', 'Tutor', 'Admin'],
        'show-tickets' => ['Student', 'Tutor', 'Admin'],
        'create-tickets' => ['Student', 'Tutor', 'Admin'],
        'store-tickets' => ['Student', 'Tutor', 'Admin'],
        'edit-tickets' => ['Student', 'Tutor', 'Admin'],
        'edit-all-tickets' => ['Admin'],
        'update-tickets' => ['Student', 'Tutor', 'Admin'],
        'destroy-tickets' => ['Student', 'Tutor', 'Admin'],
        'destroy-all-tickets' => [ 'Admin'],
        'show-module-tickets' => [ 'Tutor'],
        'show-no-module-tickets' => [ 'Student', 'Admin'],
        // --- Permissions für Users ---
        /* Löschen des Users sollte nur der Admin dürfen,
        Tutor sollte nur ein Ticket abschließen dürfen, aber nicht löschen!*/
        'index-users' => ['Tutor', 'Admin'],
        'show-users' => ['Student', 'Tutor', 'Admin'],
        'create-users' => ['Student', 'Tutor', 'Admin'],
        'store-users' => ['Student', 'Tutor', 'Admin'],
        'edit-users' => ['Student', 'Tutor', 'Admin'],
        'update-users' => ['Student', 'Tutor', 'Admin'],
        'destroy-users' => ['Tutor', 'Admin'],
        // --- Permissions für Dashboard ---
        'dashboard-tutor' => ['Tutor'],
        'dashboard-student' => ['Student'],
        'dashboard-admin' => ['Admin'],
    ];

    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Rollen basierte  authorization
        /*
        Hier erlauben wir dem Administrator Zugriff auf
        alles, indem wir true zurückliefern, wenn die Benutzerrolle
        Admin ist.*/
        Gate::before(
            function ($user, $ability) {

                //$rolle = $user->rolle->name;
                //dd($rolle);
                //dd($rolle->name);

                if ($user->rolle->name === 'Admin') {
                    return true;
                }
                // if ($user->abteilung === 'Admin') {
                //     return true;
                // }
                // if ($user->role === 'admin') {
                //     return true;
                // }
            }
        );

        /*
        Als Nächstes durchlaufen wir unser Berechtigungsarray
         und definieren für jedes ein Gate.
         Wo in, überprüfen wir, ob die Rolle des Benutzers
          in den Rollen ist, die den Aktionen zugeordnet sind.
        */
        foreach (self::$permissions as $action => $roles) {
            Gate::define(
                $action,
                function (User $user) use ($roles) {
                    if (in_array($user->rolle->name, $roles)) {
                        return true;
                    }
                }
            );
        }
    }
}
