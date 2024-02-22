<x-app-layout>
<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-2">
            @foreach($workers as $worker)
            <form method="POST" action="{{route('update_worker')}}">
                @csrf
                <input type="hidden" name="id" value="{{$worker->id}}">

                <div>
                    <x-label for="name" value="{{__('Ime')}}"/>
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$worker->name}}" required autofocus/>
                </div>
                <div>
                    <x-label for="lastname" value="{{__('Prezime')}}"/>
                    <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" value="{{$worker->lastname}}" required autofocus/>
                </div>   
                <div>
                    <x-label for="smjena" value="{{__('Smjena')}}"/>
                    <x-input id="smjena" class="block mt-1 w-full" type="number" name="smjena" value="{{$worker->smjena}}" required autofocus/>
                </div> 
                
                <div>
                    <x-label for="shop" value="{{__('Kupovina')}}"/>
                    <select id="shop" name="shop" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300
                    focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option>Odaberi</option>
                    @foreach($shops as $shop)
                    <option value="{{$shop->id}}"
                    @if($worker->shop==$shop->id) selected
                    @endif>{{$shop->name}}
                    </option>
                    @endforeach
                        </select>
                </div> 

                <div>
                    <x-label for="customer" value="{{__('Kupci')}}"/>
                    <select id="customer" name="customer" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300
                    focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option>Odaberi</option>
                    @foreach($customers as $customer)
                    <option value="{{$customer->id}}"
                    @if($worker->customer==$customer->id) selected
                    @endif>{{$customer->name}}
                    </option>
                    @endforeach
                        </select>
                </div> 

    

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