<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-zinc-950 text-white" x-data="{ sidebarOpen: false }">

        <!-- BARRE MOBILE -->
        <header class="md:hidden fixed top-0 inset-x-0 z-30 h-14 flex items-center px-4 bg-zinc-900 border-b border-zinc-800">
            <button @click="sidebarOpen = true" aria-label="Ouvrir le menu" class="p-2 -ml-2 text-zinc-300 hover:text-white">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <span class="ml-3 font-bold">OxenHealth</span>
        </header>

        <!-- FOND SOMBRE MOBILE -->
        <div x-show="sidebarOpen" x-transition.opacity @click="sidebarOpen = false"
             class="md:hidden fixed inset-0 z-40 bg-black/60" style="display:none"></div>

        @include('layouts.sidebar')

        <main class="min-w-0 pt-20 px-4 pb-6 sm:px-6 md:ml-20 md:p-8">
            {{$slot}}
        </main>
    </body>
</html>