<x-layout>

    <div class="mx-4 p-2">
        <a href="/materials">
            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                <i class="fa-solid fa-arrow-left"></i> Zurück </button>
          </button>
    </div>

    <div class="md:container md:mx-auto">
        <div class="flex flex-col items-center justify-center text-center">
            <div class="flex px-5">
                <h1 class="text-5xl font-bold uppercase bg-cyan-300 py-2 px-4 border-b-5 border-cyan-300">
                    Kursmaterial
                </h1>
            </div>
            <div class="flex px-5">
                <h3 class="text-2xl mb-2"> {{ $material['name'] }}</h3>
            </div>
            <div class="flex p-5">
                <p>
                    {{ $material['description'] }}
                </p>
            </div>
        </div>
    </div>


        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/material/{{ $material->id }}/edit">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                    <i class="fa-solid fa-pencil p-2"> </i>Bearbeiten </button>
            </a>
            <form method="POST" action="/material/{{ $material->id }}">
                @csrf
                @method('DELETE')
                <button
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded"><i
                        class="fa-solid fa-trash p-2"></i>Löschen </button>
            </form>
        </x-card>
    </div>
</x-layout>
