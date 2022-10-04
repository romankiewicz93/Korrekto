<x-layout>
    <div class="md:container md:mx-auto">
        <div class="flex px-5">
            <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                BEARBEITE DAS TICKET
            </h1>
        </div>
        <div class="flex px-5">
            <div class="w-full md:w-screen">
                <form method="POST" action="/tickets/{{ $ticket->id }}" enctype="multipart/form-data">
                    {{-- @csrf = Schutz vor unerlaubten Veränderungen! Angriffen von außen --}}
                    @csrf
                    @method('PUT') {{-- normalerweise würde man das über die method oben in der Form machen, doch Laravel kann mit dieser Art besser umgehen --}}
                    <div class="mb-6" style="width:66%";>
                        <label for="title" class="inline-block text-lg mb-2">Modul</label>
                        <select
                            class="form-control
                        border border-white-200 rounded p-2 w-full
                        m-bot15"
                            name="module_id">
                            @if ($module->count() > 0)
                                @foreach ($module as $modul)
                                    @if ($modul->id == $ticket->module_id)
                                        <option selected value="{{ $modul->id }}">{{ $modul->kurskuerzel }} -
                                            {{ $modul->kurzbezeichnung }}</option>
                                    @else
                                        <option value="{{ $modul->id }}">{{ $modul->kurskuerzel }} -
                                            {{ $modul->kurzbezeichnung }}</option>
                                    @endif
                                @endForeach
                            @else
                                Keine Module angelegt
                            @endif
                        </select>
                    </div>
                    <div class="mb-6" style="width:66%">
                        <label for="title" class="inline-block text-lg mb-2">Kursmaterial</label>
                        <select
                            class="form-control
                        border border-white-200 rounded p-2 w-full
                        m-bot15"
                            name="materials_id">
                            @if ($materials->count() > 0)
                                @foreach ($materials as $material)
                                    @if ($material->id == $ticket->materials_id)
                                        <option selected value="{{ $material->id }}">{{ $material->name }}</option>
                                    @else
                                        <option value="{{ $material->id }}">{{ $material->name }}</option>
                                    @endif
                                @endForeach
                            @else
                                Keine Module angelegt
                            @endif
                        </select>
                    </div>
                    <div class="mb-6" style="width:66%">
                        <label for="kategory" class="inline-block text-lg mb-2">Kategorie</label>
                        <select
                            class="form-control
                        border border-white-200 rounded p-2 w-full
                        m-bot15"
                            name="kategory">
                            @foreach ($kategories as $kategory)
                                @if ($ticket->kategory == $kategory)
                                    <option selected value="{{ $kategory }}">{{ $kategory }}</option>
                                @else
                                    <option value="{{ $kategory }}">{{ $kategory }}</option>
                                @endif
                            @endForeach
                        </select>
                        @error('kategory')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6" style="width:66%">
                        <label for="priority" class="inline-block text-lg mb-2">Dringlichkeit</label>
                        <select
                            class="form-control
                        border border-white-200 rounded p-2 w-full
                        m-bot15"
                            name="priority">
                            @foreach ($priorities as $priority)
                                @if ($ticket->priority == $priority)
                                    <option selected value="{{ $priority }}">{{ $priority }}</option>
                                @else
                                    <option value="{{ $priority }}">{{ $priority }}</option>
                                @endif
                            @endForeach
                        </select>
                        @error('priority')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6" style="width:66%">
                        <label for="screenshot" class="inline-block text-lg mb-2">
                            Screenshot
                        </label>
                        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="screenshot" />
                        <img class="w-48 mr-6 mb-6"
                            src="{{ $ticket->screenshot ? asset('storage/' . $ticket->screenshot) : asset('')  }}"
                            alt="" />
                    </div>

                    <div class="mb-6" style="width:66%";>
                        <label for="description" class="inline-block text-lg mb-2">
                            Fehlerbeschreibung
                        </label>
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                            placeholder="Beschreibung des Fehlers">{{ $ticket->description }}</textarea>
                    </div>
                    <div class="mb-6" style="width:66%">
                        <label for="comment" class="inline-block text-lg mb-2">
                            Kommentar
                        </label>
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="comment" rows="10"  placeholder="Kommentar zur Korrektur, der Bearbeitung oder weiterführenden Aktionen">{{ $ticket->comment }}</textarea>
                    </div>

                    <div class="mb-6" style="width:66%">
                        <label for="status" class="inline-block text-lg mb-2">Status</label>
                        {{-- <input type="text" class="border border-gray-200 rounded p-2 w-full" name="status"
                            placeholder="Beispiel: offen, in Bearbeitung" value="{{ $ticket->status }}" /> --}}

                        <select
                            class="form-control
                        border border-white-200 rounded p-2 w-full
                        m-bot15"
                            name="status">
                            @foreach ($statuses as $status)
                                @if ($ticket->status == $status)
                                    <option selected value="{{ $status }}">{{ $status }}</option>
                                @else
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endif
                            @endForeach
                        </select>
                        @error('priority')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-6">
                        <a href="/"
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
