<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\Module;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $Ticket = $this->getTicket();

        return [
            'user_id' => '1',
            'module_id' => Module::find(random_int(1,DB::table('modules')->count())),//1,//$this->getKursKuerzel(), //TODO - ID
            'materials_id' => $Ticket[2], //TODO - ID

            'priority' => $this->faker->randomElement(['hoch', 'mittel', 'niedrig']), //TODO - ID
            'kategory' => $Ticket[1], //TODO - ID
            'status' => $this->faker->randomElement(['Offen', 'In Bearbeitung', 'Abgeschlossen']), //TODO - ID
            'description' => $Ticket[0],
            'comment' => '',
            'screenshot' => '',
        ];
    }

    public function getKursKuerzel()
    {
        return
            $this->faker->randomElement(['I', 'B', 'D']) .
            $this->faker->regexify('[A-Z]{3}');
    }


    public function getTicket()
    {
        $Kategorie = $this->faker->randomElement(['Fehler', 'Verbesserungsvorschläge', 'Ergänzung']);
        // $Material = $this->faker->randomElement(['Skript', 'Vodcast', 'VIDEO-LECTURE', 'Literaturangabe']);
        $Material = Material::find(random_int(1,DB::table('materials')->count()));
        $Beschreibung = '';
        //dd($Material);

        //dd($Material->name);

        if ($Kategorie == 'Fehler') {
            if ($Material->name== 'Skript' ||
            $Material->name== 'Forum'||
            $Material->name== 'Lösungsheft'||
            $Material->name== 'Präsentation'||
            $Material->name== 'Literaturangabe'||
            $Material->name== 'myCampus‐Fragen'
            ) {
                $Beschreibung = 'Rechtschreibfehler in Skript auf Seite 15 gefunden';
            } elseif ($Material->name== 'Vodcast') {
                $Beschreibung = 'Fehler in Cast, in Minute 3 bis Minute 4 ist die PowerPoint Folienicht zu sehen!';
            } elseif ($Material->name == 'VIDEO-LECTURE' || $Material->name == 'Tutorium') {
                $Beschreibung = 'Fehler in Vodcast, in Minute 15 bis Minute 16 ist kein Ton!';
            } elseif ($Material->name== 'Literaturangabe') {
                $Beschreibung = 'Quelle ist falsche Seitenangabe!';
            }
        } elseif ($Kategorie == 'Verbesserungsvorschläge') {
            if ($Material->name== 'Skript' ||
            $Material->name== 'Forum'||
            $Material->name== 'Lösungsheft'||
            $Material->name== 'Präsentation'||
            $Material->name== 'Literaturangabe'||
            $Material->name== 'myCampus‐Fragen'
            ) {
                $Beschreibung = 'In Skript mehr visuelle Hilfsmittel verwenden';
            } elseif ($Material->name== 'Vodcast') {
                $Beschreibung = $this->faker->randomElement(['Deutlicher Sprechen!', 'Power-Point Folien zur Verfügung stellen!']);
            } elseif ($Material->name== 'VIDEO-LECTURE') {
                $Beschreibung = 'Mehr Zeit für Fragen lassen! Oftmals wird zu wenig Zeit kalkuliert!';
            } elseif ($Material->name== 'Literaturangabe') {
                $Beschreibung = 'Auf aktuelle Quellen achten! Die Bücher sind über 20 Jahre alt!';
            }
        } elseif ($Kategorie == 'Ergänzung') {
            if ($Material->name== 'Skript' ||
            $Material->name== 'Forum'||
            $Material->name== 'Lösungsheft'||
            $Material->name== 'Präsentation'||
            $Material->name== 'Literaturangabe'||
            $Material->name== 'myCampus‐Fragen'
            ) {
                $Beschreibung = 'In Skript wird die Abbildung 10 nicht weiter ausgeführt. Bitte ergänzen!';
            } elseif ($Material->name== 'Vodcast') {
                $Beschreibung = 'Bitte mehr über das Kapitel 2 sprechen!';
            } elseif ($Material->name== 'VIDEO-LECTURE') {
                $Beschreibung = 'Bitte mehr ins Detail gehen! Die bisherigen VIDEOS sind zu oberflächlich';
            } elseif ($Material->name== 'Literaturangabe') {
                $Beschreibung = 'Auf aktuelle Quellen achten! Die Bücher sind über 20 Jahre alt!';
            }
        }
        else{
            $Beschreibung = 'Formfehler in Unterrichtsmaterial entdeckt! Bitte verbessern Sie das Problem.';
        }


        return [ $Beschreibung,$Kategorie, $Material->id ];
    }
}
