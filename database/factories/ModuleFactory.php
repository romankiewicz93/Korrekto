<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        //ddd($this->getBeschreibung());
        $beschreibung = $this->getBeschreibung();
        $kurzbezeichnung = $this->faker->unique()->randomElement($this->getKurzBezeichnung());

        return [
            //'kurskuerzel' => $this->faker->toUpper( Str::random(4) ) ,
            //'kurskuerzel' => $this->faker->shuffle('IUBH'),
            //'kurzbezeichnung' => Str::random(25),
            //'kurzbezeichnung' =>$this->faker->jobTitle(),

            //'kurskuerzel' => $this->faker->unique()->toUpper(  $this->faker->word(6) ) ,
            //'kurskuerzel' => $this->faker->toUpper($this->faker->word(6)),
            //'kurskuerzel' => $this->faker->unique()->getKursKuerzel(), // Funktioniert leider nicht
            'kurskuerzel' => $this->getKursKuerzel(),
            'user_id' => 1,

            //'sprache' =>  'de',
            'kurzbezeichnung' => $kurzbezeichnung,
            //'beschreibung' => $this->faker->text(150),

            'beschreibung' => $beschreibung,
            //'tags' => $this->faker->word(),
            'tags' => $this->getTagsZusammengefuehrt($kurzbezeichnung, random_int(1, 3)),
            //'beginn_datum' => $this->faker->dateTimeInInterval('-5 years', '+3 years'),
            //'end_datum' => $this->faker->dateTimeInInterval('-1 week', '+8 years'),

        ];
    }

    public function getKursKuerzel()
    {
        return
            $this->faker->randomElement(['I', 'B', 'D']) .
            $this->faker->regexify('[A-Z]{3}');
    }


    public function getTagsZusammengefuehrt(string $kurzbezeichnung, int $anzahlTags)
    {

        $TagsCSV = $kurzbezeichnung . "," .
            $this->faker->randomElement($this->getTags()) . "," . $this->faker->randomElement($this->getTags());
        //        $TagsCSV += ;
        /*
        for ($i = 0; $i < $anzahlTags; $i++) {
            //$TagsCSV += ",";
            $TagsCSV += $this->faker->randomElement($this->getTags()).",";
        }*/

        return $TagsCSV;
    }
    public function getTags()
    {

        return [
            "IU",
            "Studium",
            "Informatik Studium",
            "Modul",
            "Mathematik Studium",
            "Module",
            "deutsch",
            "englisch",
        ];
    }

    public function getKurzBezeichnung()
    {
        return [
            'Einf??hrung in die Wirtschaftsinformatik',
            'Betriebswirtschaftslehre',
            'Einf??hrung in das wissenschaftliche Arbeiten',
            'Mathematik Grundlagen I',
            'Grundlagen der objektorientierten Programmierung mit Java',
            'Kollaboratives Arbeiten',
            'Investition und Finanzierung',
            'Datenstruktur und Java-Klassenbibliothek',
            'Statistik',
            'Datenmodellierung und Datenbanksysteme',
            'Einf??hrung in das Prozessmanagement',
            'Grundlagen der IT- und ERP-Systeme',
            'Programmierung von Web-Anwendungsoberfl??chen',
            'Programmierung von industriellen Informationssystemen mit Java EE',
            'Kosten- und Leistungsrechnung',
            'Interkulturelle und ethische Handlungskompetenzen',
            'Qualit??tssicherung im Softwareprozess',
            'Data Analytics und Big Data',
            'Einkauf, Beschaffung und Distribution',
            'IT-Recht',
            'IT-Projektmanagement',
            'Projekt Software Engineering',
            'Marketing',
            'Personal und Unternehmensf??hrung',
            'Seminar "Software Engineering"',
            'Digitale Business-Modelle',
            'Organizational Behavior',
            'Agile Software Engineering',
            'Mobile Software Engineering',
            'IT-Service Management',
            'Business Intelligence',
            'Software Engineering with Python',
            'User Interface Design',
            'Machine Learning',
            'Augmented, Mixed und Virtual Reality',
            'IT-Sicherheit',
            'Data Engineer',
            'Salesforce Platform Development',
            'International Management',
            'Advanced Leadership',
            'Angewandter Vertrieb',
            'Supply Chain Management',
            'Social-Media-Marketing und Analytics',
            'Globale Technologien und Prozesse',
            'Business Consulting',
            'Smart Services',
            'Smart Factory',
            'Organisationsentwicklung und Change Management',
            'E-Learning',
            'E-Commerce',
            'Industrie 4.0',
            'Digital Media - Plattformen und Workflows',
            'IT-Service Management',
            'User Interface Design',
            'Machine Learning',
            'IT-Sicherheit',
            'Smart Factory',
            'No-Frills Software Engineering',
            'Mobile Software Engineering',
            'Software Engineering with Python',
            'Augmented, Mixed und Virtual Reality',
            'Salesforce Platform Development',
            'International Management',
            'Social Media Marketing und Analytics',
            'Supply Chain Management',
            'Globale Technologien und Prozesse',
            'Organisationsentwicklung und Change',
            'Digital Media - Plattformen und Workflows',
            'Smart Services',
            'Apple Mobile Solution Development',
            'Studium Generale',
            'Algorithmik und Logik'

        ];
    }

    public function getBeschreibung()
    {
        $index = rand(0, 11);
        $beschreibungen = array(
            "Viele praktische Konzepte in IT und Technik basieren auf den Erkenntnissen der diskreten
Mathematik. F??r ein tief gehendes Verst??ndnis, z. B. von Datenstrukturen, Aufbau von
Kommunikationsnetzen oder der L??sung von algorithmischen Problemen, ist ein grundlegendes
Verst??ndnis der mathematischen Hintergr??nde notwendig. Daher werden in diesem Kurs Begriffe
und Konzepte der diskreten Mathematik eingef??hrt und dann spezielle Bereiche der Zahlentheorie
herausgegriffen und vermittelt.",
            "Die Anwendung guter wissenschaftlicher Praxis geh??rt zu den akademischen Basisqualifikationen,
die im Verlaufe eines Studiums erworben werden sollten. In diesem Kurs geht es um die
Unterscheidung zwischen Alltagswissen und Wissenschaft. Daf??r ist ein tieferes
wissenschaftstheoretisches Verst??ndnis ebenso notwendig, wie das Kennenlernen grundlegender
Forschungsmethoden und -instrumente zum Verfassen wissenschaftlicher Texte. Die Studierenden
erhalten daher erste Einblicke in die Thematik und werden an Grundlagenwissen herangef??hrt,
dass ihnen zuk??nftig beim Erstellen wissenschaftlicher Arbeiten hilft. Dar??ber hinaus erhalten die
Studierenden einen ??berblick ??ber die unterschiedlichen IU Pr??fungsformen und einen Einblick in
deren Anforderungen und Umsetzung.",
            "Der Kurs BWL I setzt sich mit den Grundlagen und Grundbegriffen der Allgemeinen
Betriebswirtschaftslehre auseinander. Er vermittelt den Studierenden einen ??berblick ??ber die
unterschiedlichen Funktionsbereiche eines Betriebs und schafft damit ein Grundverst??ndnis zu
den grunds??tzlichen Fragen des Wirtschaftens in Unternehmen. Mit dem erfolgreichen Abschluss
des Kurses verf??gen die Studierenden ??ber das Basiswissen, um darauf aufbauend das
betriebswirtschaftliche Spezialwissen im weiteren Verlauf des Studiums zu erwerben.",
            "Ziel des Kurses ist es, den Studierenden einen Einblick in die technischen und theoretischen
Grundlagen des Software Engineering zu vermitteln. Neben dem generellen Aufbau von
Rechnersystemen werden den Studierenden typische Herausforderungen bei der Entwicklung
industrieller Informationssysteme vermittelt. Dar??ber hinaus wird dargestellt, mit welchen
typischen Phasen und Aktivit??ten im Software Engineering diese Risiken gezielt adressiert werden.",
            "Ob Soziale Arbeit, Marketing, Management oder Pflegeberufe ??? der digitale Wandel als Megatrend
bestimmt einen tiefgreifenden Wandel, der jeden Einzelnen und alle Ebenen der Gesellschaft
betrifft. In diesem Kurs geht es darum, die Ursachen des Wandels und den Wandel als solches mit
seinen Auswirkungen zu verstehen. Aus diesem Verst??ndnis heraus werden F??higkeiten ??? Digital
Skills ??? entwickelt, mit der Digitalisierung in verschiedenen (beruflichen) Kontexten umgehen zu
k??nnen. Grundlegend werden Aspekten der digitalen Transformation und digitalen Kommunikation
er??rtert und dargestellt, wie sich Wirtschaft, Gesellschaft und Kommunikation ver??ndert haben
und ver??ndern. Das betrifft unter anderem die Arbeit und Zusammenarbeit. Methoden wie Design
Thinking, Tools wie Slack oder Content Management Systeme wie WordPress haben
interdisziplin??re Relevanz. Social Media und Mobile sind fester Bestandteil des Alltags, pr??gen die
(Medien-)Sozialisation und das digitale Marketing. Unter dem Aspekt ???Digital im Unternehmen???
werden ausgew??hlte Szenarien betrachtet, wie zum Beispiel Digital HR oder Digital und Sozial. Ein
grundlegendes Verst??ndnis f??r digitale Technologien wie Cloud Computing oder Big Data ist
essenziell, um digitale Prozesse begleiten und Steuern sowie Trends wie Quantencomputing
beurteilen zu k??nnen.",
            "Betriebliche Informationssysteme werden in der Regel objektorientiert geplant und programmiert.
Daher werden in diesem Kurs grundlegende Kompetenzen der objektorientierten Programmierung
vermittelt. Dabei werden die theoretischen Konzepte unmittelbar anhand der Programmiersprache
Java gezeigt und ge??bt.",
            "In diesem Kurs werden die Kenntnisse der objektorientierten Programmierung vertieft. Dabei
werden insbesondere Datenstrukturen, deren Anwendungsf??lle und deren Umsetzung in der
Sprache Java betrachtet. Dar??ber hinaus werden Strategien und Szenarien von Objektvergleichen,
die Verwendung von Funktionen des Datentyps ???String???, der Einsatz von Kalenderobjekten sowie
der Einsatz von Streams vermittelt.",
            "Ziel des Kurses ist es, den Studierenden einen Einblick in die technischen und theoretischen
Grundlagen des Internet of Things (IoT) und dessen Anwendungsgebiete zu bieten. Neben dem
generellen Aufbau von IoT-Systemen und der darin eingesetzten Technologiestandards wird den
Studenten auch die Bedeutung des Internet of Things f??r Wirtschaft und Gesellschaft vermittelt.
Dar??ber hinaus wird dargestellt, auf welche Weise Daten im IoT ausgetauscht, gespeichert und
verarbeitet werden.",
            "Dieser Kurs f??hrt die im Modul ???Mathematik Grundlagen I??? begonnene Einf??hrung in Themen der
diskreten Mathematik fort. In diesem Kurs werden die Konzepte der linearen Algebra eingef??hrt
und anschlie??end das Thema Graphen und Algorithmen f??r Graphen vertieft. Dabei werden
typische Fragestellungen der angewandten Informatik heraus gegriffen und gezeigt, wie sie mit
Graphen gel??st werden k??nnen.",
            "Auf Basis der im Modul ???Objektorientierte Programmierung??? vermittelten Kenntnisse vermittelt
dieses Modul Kenntnisse und Erfahrungen im Aufbau und der Erstellung von webbasierten
betrieblichen Informationssystemen. Dabei lernen die Studierenden die verschiedenen
Architekturschichten eines Informationssystems (Oberfl??che, Gesch??ftslogik, Datenschicht)
anhand eines typischen Java-Technologie-Stacks kennen. Neben dem allgemeinen Aufbau von
Web-Anwendungen steht in diesem Kurs die Erstellung von Web-Oberfl??chen im Vordergrund: Die
Studierenden lernen, wie die Web-Anwendungsoberfl??chen von IT-Systemen gebaut werden und
welche Technologien dabei typischerweise zum Einsatz kommen.",
            "In diesem Kurs die Gesch??ftslogik und die Datenbankanbindung von Web-Anwendungen im
Fokus.Zun??chst werden einfache Web-Oberfl??chen um Funktionen zu Validierung und
Konvertierung von Eingaben erweitert und Fehlermeldungen erstellt. Anschlie??end werden
Konzepte zur Umsetzung von Navigationsstrukturen vermittelt.Als letzte Schicht von Web-
Anwendungen werden Konzepte und Technologien zur Anbindung an Datenbanksystemen
vorgestellt und angewandt.",
            "Die fr??hen Phasen der Softwareentwicklung sind ma??geblich davon gekennzeichnet, dass
fachliche und technische Anforderungen (Requirements) an das IT-System zu ermitteln sind. Die
Anforderungsermittlung muss ??u??erst umsichtig betrieben werden, weil alle folgenden Aktivit??ten
im SW-Entwicklungsprozess auf der Grundlage der dokumentierten Anforderungen geplant und
durchgef??hrt werden. In diesem Kurs werden Vorgehensweisen, Methoden und Modelle vermittelt,
die eine strukturierte und methodische Ermittlung und Dokumentation von Anforderungen an
betriebliche Informationssysteme erm??glichen."
        );

        return $beschreibungen[$index];
    }
}
