<x-app-layout>
    <div class="p-8">
        <h1 class="text-3xl font-bold text-white mb-8">Hydratation</h1>

        <div class="bg-zinc-900 rounded-3xl p-6 mb-8 border-zinc-800">
            <form action="{{route('water.store')}}" method="POST" class="space-y-4">
                @csrf
                <div class="rounded-3xl">
                    <label for="" class="text-zinc-300 block mb-2">
                        Eau consommé
                    </label>

                    <input type="number" step="0.1" name="litre" class="w-full bg-zinc-800 border border-zinc-700 rounded-2xl text-white p-4 focus:outline-none" placeholder="Ex:1L, 2.5L">
                </div>

                <div>
                    <label for="" class="text-zinc-300 block mb-2">
                        Date
                    </label>

                    <input type="date" name="water_date" class="w-full bg-zinc-800 border border-zinc-700 rounded-2xl text-white p-4 focus:outline-none">
                </div>

                <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-2xl transition-all duration-300">
                    Ajouter
                </button>
            </form>
        </div>

        <div class="bg-zinc-900 rounded-3xl p-6 border border-zinc-800">
            <h2 class="text-xl font-semibold text-white mb-6">
                Historique
            </h2>
            <div class="space-y-4">
                @forelse ($waterLogs as $log)

                <div class="bg-zinc-800 rounded-2xl p-4 flex justify-between items-enter">
                    <div>
                        <p class="text-white font-semibold">
                            {{$log->litre}} litre
                        </p>
                        <p class="text-zinc-400 text-sm">
                            {{$log->water_date}}
                        </p>
                    </div>

                    <form action="{{route('water.destroy', $log)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-400 hover:text-red-500 transition">
                            Supprimer
                        </button>
                    </form>
                </div>
                    
                @empty

                <p class="text-zinc-400">Aucun historique d'hydratation.</p>
                    
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>