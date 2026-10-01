<x-app-layout>
    <div class="min-h-screen bg-zinc-950 text-white">

        <div class="flex">

  
            

            <!-- CONTENU -->
            <main class="flex-1 p-6 md:p-10">

                
                <section class="mb-12">

                    <h2 class="text-2xl sm:text-3xl break-words font-bold mb-6">
                        Score Santé
                    </h2>

                    <div class="bg-zinc-900 p-6 md:p-8 rounded-2xl border border-zinc-800">

                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">

                            <div class="bg-zinc-800/60 p-5 rounded-xl">
                                <p class="text-zinc-400 text-sm mb-2">
                                    Score du sommeil
                                </p>
                                <p class="text-2xl font-bold">
                                    {{ $sleepScore }} <span class="text-base text-zinc-500">/ 40</span>
                                </p>
                            </div>

                            <div class="bg-zinc-800/60 p-5 rounded-xl">
                                <p class="text-zinc-400 text-sm mb-2">
                                    Score d'hydratation
                                </p>
                                <p class="text-2xl font-bold">
                                    {{ $waterScore }} <span class="text-base text-zinc-500">/ 30</span>
                                </p>
                            </div>

                            <div class="bg-zinc-800/60 p-5 rounded-xl">
                                <p class="text-zinc-400 text-sm mb-2">
                                    Score d'activités physiques
                                </p>
                                <p class="text-2xl font-bold">
                                    {{ $activityScore }} <span class="text-base text-zinc-500">/ 30</span>
                                </p>
                            </div>

                        </div>


                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                            
                            <div class="bg-zinc-800/60 rounded-xl p-8 flex flex-col items-center justify-center text-center min-h-52">

                                <p class="text-zinc-400 mb-3">
                                    Score total de santé
                                </p>

                                <p class="text-5xl font-bold">
                                    {{ $healthScore }}
                                    <span class="text-xl text-zinc-500">/ 100</span>
                                </p>

                            </div>


                            
                            <div class="bg-zinc-800/60 rounded-xl p-8 flex flex-col justify-center min-h-52">

                                <p class="text-zinc-400 text-sm mb-3">
                                    Analyse de votre santé
                                </p>

                                <p class="text-lg leading-relaxed">
                                    {{ $healthInsight }}
                                </p>

                            </div>

                        </div>

                    </div>

                </section>


                
                <section>

                    <h2 class="text-2xl sm:text-3xl break-words font-bold mb-6">
                        Tableau de bord
                    </h2>

                    <!-- CARTES -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div class="bg-zinc-900 p-6 rounded-2xl border border-zinc-800 hover:border-orange-500 transition-all">
                        <p class="text-zinc-400 text-2xl sm:text-3xl break-words font-bold">
                            Activités physiques
                        </p>
                        @php
                                if ($totalActivityLogs === 0){
                                    $activityColor = 'text-zinc-400';
                                }
                                elseif ($totalActivityLogs < 4){
                                    $activityColor = 'text-red-400';
                                }
                                elseif ($totalActivityLogs < 7){
                                    $activityColor = 'text-amber-400';
                                }
                                else{
                                    $activityColor = 'text-emerald-400';
                                }
                        @endphp
                            <div class="bg-zinc-900 p-6 rounded-2xl font-bold">
                                <p class="text-zinc-400">
                                    Nombre d'activité faite en 7 jours 
                                </p>
                                <h3 class="text-2xl sm:text-3xl break-words font-bold mt-2 {{ $activityColor }}">
                                    {{ $totalActivityLogs }} 
                                </h3>
                            </div>
                            
                            <div class="bg-zinc-900 p-6 rounded-2xl font-bold">
                                <p class="text-zinc-400">
                                    Duration total 
                                </p>
                                <h3 class="text-2xl sm:text-3xl break-words font-bold mt-2 {{ $activityColor }}">
                                    {{ $totalDuration }} mn
                                </h3>
                            </div>
                            
                            <div class="bg-zinc-900 p-6 rounded-2xl font-bold">
                                <p class="text-zinc-400">
                                    Analyse: 
                                </p>
                                <h3 class="text-2xl sm:text-3xl break-words font-bold mt-2 {{ $activityColor }}">
                                    {{ $insight3 }}
                                </h3>
                            </div>
                        
                    </div>

                    <div class="bg-zinc-900 p-6 rounded-2xl border border-zinc-800 hover:border-violet-400 transition-all">
                        <p class="text-zinc-400 text-2xl sm:text-3xl break-words font-bold">
                            Sommeil
                        </p>

                            @php
                                if ($averageSleep >= 8){
                                    $sleepColor = 'text-emerald-400';
                                }
                                elseif ($averageSleep >= 6){
                                    $sleepColor = 'text-amber-400';
                                }
                                elseif ($averageSleep > 0){
                                    $sleepColor = 'text-red-400';
                                }
                                else{
                                    $sleepColor = 'text-zinc-400';
                                }
                            @endphp
                            <div class="bg-zinc-900 p-6 rounded-2xl">
                                <h3 class="text-zinc-400 font-bold">
                                    Sommeil moyen: 
                                </h3>
                                <h3 class="text-2xl sm:text-3xl break-words font-bold mt-2  {{ $sleepColor }}">
                                    {{ $averageSleep }} h
                                </h3>
                            </div>
                            
                            <div class="bg-zinc-900 p-6 rounded-2xl">
                                <p class="text-zinc-400 font-bold">
                                     Sommeil total en 7 jours: 
                                </p>
                                <h3 class="text-2xl sm:text-3xl break-words font-bold mt-2 {{ $sleepColor }}">
                                    {{ $totalSleepLogs }} h
                                </h3>
                            </div>
                            
                            <div class="bg-zinc-900 p-6 rounded-2xl">
                                <p class="text-zinc-400 font-bold">
                                    Analyse: 
                                </p>
                                <h3 class="text-2xl sm:text-3xl break-words font-bold mt-2 {{ $sleepColor }}">
                                    {{ $insight }}
                                </h3>
                            </div>
                        
                    </div>

                    <div class="bg-zinc-900 p-6 rounded-2xl border border-zinc-800 hover:border-cyan-500 transition-all">
                        <p class="text-zinc-400 text-2xl sm:text-3xl break-words font-bold">
                            Hydratation
                        </p>
                        @php
                                if ($averageWater >= 2){
                                    $waterColor2 = 'text-emerald-400';
                                }
                                elseif ($averageWater >= 1){
                                    $waterColor2 = 'text-amber-400';
                                }
                                elseif ($averageWater < 1){
                                    $waterColor2 = 'text-red-400';
                                }
                                else{
                                    $waterColor = 'text-zinc-400';
                                }
                        @endphp

                        
                            <div class="bg-zinc-900 p-6 rounded-2xl">
                                <p class="text-zinc-400 font-bold">
                                    Hydratation moyenne: 
                                </p>
                                <h3 class="text-2xl sm:text-3xl break-words font-bold {{ $waterColor2 }}">
                                    {{ $averageWater }} L
                                </h3>
                            </div>

                            @php
                                if ($totalWaterLogs >= 14){
                                    $waterColor = 'text-emerald-400';
                                }
                                elseif ($totalWaterLogs >= 7){
                                    $waterColor = 'text-amber-400';
                                }
                                elseif ($totalWaterLogs < 7){
                                    $waterColor = 'text-red-400';
                                }
                                else{
                                    $waterColor = 'text-zinc-400';
                                }
                            @endphp
                            
                            <div class="bg-zinc-900 p-6 rounded-2xl">
                                <p class="text-zinc-400 font-bold">
                                    Eau total consommé: 
                                </p>
                                <h3 class="text-2xl sm:text-3xl break-words font-bold {{ $waterColor }}">
                                    {{ $totalWaterLogs }} L
                                </h3>
                            </div>
                            
                            <div class="bg-zinc-900 p-6 rounded-2xl">
                                <p class="text-zinc-400 font-bold">
                                    Analyse: 
                                </p>
                                <h3 class="text-2xl sm:text-3xl break-words font-bold mt-2 {{ $waterColor }}">
                                    {{ $insight2 }}
                                </h3>
                            </div>
                        
                    </div>

                </div>

                <!-- ZONE GRAPHIQUE -->
                <div class="mt-10 bg-zinc-900 p-6 rounded-2xl border border-zinc-800">

                    <h3 class="text-2xl sm:text-3xl break-words font-bold mb-6">
                        Progression hebdomadaire
                    </h3>
                    <script>
                        window.activityData = @json($chartActivityData);
                        window.activityValue = @json($chartActivityData);

                        window.sleepData = @json($chartSleepData);
                        window.sleepValue = @json($chartSleepData);

                        window.waterData = @json($chartWaterData);
                        window.waterValue = @json($chartWaterData);
                    </script>


                    <div class="relative h-56 sm:h-64 w-full mb-6">
                        <canvas id="activityChart"></canvas>
                    </div>
                    <div class="relative h-56 sm:h-64 w-full mb-6">
                        <canvas id="sleepChart"></canvas>
                    </div>
                    <div class="relative h-56 sm:h-64 w-full">
                        <canvas id="waterChart"></canvas>
                    </div>

                </div>

                </section>

            

                

            </main>

        </div>

    </div>
</x-app-layout>