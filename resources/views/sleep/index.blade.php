<x-app-layout>
    <div>
        <h1 class="text-2xl sm:text-3xl break-words font-bold text-white mb-8">Suivi du sommeil</h1>

        <div class="bg-zinc-900 rounded-3xl p-6 mb-8 border-zinc-800">
            <form action="{{route('sleep.store')}}" method="POST" class="space-y-4">
                @csrf
                <div class="rounded-3xl">
                    <label for="" class="text-zinc-300 block mb-2">
                        Heures de sommeil
                    </label>

                    <input type="number" step="0.1" name="hours" class="w-full bg-zinc-800 border border-zinc-700 rounded-2xl text-white p-4 focus:outline-none" placeholder="Ex:7.5">
                </div>

                <div>
                    <label for="" class="text-zinc-300 block mb-2">
                        Date
                    </label>

                    <input type="date" name="sleep_date" class="w-full bg-zinc-800 border border-zinc-700 rounded-2xl text-white p-4 focus:outline-none">
                </div>

                <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-2xl transition-all duration-300 w-full sm:w-auto">
                    Ajouter
                </button>
            </form>
        </div>

        <div class="bg-zinc-900 rounded-3xl p-6 border border-zinc-800">
            <h2 class="text-xl font-semibold text-white mb-6">
                Historique
            </h2>
            <div class="space-y-4">
                @forelse ($sleepLogs as $log)

                <div class="bg-zinc-800 rounded-2xl p-4 flex justify-between items-center gap-4">
                    <div>
                        <p class="text-white font-semibold">
                            {{$log->hours}} heures
                        </p>
                        <p class="text-zinc-400 text-sm">
                            {{$log->sleep_date}}
                        </p>
                    </div>

                    <form action="{{route('sleep.destroy', $log)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-400 hover:text-red-500 transition">
                            Supprimer
                        </button>
                    </form>
                </div>
                    
                @empty

                <p class="text-zinc-400">Aucun historique sommeil.</p>
                    
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>