<x-layout>
    <div class="md:container md:mx-auto">
        <div class="flex px-5">
            <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                Neuanlage: Kursmaterial
            </h1>
        </div>
        <div class="flex px-5">
            <div class="w-full md:w-screen">

                <form method="POST" action="/modulematerials" enctype="multipart/form-data">
                    {{-- @csrf = Schutz vor unerlaubten Veränderungen! Angriffen von außen --}}
                    @csrf
                    <div class="mb-6">
                        <label for="bezeichnung" class="inline-block text-lg mb-2">Bezeichnung</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="bezeichnung"
                            placeholder="Beispiel: ISEF" value="{{ old('bezeichnung') }}">
                        @error('bezeichnung')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="beschreibung" class="inline-block text-lg mb-2">
                            Beschreibung
                        </label>
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="beschreibung" rows="10"
                            placeholder="Beschreibe zum Beispiel den Zweck des Kursmaterialien, oder welche Form dieser haben wird Schriftform, AUDIO-Material, VIDEO-Material"
                            value="{{ old('beschreibung') }}"></textarea>
                    </div>

                    <div class="mb-6">

                        <div class="inline-flex">

                            <button
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded">
                            <i class="fa-solid fa-pencil"> </i> Speichern </button>

                            <a href="/modulematerials">
                                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    <i class="fa-solid fa-arrow-left"></i> Zurück </button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
