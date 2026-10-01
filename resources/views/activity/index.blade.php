<x-app-layout>
    <div>
        <h1 class="text-2xl sm:text-3xl break-words font-bold text-white mb-8">Suivi d'activités</h1>

        <div class="bg-zinc-900 rounded-3xl p-6 mb-8 border <div>">
            <form action="{{route('activity.store')}}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="rounded-3xl">
                        <label for="" class="text-zinc-300 block mb-2">
                            Activité faite
                        </label>

                        <input type="text" name="activity_type" class="w-full bg-zinc-800 border border-zinc-700 rounded-2xl text-white p-4 focus:outline-none" placeholder="Ex:Course, Cycliste, etc...; si aucune, mettez 'aucun' et la duration à 0">
                    </div>

                    <div>
                        <label for="" class="text-zinc-300 block mb-2">
                            Duration
                        </label>

                        <input type="number" step="1"  name="duration" class="w-full bg-zinc-800 border border-zinc-700 rounded-2xl text-white p-4 focus:outline-none" placeholder="20 mn, 45 mn, etc... si 'aucun' ce sera 0">
                    </div>
                </div>
                

                <div>
                    <label for="" class="text-zinc-300 block mb-2">
                        Date
                    </label>

                    <input type="date" name="activity_date" class="w-full bg-zinc-800 border border-zinc-700 rounded-2xl text-white p-4 focus:outline-none">
                </div>

                <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-2xl transition-all duration-300">
                    Ajouter
                </button>
            </form>
        </div>

        <div class="bg-zinc-900 rounded-3xl p-6 border <div>">
            <h2 class="text-xl font-semibold text-white mb-6">
                Historique
            </h2>
            <div class="space-y-4">
                @forelse ($activityLogs as $log)

                <div class="bg-zinc-800 rounded-2xl p-4 flex justify-between items-center gap-4">
                    <div>
                        <p class="text-white font-semibold">
                            {{$log->activity_type}}
                        </p>
                        <p class="text-zinc-400 text-sm">
                            {{$log->duration}} mn
                        </p>
                        <p class="text-zinc-400 text-sm">
                            {{$log->activity_date}} 
                        </p>
                    </div>

                    <form action="{{route('activity.destroy', $log)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-400 hover:text-red-500 transition">
                            Supprimer
                        </button>
                    </form>
                </div>
                    
                @empty

                <p class="text-zinc-400">Aucun historique d'activité.</p>
                    
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>