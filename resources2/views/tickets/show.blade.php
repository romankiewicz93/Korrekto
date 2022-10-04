<x-layout>

    <div class="mx-4 p-2">
        <a href="/tickets/manage">
            <button
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                <i class="fa-solid fa-arrow-left"></i> Zurück </button>
            </button>
        </a>
    </div>

    <div class="flex flex-col ">
        <div class="flex px-5">
            <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                Ticket
            </h1>
        </div>
        <div class="flex p-4">
            <h2 class="text-2xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                Informationen
            </h2>
        </div>
        <div class="flex p-5 ">
            <h3 class="text-2xl mb-2"> {{ $ticket['description'] }}
            </h3>
        </div>
        <div class="flex px-5">
            <div class="text-xl font-bold mb-4">Ersteller: </div>
            <div class="text-xl pr-2 pl-2 mb-4">{{ $user['title'] }} {{ $user['firstName'] }} {{ $user['lastName'] }}
            </div>
        </div>
        <div class="flex px-5">
            <div class="text-xl font-bold mb-4">Erstellt am: </div>
            <div class="text-xl pr-2 pl-2 mb-4">{{ $user['created_at'] }}
            </div>
        </div>
        <div class="flex px-5">
            <div class="text-xl font-bold mb-4">Dringlichkeit: </div>
            <div class="text-xl pr-2 pl-2 mb-4">{{ $ticket['priority'] }}</div>
        </div>
        <div class="flex px-5">
            <div class="text-xl font-bold mb-4">Modul: </div>
            <div class="text-xl pr-2 pl-2 mb-4">{{ $module->kurskuerzel }} - {{ $module->kurzbezeichnung }} </div>
        </div>
        <div class="flex px-5">
            <div class="text-xl font-bold mb-4">Kursmaterial: </div>
            <div class="text-xl pr-2 pl-2 mb-4">{{ $material->name }}</div>
        </div>
        <div class="flex px-5">
            <div class="text-xl font-bold mb-4">Kategorie: </div>
            <div class="text-xl pr-2 pl-2 mb-4">{{ $ticket['kategory'] }}</div>
        </div>
        <div class="flex px-5">
            <div class="text-xl font-bold mb-4">Screenshot von Fehler: </div>
        </div>
        <div class="flex px-5">
            <img class="w-48 mr-6 mb-6"
                src="{{ $ticket->screenshot ? asset('storage/' . $ticket->screenshot) : asset('') }}"
                alt="" />
        </div>
        <div class="flex p-4">
            <h2 class="text-2xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                Status
            </h2>
        </div>
        <div class="flex px-5">
            <div class="text-xl font-bold mb-4">Aktueller Status: </div>
            <div class="text-xl pr-2 pl-2 mb-4">{{ $ticket['status'] }}</div>
        </div>
        <div class="flex px-5">
            <div class="text-xl font-bold mb-4">Kommentar: </div>
            <div class="text-xl pr-2 pl-2 mb-4">{{ $ticket['comment'] }}</div>
        </div>
        <div class="flex px-5">
            <div class="text-xl font-bold mb-4">Letzte Änderung am: </div>
            <div class="text-xl pr-2 pl-2 mb-4">{{ $user['updated_at'] }}
            </div>
        </div>

    </div>

    <x-card class="mt-4 p-2 flex space-x-6">
        @can('edit-all-tickets')
            <a href="/tickets/{{ $ticket->id }}/edit">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                    <i class="fa-solid fa-pencil p-2"> </i>Bearbeiten </button>
            </a>
        @endcan
        @can('destroy-all-tickets')
            <form method="POST" action="/tickets/{{ $ticket->id }}">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded"><i
                        class="fa-solid fa-trash p-2"></i>Löschen </button>
            </form>
        @endcan
    </x-card>
    </div>
</x-layout>
