@section('title', 'Pacientes')

<x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pacientes
        </h2>
        <x-button href="https://google.com" label="Cadastrar" info />
    </div>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-5 bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <livewire:pacient-table />
        </div>
    </div>
</div>
