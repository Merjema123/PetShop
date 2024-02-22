<x-app-layout>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-2">
                <form method="POST" action="{{ route('store_worker') }}">
                    @csrf

                    <div>
                        <x-label for="name" :value="__('Ime')"/>
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus/>
                    </div>   

                    <div>
                        <x-label for="lastname" :value="__('Prezime')"/>
                        <x-input id="lastanme" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus/>
                    </div>  
                    <div>
                        <x-label for="smjena" :value="__('Smjena')"/>
                        <x-input id="smjena" class="block mt-1 w-full" type="number" name="smjena" :value="old('smjena')" required autofocus/>
                    </div> 
                     
                    <div>
                        <x-label for="customer" :value="__('Kupac')"/>
                        <select id="customer" name="customer" class="from-select block w-full mt-1 border-gray-300 focus:border-indigo-300
                        focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option selected="true" disabled="disabled">Odaberi</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    
                    </div>  
                    <div>
                        <x-label for="shop" :value="__('Kupovina')"/>
                        <select id="shop" name="shop" class="from-select block w-full mt-1 border-gray-300 focus:border-indigo-300
                        focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option selected="true" disabled="disabled">Odaberi</option>
                            @foreach($shops as $shop)
                                <option value="{{ $shop->id }}">{{ $shop->code }}</option>
                            @endforeach
                        </select>
                    
                    </div>  

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4"> 
                            {{ __('Spremi') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>