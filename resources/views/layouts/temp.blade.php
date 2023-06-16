<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight m-10">
                    @yield('subtitle')
                </h2>
                <div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
