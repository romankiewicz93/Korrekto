<x-style>
    <x-card class="p-10 max-w-lg mx-auto mt-24">

        <header class="text-center">
            <div class="flex p-5">
                <div>
                    <a href="/"><img class="w-28 invisible md:visible" src="{{ asset('images/iulogo.png') }}"
                            alt="" class="logo" /></a>
                </div>
                <div>
                    <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                        LOGIN
                    </h1>
                </div>
            </div>
        </header>

        <form method="POST" action="/users/authenticate">
            @csrf

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }}" />

                @error('email')
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
                <button type="submit" class="bg-black text-white rounded py-2 px-4 hover:bg-cyan-300">
                    Einloggen
                </button>
            </div>

            <div class="mt-8">
                <p class="mb-4 text-1xl">Noch keinen Account?
                    <a href="/register" class="text-cyan-300 underline hover:underline-offset-4 hover:text-gray-900">Registrieren</a>
                </p>
            </div>
        </form>
    </x-card>
</x-style>
