<x-layout>
    @unless(count($tickets) == 0)
        <div class="lg:grid gap-4 space-y-4 md:space-y-0 mx-4">

            <!-- component -->
            <div class="text-gray-900 bg-white">
                <div class="flex flex-col justify-between">
                    @can('show-module-tickets')
                        <div class="p-4 flex">
                            <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                                ZUGEWIESENE TICKETS
                            </h1>
                        </div>
                        <div class="p-1 flex">
                            <h1 class="text-1xl font-bold">
                                Die folgendenden Korrekturen wurden dir aufgrund deiner Module zugewiesen und sollten bearbeitet werden.
                            </h1>
                        </div>
                    @endcan
                    @can('show-no-module-tickets')
                        <div class="p-4 flex">
                            <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                                DEINE ERSTELLTEN TICKETS
                            </h1>
                        </div>
                        <div class="p-1 flex">
                            <h1 class="text-1xl font-bold">
                                Die folgendenden Korrekturen wurden von dir erstellt und bereits dem Tutor mitgeteilt. Über
                                den Button [Auge] kannst du näheres über den Status erfahren.
                            </h1>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
        @include('partials._search_own_tickets')
        <div class="px-3 py-4 flex justify-center">
            <table class="w-full text-md bg-white shadow-md rounded mb-4">
                <thead class="block md:table-header-group">
                    <tr
                        class="border border-gray-800 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                        <th
                            class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            ID</th>
                        <th
                            class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Problembeschreibung</th>
                        <th
                            class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Priorität</th>
                        {{-- <th
                                class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Material</th> --}}
                        <th
                            class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Status</th>
                        <th
                            class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Erstellt am</th>
                        <th
                            class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            letzte Aktualisierung</th>
                        <th
                            class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($tickets as $ticket)
                        <tr class="hover:bg-cyan-100 even:bg-white odd:bg-gray-100 md:border-none block md:table-row">
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                {{ $ticket->id }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                {{ $ticket->description }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <x-tickets-own-tags :tagsCsv="$ticket->priority"></x-tickets-own-tags>
                            </td>
                            {{-- @if (!empty($ticket->materials_name))
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        {{ $ticket->materials_name }}
                                    </td>
                                @else
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        {{ $ticket->materials_id }}
                                    </td>
                                @endif --}}

                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <x-tickets-own-tags :tagsCsv="$ticket->status"></x-tickets-own-tags>
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                {{ $ticket->created_at }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                {{ $ticket->updated_at }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <div class="">
                                    <a href="/tickets/{{ $ticket->id }}">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded text-center">
                                            <i class="fa-solid fa-eye"> </i> </button>
                                    </a>
                                </div>
                                <div class="py-1">
                                    <a href="/tickets/{{ $ticket->id }}/edit">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                                            <i class="fa-solid fa-pencil"> </i> </button>
                                    </a>
                                </div>
                                <div class="">
                                    <form method="POST" action="/tickets/{{ $ticket->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded"><i
                                                class="fa-solid fa-trash"></i> </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="m-6 p-4">
                {{ $tickets->links() }}
            </div> --}}
        </div>
    @else
        <div class="lg:grid gap-40 space-y-1000 md:space-y-1000 mx-4">

            <div class="text-gray-900 bg-white">
                <div class="py-4 flex">
                    <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                        Ticket-Management
                    </h1>
                </div>
                <div class="py-2 flex">
                    <h2 class="text-4xl">
                        Herzlich Willkommen!
                    </h2>
                </div>
                <div class="flex">
                    <h2 class="text-4xl">
                        Aktuell sind keine Korrekturen erfasst!
                    </h2>
                </div>
                <div class="py-4 flex">
                    <h3 class="text-2xl">
                        Falls ihnen zum Kursmaterial etwas aufgefallen erstellen Sie einfach ein Ticket über den Button!
                    </h3>
                </div>
                <div class="py-1 flex flex-col text-center">
                    <a href="/tickets/create" {{-- class="inline-block border-2 border-black text-black py-2 px-4 rounded-xl uppercase mt-2 hover:text-cyan-300 hover:border-cyan-300">Jetzt Ticket erstellen</a> --}}
                        class="bg-black text-white font-bold rounded py-2 px-4 hover:bg-cyan-300 uppercase">Jetzt Ticket
                        erstellen</a>
                </div>
                <div class="py-2 flex">
                    <img id="No-Data" src="{{ asset('images/File_searching_amico.svg') }}">
                    {{-- https://storyset.com/illustration/file-searching/amico
                        Free for personal and commercial purpose --}}
                </div>
            </div>
        </div>
    @endunless
</x-layout>
