<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 overflow-hidden shadow-sm rounded-lg mb-6">
    <div class="p-6 text-red">
        <h3 class="text-xl font-bold">Welcome back, {{ Auth::user()->name }}! 👋</h3>
        <p class="mt-2">You're logged in!</p>
    </div>
</div>

           
</x-app-layout>