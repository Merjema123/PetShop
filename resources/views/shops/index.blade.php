<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kupovina') }}
        </h2>
    </x-slot>

    <div class="py-12">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
     <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
     <div class="p-2">
        <div>

            <h1>Ispis Kangal pasa rodjenih u 2021.godini</h1>
            <hr>
            @foreach($ispisKangal as $ispisKangals)
            <p>{{$loop->iteration}}.{{$ispisKangals->name}}</p>
            @endforeach
</div>
<div>
    <h1> Najprodavanije pasmine životinja </h1>
    <hr>
    @foreach($najcesci_breeds as $najcesci_breed) 
    <p>{{$loop->iteration}}.{{$najcesci_breed->name}} - {{$najcesci_breed->brojac}} </p>
    @endforeach
</div>

<div>
    <h1> Životinje rođene u 2022.godini </h1>
    <hr>
    @foreach($PetsPLUS as $PetsPLUSs)
    <p>{{$loop->iteration}}. {{$PetsPLUSs->name}} </p>
    @endforeach
</div>
<div>
    <h1> Ispis najčešće kupovanih životinja </h1>
    <hr>
    @foreach($najcescekupovano as $najcescekupovan)
    <p>{{$loop->iteration}}. {{$najcescekupovan->name}} - {{$najcescekupovan->brojac}} </p>
    @endforeach
</div>  
<div>
    <h1> Ispis životinja izmedju 600KM i 800KM </h1>
    <hr>
    @foreach ($expensive_pets as $expensive_pet)
    <p>{{$loop->iteration}}. {{$expensive_pet->name}} - {{$expensive_pet->price}}KM </p>
    @endforeach
</div> 
<div>
    <h1>  Ispis najčešćih kupaca </h1>
    <hr>
    @foreach($najcescikupac as $najcescikupacc)
    <p> {{$loop->iteration}}. {{$najcescikupacc->name}} - {{$najcescikupacc->lastname}} - {{$najcescikupacc->brojac}} </p>
    @endforeach
</div>

<div>
    <h1> Prodane životinje do 5 godine </h1>
    <hr>
    @foreach($pets_do_5g as $pets20)
    <p>{{$loop->iteration}}. {{$pets20->name}} - {{$pets20->brojac}} </p>
    @endforeach
</div>
<div>
    <h1> Kupci koji su uzeli Pudlu do 5 godina </h1>
    <hr>
    @foreach($customer2024 as $customer2420)
<p>{{$loop->iteration}}. {{$customer2420->name}} - {{$najcescikupacc->lastname}} </p>
@endforeach
</div>
<div>
    <h1> Ispis Pitbul pasmine do 1000KM </h1>
    <hr>
    @foreach($ispisPitbulla as $ispisPitbull)
    <p> {{$loop->iteration}}. {{$ispisPitbull->name}}-{{$ispisPitbull->price}}KM </p>
    @endforeach
</div>

<div>
    <h1> Ispisati države čije životinje su najprodavanije </h1>
    <hr/>
    @foreach($pets_countries as $pets_country) 
    <p> {{$loop->iteration}}. {{$pets_country->country}} - {{$pets_country->brojac}} </p>
    @endforeach
</div>

</div>
</div>
</div>
</div>
</x-app-layout>



                    