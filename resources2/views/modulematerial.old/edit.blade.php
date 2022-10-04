<x-layout>
    <div class="md:container md:mx-auto">
        <div class="flex px-5">
            <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                Editiere das Kursmaterial:
            </h1>
        </div>
        <div class="flex px-5">
            <h2 class="text-2xl font-bold uppercase">
                {{ $modulematerial->bezeichnung }}
            </h2>
        </div>
        <div class="flex px-5">
            <div class="w-full md:w-screen">
                <form method="POST" action="/modulematerial/{{ $modulematerial->id }}" enctype="multipart/form-data">
                    {{-- @csrf = Schutz vor unerlaubten Veränderungen! Angriffen von außen --}}
                    @csrf
                    @method('PUT') {{-- normalerweise würde man das über die method oben in der Form machen, doch Laravel kann mit dieser Art besser umgehen --}}


                    <div class="mb-6">
                        <label for="bezeichnung" class="inline-block text-lg mb-2">Kurzbezeichnung</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="bezeichnung"
                            placeholder="Beispiel: Projekt Software Engineering"
                            value="{{ $modulematerial->bezeichnung }}" />
                        @error('bezeichnung')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="beschreibung" class="inline-block text-lg mb-2">
                            Beschreibung
                        </label>
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="beschreibung" rows="10"
                            placeholder="Beschreibe zum Beispiel die Ziele, Anforderungen, Lerninhalte,... des Moduls">
                    {{ $modulematerial->beschreibung }}
                </textarea>
                    </div>

                    <div class="mb-6">
                        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                            Speichern
                        </button>

                        <a href="/" class="text-black ml-4"> Zurück </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
