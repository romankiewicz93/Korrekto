<x-layout>
    <div class="md:container md:mx-auto">
        <div class="flex px-5">
            <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                Editiere das Kursmaterial
            </h1>
        </div>
        <div class="flex px-5">
            <h2 class="text-2xl font-bold uppercase">
                {{ $material->name }}
            </h2>
        </div>
        <div class="flex px-5">
            <div class="w-full md:w-screen">
                <form method="POST" action="/material/{{ $material->id }}" enctype="multipart/form-data">
                    {{-- @csrf = Schutz vor unerlaubten Veränderungen! Angriffen von außen --}}
                    @csrf
                    @method('PUT') {{-- normalerweise würde man das über die method oben in der Form machen, doch Laravel kann mit dieser Art besser umgehen --}}


                    <div class="mb-6">
                        <label for="name" class="inline-block text-lg mb-2">Kurzbezeichnung</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                            placeholder="Beispiel: Projekt Software Engineering"
                            value="{{ $material->name }}" />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="description" class="inline-block text-lg mb-2">
                            Beschreibung
                        </label>
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                            placeholder="Beschreibe zum Beispiel die Ziele, Anforderungen, Lerninhalte,... des Moduls">
                    {{ $material->description }}
                </textarea>
                    </div>

                    <div class="mb-6">
                        <a href="/materials"
                            class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow mr-4">
                            <i class="fa-solid fa-arrow-left"></i> Zurück </a>
                        <button
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-500 rounded">
                            <i class="fa fa-save"> </i> Speichern </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
