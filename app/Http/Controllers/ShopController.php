<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Pet;



class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ispisKangal = DB::table('pets')
        ->select('pets.id', 'pets.name', 'pets.year', 'pets.breed', DB::raw('count(*) as brojac'))
        ->groupBy('pets.id', 'pets.name', 'pets.year', 'pets.breed') // Dodajemo 'pets.breed' u GROUP BY
        ->join('breeds', 'breeds.id', '=', 'pets.breed')
        ->where('breeds.name', 'Kangal')
        ->whereBetween('pets.year', ['2023-01-01', '2023-12-31'])
        ->get();

        $najcesci_breeds = DB::table('breeds')
        ->select('breeds.id', 'breeds.name', DB::raw('count(*) as brojac'))
        ->groupBy('breeds.id', 'breeds.name')
        ->join('pets','breeds.id','=','pets.breed')
        ->orderByRaw('COUNT(*) DESC')
        ->get();

        $PetsPLUS = DB::table('pets')
        ->select('pets.*',DB::raw('count(*) as brojac'))
        ->groupBy('pets.id', 'pets.name', 'pets.year', 'pets.breed', 'pets.price') // Dodajemo 'pets.price' u GROUP BY
        ->whereBetween('pets.year',['2022-01-01','2023-01-01'])
        ->get();

        $najcescekupovano = DB::table('pets')
        ->select('pets.*', DB::raw('count(*) as brojac'))
        ->groupBy('pets.id', 'pets.name', 'pets.year', 'pets.breed', 'pets.price') // Dodajemo 'pets.price' u GROUP BY
        ->join('shops','pets.id','=','shops.pets')
        ->orderByRaw('COUNT(*) DESC')
        ->get();

        $expensive_pets = DB::table('pets')
        ->select('pets.id', 'pets.name', 'pets.year', 'pets.breed', 'pets.price', DB::raw('count(*) as brojac'))
        ->groupBy('pets.id', 'pets.name', 'pets.year', 'pets.breed', 'pets.price')
        ->whereBetween('pets.price',['600','900'])
        ->orderByRaw('COUNT(*) DESC')
        ->get();

        $najcescikupac=DB::table('customers')
        ->select('customers.*', DB::raw('count(*) as brojac'))
        ->groupBy('customers.id','customers.name', 'customers.lastname', 'customers.email', 'customers.phonenumber', 'customers.radnik')
        ->join('shops','customers.id','=','shops.customer')
        ->orderByRaw('COUNT(*) DESC')
        ->get();

        $pets_do_5g=DB::table('pets')
        ->select('pets.*', DB::raw('count(*) as brojac'))
        ->groupBy('pets.id', 'pets.name', 'pets.year', 'pets.breed', 'pets.price')
        ->join('shops','pets.id','=','shops.pets')
        ->whereBetween('pets.year',['2018-01-01', '2023-01-01'])
        ->get();
        
        $customer2024=DB::table('customers')
        ->select('customers.*', DB::raw('count(*) as brojac'))
        ->groupBy('customers.id','customers.name', 'customers.lastname', 'customers.email', 'customers.phonenumber', 'customers.radnik')
        ->join('shops','customers.id','=','shops.customer')
        ->join('pets', 'pets.id','=','shops.pets')
        ->join('breeds','breeds.id','=','pets.breed')
        ->where('breeds.name','Pudla')
        ->whereBetween('pets.year', ['2018-01-01','2023-01-01'])
        ->get();

        $ispisPitbulla=DB::table('pets')
        ->select('pets.*', DB::raw('count(*) as brojac'))
        ->groupBy('pets.id', 'pets.name', 'pets.year', 'pets.breed', 'pets.price')
        ->join('breeds','breeds.id','=','pets.breed')
        ->where('breeds.name','Pitbull')
        ->whereBetween('pets.price',['500','1000'])
        ->get();

        $pets_countries = DB::table('pets')
    ->select('breeds.*', DB::raw('count(*) as brojac'))
    ->groupBy('breeds.id', 'breeds.name', 'breeds.country', 'breeds.category')
    ->join('shops', 'pets.id', '=', 'shops.pets')
    ->join('breeds','breeds.id','=','pets.breed')
    ->orderByRaw('COUNT(*) DESC')
    ->get();



    return view('shops.index', [
        'ispisKangal' => $ispisKangal,
        'najcesci_breeds'=>$najcesci_breeds,
        'PetsPLUS'=>$PetsPLUS,
        'najcescekupovano'=>$najcescekupovano,
        'expensive_pets'=>$expensive_pets,
        'najcescikupac'=>$najcescikupac,
        'pets_do_5g'=>$pets_do_5g,
        'customer2024'=>$customer2024,
        'ispisPitbulla'=>$ispisPitbulla,
        'pets_countries'=>$pets_countries
    ]);
} 
      

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
}
 
    

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
       

        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       
       //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }
    public function delete(Request $request){

        //
    }
}
