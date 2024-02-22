<x-app-layout>
<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-2">
            @foreach($customers as $customer)
            <form method="POST" action="{{route('update_customer')}}">
                @csrf
                <input type="hidden" name="id" value="{{$customer->id}}">

                <div>
                    <x-label for="name" value="{{__('Ime')}}"/>
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$customer->name}}" required autofocus/>
                </div>
                <div>
                    <x-label for="lastname" value="{{__('Prezime')}}"/>
                    <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" value="{{$customer->lastname}}" required autofocus/>
                </div>   
                <div>
                    <x-label for="email" value="{{__('Email')}}"/>
                    <x-input id="email" class="block mt-1 w-full" type="text" name="email" value="{{$customer->email}}" required autofocus/>
                </div>               

                <div>
                    <x-label for="phonenumber" value="{{__('Broj mobitela')}}"/>
                    <x-input id="phonenumber" class="block mt-1 w-full" type="number"  value="{{$customer->phonenumber}}" name="phonenumber" required autofocus/>
                </div> 
                <div>
                    <x-label for="worker" value="{{__('Radnici')}}"/>
                    <select id="worker" name="worker" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300
                    focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option>Odaberi</option>
                    @foreach($workers as $worker)
                    <option value="{{$worker->id}}"
                    @if($customer->radnik==$worker->id) selected
                    @endif>{{$worker->name}}
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