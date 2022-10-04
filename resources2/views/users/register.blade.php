<x-style>
    <x-card class="p-10 max-w-xl mx-auto mt-24">
        <header class="text-center">
                <div class="flex justify-between p-5">
                    <div class="w-28">
                        <a class="w-full" href="/">
                            <img class="invisible w-full md:visible"
                            src="{{ asset('images/iulogo.png') }}" alt=""
                            class="logo" />
                        </a>
                    </div>
                <div class="flex-1">
                    <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                        REGISTRIEREN
                    </h1>
                </div>
            </div>
        </header>

        <form method="POST" action="/users">
            @csrf
            <div class="mb-6">
                <label for="firstName" class="inline-block text-lg mb-2"> Vorname </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="firstName"
                    value="{{ old('firstName') }}" />

                @error('firstName')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="lastName" class="inline-block text-lg mb-2"> Nachname </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="lastName"
                    value="{{ old('lastName') }}" />

                @error('lastName')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }}" />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="phoneNumber" class="inline-block text-lg mb-2">Telefonnummer</label>
                <input type="" class="border border-gray-200 rounded p-2 w-full" name="phoneNumber"
                    value="{{ old('phoneNumber') }}" />

                @error('phoneNumber')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Passwort
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                    value="{{ old('password') }}" />

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password2" class="inline-block text-lg mb-2">
                    Passwort bestätigen
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation"
                    value="{{ old('password_confirmation') }}" />

                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-black text-white rounded py-2 px-4 hover:bg-cyan-300">
                    Registrieren
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Haben Sie bereits einen Account?
                    <a href="/login" class="text-cyan-300">Login</a>
                </p>
            </div>
        </form>
    </x-card>
</x-style>
