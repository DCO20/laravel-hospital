@section('title', 'Cadastro de Paciente')

<x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cadastro de Paciente
        </h2>
    </div>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" p-5 bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <form wire:submit.prevent="store" method="POST">
                <div class="grid grid-cols-3 grid-flow-col gap-3">
                    <x-input wire:model.defer="name" type="text" label="Nome:" placeholder="Nome" required/>
                    <x-input wire:model.defer="cpf" class="cpf" label="CPF:" placeholder="CPF" />
                    <x-input wire:model.defer="email" type="email" label="Email:" placeholder="Email" />
                </div>
                <div class="grid grid-cols-3 grid-flow-col gap-3 mt-5">
                    <x-input wire:model.defer="phone" class="phone" label="Telefone:" placeholder="Telefone"/>
                    <x-input wire:model.defer="street" label="Rua:" placeholder="Rua" />
                    <x-input wire:model.defer="number" label="Número:" placeholder="Número" />
                </div>
               <div class="mt-5">
                 <x-textarea wire:model.defer="description" label="Observação:" placeholder="Observação" />
               </div>
                <x-button class="mt-5" wire:click="store" spinner positive label="Cadastrar" />
            </form>

        </div>
    </div>
</div>
