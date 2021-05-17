<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{$user->business}} / {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex flex-row flex-wrap justify-start">
                @forelse($user->pedidos as $pedido)
                <div class="p-2 m-2 ring-2 ring-green-200 hover:ring-green-800 w-50 overflow-auto">
                <livewire:pedido-card-admin :pedido="$pedido" />
                </div>
                @empty
                <p> Sin pedidos aun pealizados </p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
