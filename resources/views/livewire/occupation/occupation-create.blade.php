@section('title', 'Cadastro da Ocupação')

<x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cadastro da Ocupação
        </h2>
    </div>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" p-5 bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <form wire:submit.prevent="store" method="POST">
                <x-input wire:model.defer="name" type="text" label="Nome:" placeholder="Nome" required />

                <x-button class="mt-5" wire:click="store" spinner positive label="Cadastrar" />
            </form>

        </div>
    </div>
</div>
