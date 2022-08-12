@section('title', 'Excluir Ocupação')

<x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Excluir Ocupação
        </h2>
    </div>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" p-5 bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <form wire:submit.prevent="delete" method="POST">
                <x-input wire:model.defer="name" type="text" label="Nome:" placeholder="Nome" readonly/>
                <x-button class="mt-5" wire:click="delete" spinner red label="Deletar" />
            </form>

        </div>
    </div>
</div>
