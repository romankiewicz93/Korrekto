<x-layout>
    <div class="md:container md:mx-auto">
        <div class="flex px-5">
            <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                DEIN KORREKTURAUFTRAG
            </h1>
        </div>

        <div class="flex px-5">
            <div class="w-full md:w-screen">
                <form action="/tickets" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6" style="width:66%";>
                        <label for="module_id" class="inline-block text-lg mb-2">Modul</label>
                        <select
                            class="form-control
                        border border-white-200 rounded p-2 w-full
                        m-bot15"
                            name="module_id">
                            @if ($module->count() > 0)
                                @foreach ($module as $modul)
                                    <option value="{{ $modul->id }}">{{ $modul->kurskuerzel }} -
                                        {{ $modul->kurzbezeichnung }}</option>
                                @endForeach
                            @else
                                Keine Module angelegt
                            @endif
                        </select>
                    </div>

                    <div class="mb-6" style="width:66%">
                        <label for="materials_id" class="inline-block text-lg mb-2">Kursmaterial</label>
                        <select
                            class="form-control
                        border border-white-200 rounded p-2 w-full
                        m-bot15"
                            name="materials_id">
                            @if ($materials->count() > 0)
                                @foreach ($materials as $material)
                                    <option value="{{ $material->id }}">{{ $material->name }}</option>
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
                                <option value="{{ $kategory }}">{{ $kategory }}</option>
                            @endForeach
                        </select>
                        @error('kategory')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6" style="width:66%";>
                        <label for="priority" class="inline-block text-lg mb-2">Dringlichkeit</label>
                        <select
                            class="form-control
                    border border-white-200 rounded p-2 w-full
                    m-bot15"
                            name="priority">
                            @foreach ($priorities as $priority)
                                <option value="{{ $priority }}">{{ $priority }}</option>
                            @endForeach
                        </select>
                        @error('priority')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6" style="width:66%";>
                        <label for="screenshot" class="inline-block text-lg mb-2">
                            Screenshot
                        </label>
                        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="screenshot" />
                        @error('screenshot')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6" style="width:66%";>
                        <label for="description" class="inline-block text-lg mb-2">
                            Fehlerbeschreibung
                        </label>
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                            placeholder="Beschreibe hier deinen Fehler">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black" type="submit">
                            Ticket einreichen
                        </button>
                        <a href="/" class="text-black ml-4"> Zurück </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
