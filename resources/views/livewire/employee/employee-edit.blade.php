@section('title', 'Editar Funcionário')

<x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Funcionário
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

        <div class=" p-5 bg-white overflow-hidden shaow-xl sm:rounded-lg">

            <form wire:submit.prevent="update" method="POST">
                <div class="grid grid-cols-3 grid-flow-col gap-3">
                    <x-input wire:model.defer="name" type="text" label="Nome:" placeholder="Nome" required />
                    <x-input wire:model.defer="email" type="email" label="Email:" placeholder="Email" />
                    <x-input wire:model.defer="phone" class="phone" label="Telefone:" placeholder="Telefone" />
                </div>
                <div class="mb-3 xl:w-96 mt-5">
                    <label class=" text-base
                        text-gray-700">Ocupação:</label>
                    <select wire:model.defer="occupation_id"
                        class="form-select appearance-none
                        block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
      r                 ounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">

                        @foreach ($occupations as $occupation)
                            <option value="{{ $occupation->id }}">{{ $occupation->name }}</option>
                        @endforeach

                    </select>
                </div>
                <x-button class="mt-5" wire:click="update" spinner positive label="Cadastrar" />
            </form>

        </div>
    </div>
</div>
