<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel Principal') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shad14o0.w-xl sm:rounded-lg">
                @if(Auth::user()->is_admin)
                <div class="flex max-w-7xl justify-evenly">
                    <div class="p-2">
                        <h2 class=" text-center text-xl text-black">Accesos Rapidos</h2>
                    </div>
                    <div class="p-2">
                        <h2 class=" text-center text-xl text-black">Usuarios</h2>

                    </div>
                </div>
                @else
                <h2>User</h2>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
