<x-layout>
    <div class="md:container md:mx-auto">
        <div class="flex flex-col ">
            <div class="flex px-5">
                <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                    Benutzerprofil
                </h1>
            </div>
            <div class="flex p-5 ">
                <h3 class="text-2xl mb-2"> {{ $user['title'] }} {{ $user['firstName'] }} {{ $user['lastName'] }}
                </h3>
            </div>
            <div class="flex px-5">
                <div class="text-xl font-bold mb-4">Adresse: </div>
                <div class="text-xl pr-2 pl-2 mb-4"> {{ $user['country'] }}
                    {{ $user['city'] }}
                    {{ $user['postcode'] }}
                    {{ $user['streetName'] }} </div>
            </div>
            <div class="flex px-5">
                <div class="text-xl font-bold mb-4">Beruf: </div>
                <div class="text-xl pr-2 pl-2 mb-4">{{ $user['jobTitle'] }}</div>
            </div>
            <div class="flex px-5">
                <div class="text-xl font-bold mb-4">Sprache: </div>
                <div class="text-xl pr-2 pl-2 mb-4"> {{ $user['languageCode'] }}</div>
            </div>
            <div class="flex px-5">
                <div class="text-xl font-bold mb-4">Kontakt: </div>
                <div class="text-xl pr-2 pl-2 mb-4"> {{ $user['email'] }}</div>
                <div class="text-xl  mb-4"> {{ $user['phoneNumber'] }}</div>
            </div>
        </div>
    </div>


    <x-card class="mt-4 p-2 flex space-x-6">
        <a href="/users"
            class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-3 border border-gray-400 rounded shadow mr-4">
            <i class="fa-solid fa-arrow-left"></i> Zurück </a>

        <a href="/users/{{ $user->id }}/edit">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                <i class="fa-solid fa-pencil p-2"> </i>Bearbeiten </button>
        </a>
        <form method="POST" action="/users/{{ $user->id }}">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded"><i
                    class="fa-solid fa-trash p-2"></i>Löschen </button>
        </form>
    </x-card>
    </div>
</x-layout>
