<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to Dashboard') }}
        </h2>
    </x-slot>

    <div class="main-content">
        <!-- Top Navigation Bar -->
         <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <form class="d-flex me-auto w-100">
                
                    <input class="form-control me-2 form-control-search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary btn-search" type="submit">Search</button>
                </form>
            </div>
        </nav> 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
