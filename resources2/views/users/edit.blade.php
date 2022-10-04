<x-layout>
    <div class="md:container md:mx-auto">
        <div class="flex px-5">
            <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                Benutzerprofil
            </h1>
        </div>
        <div class="flex px-5">
            <h2 class="text-2xl font-bold uppercase">
                {{ $user['title'] }} {{ $user['firstName'] }} {{ $user['lastName'] }}
            </h2>
        </div>
        <div class="flex px-5">
            <div class="w-full md:w-screen">
                <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
                    {{-- @csrf = Schutz vor unerlaubten Veränderungen! Angriffen von außen --}}
                    @csrf
                    @method('PUT') {{-- normalerweise würde man das über die method oben in der Form machen, doch Laravel kann mit dieser Art besser umgehen --}}

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="title" class="inline-block text-lg mb-2">Titel</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                                placeholder="Herr Prof. Dr. med." value="{{ $user->title }}">
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="title" class="inline-block text-lg mb-2">Rolle</label>
                            <select
                                class="form-control
                            border border-white-200 rounded p-2 w-full
                            m-bot15"
                                name="role_id">
                                @if ($roles->count() > 0)
                                    @foreach ($roles as $role)
                                        @if ($role->id == $user->role_id)
                                            <option selected value="{{ $role->id }}">{{ $role->name }}</option>
                                        @else
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endif
                                    @endForeach
                                @else
                                    Keine Rollen angelegt
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="firstName" class="inline-block text-lg mb-2">Vorname *</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="firstName"
                                placeholder="Max" value="{{ $user->firstName }}">
                            @error('firstName')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label for="lastName" class="inline-block text-lg mb-2">Nachname *</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="lastName"
                                placeholder="Mustermann" value="{{ $user->lastName }}">
                            @error('lastName')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label for="country" class="inline-block text-lg mb-2">Land</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="country"
                                placeholder="Deutschland" value="{{ $user->country }}">
                            @error('country')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label for="city" class="inline-block text-lg mb-2">Ort</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="city"
                                placeholder="Berlin" value="{{ $user->city }}">
                            @error('city')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label for="postcode" class="inline-block text-lg mb-2">Postleitzahl</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="postcode"
                                placeholder="94333" value="{{ $user->postcode }}">
                            @error('postcode')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label for="streetName" class="inline-block text-lg mb-2">Straßenname, Hausnummer,
                                Zusatz</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="streetName"
                                placeholder="Musterstraße 33a im 2. Stock" value="{{ $user->streetName }}">
                            @error('streetName')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="email" class="inline-block text-lg mb-2">E-Mail Adresse *</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                                placeholder="Muster@iu-fernstudium.de" value="{{ $user->email }}">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="phoneNumber" class="inline-block text-lg mb-2">Telefonnummer</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="phoneNumber"
                                placeholder="+49 151/153535" value="{{ $user->phoneNumber }}">
                            @error('phoneNumber')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="languageCode" class="inline-block text-lg mb-2">Sprache</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                name="languageCode" placeholder="deutsch" value="{{ $user->languageCode }}">
                            @error('languageCode')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label for="jobTitle" class="inline-block text-lg mb-2">Berufsbezeichnung</label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="jobTitle"
                                placeholder="Fachinformatiker für Anwendungsentwicklung"
                                value="{{ $user->jobTitle }}">
                            @error('jobTitle')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="mb-6">
                        <a href="/users"
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
