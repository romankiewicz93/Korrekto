<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Module;
use App\Models\Ticket;
use App\Models\ModuleMaterials;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(MaterialSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(RolesSeeder::class);
        //$this->call(ModuleMaterialsSeeder::class);

        $this->ordneTutorenModuleZu();
    }

    public function ordneTutorenModuleZu()
    {
        $TutorRolle = Role::where('name', 'Tutor')->first();
        $Tutoren = User::where('role_id', $TutorRolle->id)->get();



        $module = Module::all();
        foreach ($module as $modul) {
            $RandomId = random_int(0,$Tutoren->count()-1);
            $Tutor = $Tutoren[$RandomId];
            $modul->update(['user_id' => $Tutor->id]);
        }
    }
}
