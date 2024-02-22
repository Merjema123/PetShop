<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Početna') }}
            <span class="float-right text-sm text-gray-600">{{ date('D, d M Y H:i') }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    <div class="text-container">
                        <h1 class="font-xl mb-4 text-center">Dobrodošli u naš Pet Shop, gdje se ljubav prema životinjama pretvara u stvarnost! Naša trgovina posvećena je pružanju najbolje skrbi i ljubavi za vaše pernate, dlakave i krljuštaste prijatelje. Nudimo širok izbor zdravih i sretnih ljubimaca, od šarmantnih štenaca i mačića do egzotičnih ptica i reptila. Svi naši ljubimci dolaze s puno ljubavi, skrbi i odgovornosti, uz podršku našeg stručnog tima koji je uvijek tu da pruži savjete i podršku. Posjetite nas danas i pronađite savršenog saputnika koji će unijeti radost i ljubav u vaš dom!</h1>
                        <hr>
                    </div>
                    <div class="flex flex-wrap">
                        <div class="w-1/4 px-2">
                            <img src="{{ asset('slike/pile.jfif') }}" alt="Opis slike" class="w-24 h-24 mx-auto">
                        </div>
                        <div class="w-1/4 px-2">
                            <img src="{{ asset('slike/bebice.jfif') }}" alt="Opis slike" class="w-24 h-24 mx-auto">
                        </div>
                        <div class="w-1/4 px-2">
                            <img src="{{ asset('slike/pets.jfif') }}" alt="Opis slike" class="w-24 h-24 mx-auto">
                        </div>
                        <div class="w-1/4 px-2">
                            <img src="{{ asset('slike/zeko.jfif') }}" alt="Opis slike" class="w-24 h-24 mx-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
