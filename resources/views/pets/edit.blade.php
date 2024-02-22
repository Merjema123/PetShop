<x-app-layout>
<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-2">
            @foreach($pets as $pet)
            <form method="POST" action="{{route('update_pet')}}">
                @csrf
                <input type="hidden" name="id" value="{{$pet->id}}">

                <div>
                    <x-label for="name" value="{{__('Naziv životinje')}}"/>
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$pet->name}}" required autofocus/>
                </div>   

                <div>
                    <x-label for="year" value="{{__('Starost')}}"/>
                    <x-input id="year" class="block mt-1 w-full" type="date" value="{{$pet->year}}" name="year"  required autofocus/>
                </div>  
                <div>
                    <x-label for="price" value="{{__('Cijena')}}"/>
                    <x-input id="price" class="block mt-1 w-full" type="number" value="{{$pet->price}}" name="price"  required autofocus/>
                </div>  

                <div>
                    <x-label for="breed" value="{{__('Breed')}}"/>
                    <select id="breed" name="breed" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300
                    focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option>Odaberi</option>
                    @foreach($breeds as $breed)
                    <option value="{{$breed->id}}"
                    @if($pet->breed==$breed->id) selected
                    @endif>{{$breed->name}}
                    </option>
                    @endforeach
                        </select>
                </div> 
               <button class="bg-green">Test</button> 
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4"> 
                        {{__('Spremi')}}
                </x-button>
                </div>
             </form>
             @endforeach 
        </div>
    </div>
</div>
</div>
</x-app-layout>