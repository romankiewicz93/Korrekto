<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    private User $_Student;
    private User $_Tutor;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->erstelleAdmin();
        $this->erstelleStudenten(3);
        $this->erstelleTutoren(2);

        Ticket::factory(6)->create([
            'user_id' => $this->_Student->id
        ]);
    }


    public function erstelleAdmin()
    {
        $AdminRolle = Role::factory()->create([
            'name' => 'Admin',
            'description' => 'Ein Administrator (auch Sysop für system operator) ist eine spezielle Rolle eines Benutzers in Betriebssystemen, Netzwerken, Anwendungsprogrammen, Mailboxen, Mailinglisten oder Websites wie Diskussionsforen, Wikis und ähnlichen kollaborativen Internetauftritten.'
        ]);

        User::factory()->create([
            'role_id' => $AdminRolle->id,
            'email' => 'root@administrator.com',
            'firstName' => 'IU',
            'lastName' => 'ADMIN',
            'password' => bcrypt('administrator'),
            'department' => $AdminRolle->name,
        ]);
    }

    public function erstelleStudenten(int $AnzahlStudenten)
    {
        $StudentenRolle = Role::factory()->create([
            'name' => 'Student',
            'description' => 'Als Student oder weiblich Studentin (von lateinisch studens „strebend [nach], sich interessierend [für], sich bemühend um“) wird eine Person bezeichnet, die in einer Einrichtung des tertiären Bildungsbereichs eingeschrieben (immatrikuliert) ist und dort eine akademische Ausbildung (Studium) erhält oder an einer hochschulmäßigen Weiterbildung teilnimmt. Im modernen Sprachgebrauch wird im Plural häufig die geschlechtsneutrale Bezeichnung Studierende verwendet.'
        ]);

        $this->_Student = User::factory()->create([
            'role_id' => $StudentenRolle->id,
            'email' => 'Max.Musterstudent@iu-study.org',
            'firstName' => 'Max',
            'lastName' => 'Musterstudent',
            'password' => bcrypt('student'),
            'department' => $StudentenRolle->name,
        ]);

        User::factory($AnzahlStudenten)->create([
            'role_id' => $StudentenRolle->id,
            'department' => $StudentenRolle->name,
        ]);

    }

    public function erstelleTutoren(int $AnzahlTutoren)
    {
        $TutorRolle = Role::factory()->create([
            'name' => 'Tutor',
            'description' => 'Ein Tutor (lateinisch tutor für ‚Vormund‘, ‚Beschützer‘) ist im akademischen Bereich eine Person, die an Universitäten oder Hochschulen mit der Begleitung, Unterrichtung und Leitung anderer Personen beauftragt ist. Diese spezielle Form des Kurses nennt man auch Tutoriat, Tutorat oder Tutorium, in dem der Tutor beobachtet und bei Problemen der Studenten helfend eingreift. Dabei ist der Tutor in der Regel selbst auch (noch) Student.'
        ]);

        $this->_Tutor = User::factory()->create([
            'role_id' => $TutorRolle->id,
            'email' => 'Erika.Mustertutor@iu.com',
            'firstName' => 'Erika',
            'lastName' => 'Mustertutor',
            'password' => bcrypt('tutorin'),
            'department' => $TutorRolle->name,
        ]);


        User::factory($AnzahlTutoren)->create([
            'role_id' => $TutorRolle->id,
            'department' => $TutorRolle->name,
        ]);

    }
}
