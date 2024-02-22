<x-app-layout>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-2">
                <form method="POST" action="{{route('store_category')}}">
                    @csrf

                    <div>
                        <x-label for="name" value="{{__('Naziv kategorije')}}"/>
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus/>
                    </div>   

                 
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4"> 
                            {{__('Spremi')}}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
