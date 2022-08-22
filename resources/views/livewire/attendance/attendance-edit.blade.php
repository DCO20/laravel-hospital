@section('title', 'Editar Atendimento')

<x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Atendimento
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
                <div class="grid grid-cols-3 grid-flow-col gap-3">
                    <div class="mb-3 xl:w-96">
                        <label class=" text-base
                        text-gray-700">Paciente:</label>
                        <select wire:model.defer="pacient_id"
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

                            @foreach ($pacients as $pacient)
                                <option value="{{ $pacient->id }}">{{ $pacient->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 xl:w-96">
                        <label class=" text-base
                        text-gray-700">Médico:</label>
                        <select wire:model.defer="doctor_id"
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

                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 xl:w-96">
                        <label class=" text-base
                        text-gray-700">Status:</label>
                        <select wire:model.defer="status"
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
                            <option value="Atendimento">Atendimento</option>
                            <option value="Concluído">Concluído</option>
                        </select>
                    </div>
                </div>

                <div class="mt-5">
                    <x-textarea wire:model.defer="description" label="Observação:" placeholder="Observação" />
                </div>
                <x-button class="mt-5" wire:click="update" spinner positive label="Editar" />
            </form>

        </div>
    </div>
</div>
