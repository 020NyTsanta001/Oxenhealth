<div
    class="group fixed top-0 left-0 h-screen w-20 hover:w-64
           bg-zinc-900 border-r border-zinc-800
           transition-all duration-300 ease-in-out overflow-hidden"
>

    <!-- LOGO -->
    <div class="h-20 flex items-center px-5 border-b border-zinc-800">

        <div class="min-w-[40px] h-10 flex items-center justify-center">
            <div class="w-10 h-10 rounded-2xl bg-emerald-500 flex items-center justify-center text-white fond-bold text-sm">oH</div>
        </div>

        <span
            class="ml-3 text-white text-xl font-bold whitespace-nowrap
                   opacity-0 group-hover:opacity-100 transition-opacity duration-200"
        >
            OxenHealth
        </span>

    </div>

    <!-- MENU -->
    <nav class="mt-6 px-3 space-y-2">

        <!-- ITEM -->
        <a href="/dashboard"
           class="flex items-center h-14 px-4 rounded-2xl
                  text-zinc-300 hover:bg-zinc-800 hover:text-white
                  transition-all duration-200">

            <div class="min-w-[24px] flex justify-center">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-emerald-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3 12l2-2 4 4 8-8 4 4"
                    />
                </svg>

            </div>

            <span
                class="ml-4 whitespace-nowrap opacity-0 group-hover:opacity-100
                       transition-opacity duration-200">
                Tableau de bord
            </span>

        </a>

        <!-- ITEM -->
        <div x-data="{ open: false }" class="relative">

    <!-- BOUTON -->
    <button
        @click="open = !open"
        class="w-full flex items-center h-14 px-4 rounded-2xl
               text-zinc-300 hover:bg-zinc-800 hover:text-white
               transition-all duration-200"
    >

        <div class="min-w-[24px] flex justify-center">

            <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-red-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 21s-7-4.35-9-8.5C1.5 9 3.5 5 7.5 5c2.04 0 3.04 1 4.5 2.5C13.46 6 14.46 5 16.5 5 20.5 5 22.5 9 21 12.5 19 16.65 12 21 12 21Z"
                    />
                </svg>

        </div>

        <span
            class="ml-4 whitespace-nowrap opacity-0 group-hover:opacity-100
                   transition-opacity duration-200"
        >
            Données santé
        </span>

    </button>

    <!-- DROPDOWN -->
    <div
        x-show="open"
        @click.away="open = false"
        x-transition
        class="absolute left-30 top-0 w-48 z-50 bg-zinc-900 border border-zinc-800
               rounded-2xl shadow-xl overflow-hidden"
    >

        <a href="{{ route('activity.index') }}"
           class="block px-4 py-3 text-zinc-300 hover:bg-zinc-800 transition">
            🏃 Activités physiques
        </a>

        <a href="{{ route('sleep.index') }}"
           class="block px-4 py-3 text-zinc-300 hover:bg-zinc-800 transition">
            😴 Sommeil
        </a>

        <a href="{{ route('water.index') }}"
           class="block px-4 py-3 text-zinc-300 hover:bg-zinc-800 transition">
            💧 Hydratation
        </a>

    </div>

        <!-- ITEM -->
        <a href="#"
           class="flex items-center h-14 px-4 rounded-2xl
                  text-zinc-300 hover:bg-zinc-800 hover:text-white
                  transition-all duration-200">

            <div class="min-w-[24px] flex justify-center">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-cyan-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M4 19h16M7 16V9M12 16V5M17 16v-3"
                    />
                </svg>

            </div>

            <span
                class="ml-4 whitespace-nowrap opacity-0 group-hover:opacity-100
                       transition-opacity duration-200">
                Analyses
            </span>

        </a>

    
        <!-- ITEM -->
        <div x-data="{ open: false }" class="relative">

    <!-- BOUTON -->
    <button
        @click="open = !open"
        class="w-full flex items-center h-14 px-4 rounded-2xl
               text-zinc-300 hover:bg-zinc-800 hover:text-white
               transition-all duration-200"
    >

        <div class="min-w-[24px] flex justify-center">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6 text-blue-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 12a4 4 0 100-8 4 4 0 000 8Zm0 2c-4 0-7 2-7 4v2h14v-2c0-2-3-4-7-4Z"
                />
            </svg>

        </div>

        <span
            class="ml-4 whitespace-nowrap opacity-0 group-hover:opacity-100
                   transition-opacity duration-200"
        >
            {{ Auth::user()->name }}
        </span>

    </button>

    <!-- DROPDOWN -->
    <div
        x-show="open"
        @click.away="open = false"
        x-transition
        class="absolute left-20 bottom-0 w-48 bg-zinc-900 border border-zinc-800
               rounded-2xl shadow-xl overflow-hidden"
    >

        <a href="{{ route('profile.edit')  }}"
           class="block px-4 py-3 text-zinc-300 hover:bg-zinc-800 transition">
            Profil
        </a>

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="w-full text-left px-4 py-3 text-red-400 hover:bg-zinc-800 transition"
            >
                Déconnexion
            </button>
        </form>

    </div>

</div>

    </nav>

</div>