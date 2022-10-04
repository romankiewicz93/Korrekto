<x-layout>

    <div class="lg:grid gap-4 space-y-4 md:space-y-0 mx-4">

        <!-- component -->
        <div class="text-gray-900 bg-white">
            <div class="flex flex-row justify-between">
                <div class="p-4 flex">
                    <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                        {{ $title }}
                    </h1>
                </div>
            </div>
        </div>
        @include('partials._search_tickets')
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
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @unless($tickets->isEmpty())
                        @foreach ($tickets as $ticket)
                            <tr class="hover:bg-cyan-100 even:bg-white odd:bg-gray-100 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    {{ $ticket->id }}
                                </td>

                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    {{ $ticket->description }}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    {{-- {{ $ticket->priority }} --}}
                                    <x-tickets-tags :tagsCsv="$ticket->priority"></x-tickets-tags>
                                </td>
                                {{-- <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    {{ $ticket->materials_id }}
                                </td> --}}
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    {{-- {{ $ticket->status }} --}}
                                    <x-tickets-tags :tagsCsv="$ticket->status"></x-tickets-tags>
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <a href="/tickets/{{ $ticket->id }}">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded text-center">
                                            <i class="fa-solid fa-eye"> </i> </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <p class="text-center">Keine Tickets gefunden</p>
                            </td>
                        </tr>
                    @endunless
            </table>
        </div>
</x-layout>
