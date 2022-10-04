<x-layout>
    <!-- UNLESS Wenn nicht zutreffend -->
    @unless(count($materials) == 0)
        <div class="lg:grid gap-4 space-y-4 md:space-y-0 mx-4">

            <!-- component -->
            <div class="text-gray-900 bg-white">
                <div class="flex flex-row justify-between">
                    <div class="p-4 flex">
                        <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                            Kursmaterialien
                        </h1>
                    </div>
                    <div class="p-4 flex">
                        <button
                            class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-blue-700 hover:border-blue-500 rounded">
                            <a href="/material/create">
                                <i class="fa-solid fa-plus"></i>
                                Neu </a>
                        </button>
                    </div>
                </div>
                @include('partials._search_materials')
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
                                    Bezeichnung</th>
                                <th
                                    class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Beschreibung</th>
                                <th
                                    class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Erstellt am</th>
                                <th
                                    class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Zuletzt aktualisiert</th>
                                <th
                                    class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="block md:table-row-group table-striped">
                            @foreach ($materials as $material)
                                <tr
                                    class="hover:bg-cyan-100 even:bg-white odd:bg-gray-100 md:border-none block md:table-row">

                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><a
                                            href="/material/{{ $material->id }}">{{ $material->id }}</a></td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><a
                                            href="/material/{{ $material->id }}">{{ $material->name }} </a></td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><a
                                            href="/material/{{ $material->id }}">{{ $material->description }} </a></td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        {{ $material->created_at }}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        {{ $material->updated_at }}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        <a href="/material/{{ $material->id }}/edit">
                                            <button
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                                                <i class="fa-solid fa-pencil"> </i> </button>
                                        </a>
                                        <form method="POST" action="/material/{{ $material->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded"><i
                                                    class="fa-solid fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="m-6 p-4">
                {{ $materials->links() }}
            </div>

        </div>
    @else
        <div class="lg:grid gap-40 space-y-1000 md:space-y-1000 mx-4">

            <div class="text-gray-900 bg-white">
                <div class="p-4 flex">
                    <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                        Kursmaterialien
                    </h1>
                </div>
                <div class="p-4 flex">
                    <h2 class="text-4xl">
                        Aktuell sind hierzu leider keine Daten vorhanden!
                    </h2>
                </div>
                <div class="p-4 flex">
                    <h3 class="text-2xl">
                        Bitte legen Sie zuerst über den Button |+ Neu| Daten an!
                    </h3>
                </div>

                <div class="p-4 flex">
                    <button
                        class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-blue-700 hover:border-blue-500 rounded">
                        <a href="/materials/create">
                            <i class="fa-solid fa-plus"></i>
                            Neu </a>
                    </button>
                </div>

                <div class="p-4 flex">
                    <img id="No-Data" src="{{ asset('images/File_searching_amico.svg') }}">
                </div>
            </div>
        </div>
    @endunless
</x-layout>
