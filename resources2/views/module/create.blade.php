<x-layout>
    <div class="md:container md:mx-auto">
        <div class="flex px-5">
            <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                Neuanlage: Modul
            </h1>
        </div>
        <div class="flex px-5">
            <div class="w-full md:w-screen">
                <form method="POST" action="/module" enctype="multipart/form-data">
                    {{-- @csrf = Schutz vor unerlaubten Veränderungen! Angriffen von außen --}}
                    @csrf
                    <div class="mb-6" style="width:66%">
                        <label for="kurskuerzel" class="inline-block text-lg mb-2">Kurskürzel</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="kurskuerzel"
                            placeholder="Beispiel: ISEF" value="{{ old('kurskuerzel') }}">
                        @error('kurskuerzel')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6" style="width:66%">
                        <label for="kurzbezeichnung" class="inline-block text-lg mb-2">Kurzbezeichnung</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="kurzbezeichnung"
                            placeholder="Beispiel: Projekt Software Engineering" value="{{ old('kurzbezeichnung') }}" />
                        @error('kurzbezeichnung')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6" style="width:66%">
                        <label for="tags" class="inline-block text-lg mb-2">
                            Tags (Komma Seperiert)
                        </label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                            placeholder="Beispiel: Modul, IU, WI, Projektarbeit, Seminararbeit, deutsch"
                            value="{{ old('tags') }}" />
                    </div>

                    <div class="mb-6" style="width:66%">
                        <label for="user_id" class="inline-block text-lg mb-2">Tutor</label>
                        <select
                            class="form-control
                    border border-white-200 rounded p-2 w-full
                    m-bot15"
                            name="user_id">

                            @if ($tutors->count() > 0)
                                @foreach ($tutors as $tutor)
                                    <option value="{{ $tutor->id }}">{{ $tutor->firstName }} {{ $tutor->lastName }}</option>
                                @endForeach
                            @else
                                Keine Tutoren vorhanden
                            @endif
                        </select>
                        @error('user_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    {{-- <div class="mb-6">
                <select class="form-control m-bot15" name="role_id">
                    @if ($modulematerials->count() > 0)
                        @foreach ($modulematerials as $modulematerial)
                            <option value="{{ $modulematerial->id }}">{{ $modulematerial->bezeichnung }}</option>
                        @endForeach
                    @else
                        Keine Kursmaterialien angelegt
                    @endif
                </select>
            </div> --}}

                    {{-- <div class="mb-6">
                        <label for="modulematerial" class="inline-block text-lg mb-2">
                            Kursmaterial
                        </label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="modulematerial"
                            placeholder="In welchem Kursmaterial trat der Fehler auf?"
                            value="{{ old('modulematerial') }}" />
                    </div> --}}


                    {{-- <div class="mb-6">
                        <label for="logo" class="inline-block text-lg mb-2">
                            Modulbild
                        </label>
                        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
                    </div> --}}

                    <div class="mb-6" style="width:66%">
                        <label for="beschreibung" class="inline-block text-lg mb-2">
                            Beschreibung
                        </label>
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="beschreibung" rows="10"
                            placeholder="Beschreibe zum Beispiel die Ziele, Anforderungen, Lerninhalte,... des Moduls"
                            value="{{ old('beschreibung') }}"></textarea>
                    </div>

                    <div class="mb-6" >
                        <a href="/modules"
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
