<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Material::factory(10)->create();
        Material::factory()->create([
            'name' => 'Skript',
            //TODO Saubere Beschreibung -- 'description' => 'Ein Administrator (auch Sysop für system operator) ist eine spezielle Rolle eines Benutzers in Betriebssystemen, Netzwerken, Anwendungsprogrammen, Mailboxen, Mailinglisten oder Websites wie Diskussionsforen, Wikis und ähnlichen kollaborativen Internetauftritten.'
        ]);
        Material::factory()->create([
            'name' => 'Forum',
            //TODO Saubere Beschreibung -- 'description' => 'Ein Administrator (auch Sysop für system operator) ist eine spezielle Rolle eines Benutzers in Betriebssystemen, Netzwerken, Anwendungsprogrammen, Mailboxen, Mailinglisten oder Websites wie Diskussionsforen, Wikis und ähnlichen kollaborativen Internetauftritten.'
        ]);
        Material::factory()->create([
            'name' => 'Vodcast',
            //TODO Saubere Beschreibung -- 'description' => 'Ein Administrator (auch Sysop für system operator) ist eine spezielle Rolle eines Benutzers in Betriebssystemen, Netzwerken, Anwendungsprogrammen, Mailboxen, Mailinglisten oder Websites wie Diskussionsforen, Wikis und ähnlichen kollaborativen Internetauftritten.'
        ]);
        Material::factory()->create([
            'name' => 'Podcast',
            //TODO Saubere Beschreibung -- 'description' => 'Ein Administrator (auch Sysop für system operator) ist eine spezielle Rolle eines Benutzers in Betriebssystemen, Netzwerken, Anwendungsprogrammen, Mailboxen, Mailinglisten oder Websites wie Diskussionsforen, Wikis und ähnlichen kollaborativen Internetauftritten.'
        ]);
        Material::factory()->create([
            'name' => 'VIDEO-Lecture',
            //TODO Saubere Beschreibung -- 'description' => 'Ein Administrator (auch Sysop für system operator) ist eine spezielle Rolle eines Benutzers in Betriebssystemen, Netzwerken, Anwendungsprogrammen, Mailboxen, Mailinglisten oder Websites wie Diskussionsforen, Wikis und ähnlichen kollaborativen Internetauftritten.'
        ]);
        Material::factory()->create([
            'name' => 'Lösungsheft',
            //TODO Saubere Beschreibung -- 'description' => 'Ein Administrator (auch Sysop für system operator) ist eine spezielle Rolle eines Benutzers in Betriebssystemen, Netzwerken, Anwendungsprogrammen, Mailboxen, Mailinglisten oder Websites wie Diskussionsforen, Wikis und ähnlichen kollaborativen Internetauftritten.'
        ]);
        Material::factory()->create([
            'name' => 'myCampus‐Fragen',
            //TODO Saubere Beschreibung -- 'description' => 'Ein Administrator (auch Sysop für system operator) ist eine spezielle Rolle eines Benutzers in Betriebssystemen, Netzwerken, Anwendungsprogrammen, Mailboxen, Mailinglisten oder Websites wie Diskussionsforen, Wikis und ähnlichen kollaborativen Internetauftritten.'
        ]);
        Material::factory()->create([
            'name' => 'Tutorium',
            //TODO Saubere Beschreibung -- 'description' => 'Ein Administrator (auch Sysop für system operator) ist eine spezielle Rolle eines Benutzers in Betriebssystemen, Netzwerken, Anwendungsprogrammen, Mailboxen, Mailinglisten oder Websites wie Diskussionsforen, Wikis und ähnlichen kollaborativen Internetauftritten.'
        ]);
        Material::factory()->create([
            'name' => 'Präsentation',
            //TODO Saubere Beschreibung -- 'description' => 'Ein Administrator (auch Sysop für system operator) ist eine spezielle Rolle eines Benutzers in Betriebssystemen, Netzwerken, Anwendungsprogrammen, Mailboxen, Mailinglisten oder Websites wie Diskussionsforen, Wikis und ähnlichen kollaborativen Internetauftritten.'
        ]);
        Material::factory()->create([
            'name' => 'Literaturangabe',
            //TODO Saubere Beschreibung -- 'description' => 'Ein Administrator (auch Sysop für system operator) ist eine spezielle Rolle eines Benutzers in Betriebssystemen, Netzwerken, Anwendungsprogrammen, Mailboxen, Mailinglisten oder Websites wie Diskussionsforen, Wikis und ähnlichen kollaborativen Internetauftritten.'
        ]);

    }
}
