@section('title', 'Médicos')

<x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Médicos
        </h2>
        <x-button href="{{ route('doctor.create') }}" label="Cadastrar" info />
    </div>
</x-slot>

<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div>
            @if (session()->has('message'))
                <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3" role="alert">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="p-5 bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <livewire:doctor-table />
        </div>
    </div>
</div>
