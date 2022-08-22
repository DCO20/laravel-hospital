@section('title', 'Editar Especialidade')

<x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Especialidade
        </h2>
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

        <div class=" p-5 bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <form wire:submit.prevent="update" method="POST">
                <x-input wire:model.defer="name" type="text" label="Nome:" placeholder="Nome" />

                <x-button class="mt-5" wire:click="update" spinner positive label="Atualizar" />
            </form>

        </div>
    </div>
</div>
