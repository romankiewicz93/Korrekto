<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Ticket;
use App\Mail\NewTicket;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Echo_;

class TicketController extends Controller
{

    public $kategories  = array(
        "fehler" => "Fehler",
        "ergaenzung" => "Ergänzung",
        "verbesserungsvorschlag" => "Verbesserungsvorschlag",
    );
    public $priorities = array(
        "niedrig" => "Niedrig",
        "mittel" => "Mittel",
        "hoch" => "Hoch",
    );

    public $statuses = array(
        "offen" => "Offen",
        "bearbeitung" => 'In Bearbeitung',
        "abgeschlossen" => "Abgeschlossen",
    );

    //Show Create ticket Form
    public function create()
    {

        $module = Module::all();
        $materials = Material::all();

        return view('tickets.create', [
            'module' => $module,
            'materials' => $materials,
            'priorities' => $this->priorities,
            'kategories' => $this->kategories,
            'statuses' => $this->statuses
        ]);
    }



    //Store Ticket Data
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'module_id' => 'required',
            'materials_id' => 'required',
            'kategory' => 'required',
            'priority' => 'required',
            'description' => 'required',
        ]);

        $formFields['status'] = 'offen';
        $formFields['comment'] = '';

        if ($request->hasFile('screenshot')) {
            $formFields['screenshot'] = $request->file('screenshot')->store('screenshot', 'public');
        }

        $formFields['user_id'] = auth()->id();

        //dd($formFields);
        Ticket::create($formFields);
        $mailData = [
            'modul' => $request->modul,
            'priority' => $request->priority
        ];
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NewTicket($mailData));
        return redirect('/')->with('success', 'Ticket wurde erstellt');
    }
    //SendMail
    public function sendMail(Request $request)
    {
        try {
            $mailData = [
                'modul' => $request->modul,
                'priority' => $request->priority
            ];
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NewTicket($mailData));

            return redirect()->back()->with('success', 'Email sent successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Email sent failed');
        }
    }

    // Show all Tickets
    public function index()
    {
        $tickets = Ticket::latest()->filter(request(['tag', 'search']));
        $user = auth()->user();
        if ($user->role_id != 1) {
            $tickets = $tickets->where('user_id', $user->id);
        }
        return view('tickets.index', [
            'tickets' => $tickets->paginate(25),
            'title' => 'ALLE TICKETS'
        ]);
    }

    public function manageuserfilter()
    {
        $user_id = auth()->id();

        return view('tickets.index', [
            'tickets' => Ticket::latest()
            ->where('user_id', $user_id)
            ->filter(request(['tag', 'search']))->paginate(25),
            'title' => 'DEINE ERSTELLTEN TICKETS'
        ]);
    }

    //Show single Ticket
    public function show(Ticket $ticket)
    {

        $module = Module::where('id', $ticket->module_id)->first();
        $material = Material::where('id', $ticket->materials_id)->first();
        $user = User::where('id', $ticket->user_id)->first();

        return view('tickets.show', [
            'ticket' => $ticket,
            'module' => $module,
            'material' => $material,
            'user' => $user,
        ]);
    }



    //Show Edit Ticket Controller
    public function edit(Ticket $ticket)
    {

        $module = Module::all();
        $materials = Material::all();


        // dd($priorities);

        return view('tickets.edit', [
            'ticket' => $ticket,
            'module' => $module,
            'materials' => $materials,
            'priorities' => $this->priorities,
            'kategories' => $this->kategories,
            'statuses' => $this->statuses
        ]);
    }

    //Update Ticket Data
    public function update(Request $request, Ticket $ticket)
    {


        //  dd($request);
        // dd($ticket);

        $formFields = $request->validate(
            [
                'module_id' => 'required',
                'materials_id' => 'required',
                'kategory' => 'required',
                'priority' => 'required',
                'description' => 'required',
                'status' => 'required',
                'comment' => 'required',
            ]
        );

        // -- TODO: müsste auf Screenshot umgebaut werden ---
        if ($request->hasFile('screenshot')) {
            $formFields['screenshot'] = $request->file('screenshot')->store('screenshot', 'public');
        }

        //dd($formFields);
        //dd($request);

        $ticket->update($formFields);
        // return redirect('/')->with('success', 'Kursmaterial wurde erfolgreich aktualisiert');
        return redirect('/tickets/manage')->with('success', 'Kursmaterial wurde erfolgreich aktualisiert');
    }

    // Delete Ticket
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect('/')->with('message', 'Ticket wurde gelöscht');
    }

    // Nur EIGENE Zugewiesene Tickets anzeigen
    public function manage()
    {
        // return 'hello world';
        // return auth()->user()->can('dashboard-student');



        // --- FUNKTIONIERT ---
        //  return view('tickets.index', [

        // 'tickets' => auth()->user()->tutortickets()
        // // 'tickets' => Ticket::latest()->filter(request(['tag', 'search']))->paginate(25)
        //  ]);

        //$tickets =  auth()->user()->tutortickets();
        $tickets = auth()->user()->tickets()->get();

        if (Gate::allows('dashboard-student',  $tickets)) {
            return view('tickets.manage', [
                'tickets' =>  $tickets
            ]);
        }

        $tickets =  auth()->user()->tutortickets()->get();
        if (Gate::allows('dashboard-tutor',  $tickets)) {
            return view('tickets.manage', [
                'tickets' =>  $tickets
                // 'tickets' => Ticket::latest()->filter(request(['tag', 'search']))->paginate(25)
            ]);
        }

        //TODO - Dashboard für Admin mit Users usw.
        if ($this->authorize('dashboard-admin')) {
            return view('tickets.index', [
                // 'tickets' => Ticket::latest()->filter(request(['tag', 'search']))->paginate(25)
                'tickets' => Ticket::latest()->filter(request(['tag', 'search']))->paginate(25)
            ]);
        }
    }
}
