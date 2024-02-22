<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Pet;
use Illuminate\Http\Request;


class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets=DB::table('pets')
            ->get();

        return view('pets.index',['pets'=>$pets]);
    }

    public function file_add(Request $request){
        $id=$request->id;
        
        $pets = Pet::find($id);

        return view('pets.file_add', ['id' => $id , 'pets' => $pets]);
    }
    
    public function process(Request $request){
        $id = $request->id;
    
        $pets = Pet::find($id);
    
        $folder_to_save = $pets->code;

        $file=$request->file('file');

        $filename = $pets->id . time() . '.' . $file->getClientOriginalExtension();
    
        $path = $file->storeAs($folder_to_save, $filename);
    
        return redirect()->route('pets');
    }
    
      

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breeds=DB::table('breeds')
        ->get();
        return view('pets.add',['breeds'=>$breeds]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
        ]);
        DB::table('pets')->insert([
            'name'=>$request->name,
            'year'=>$request->year,
            'breed'=>$request->breed,
            'price'=>$request->price,

        ]);
        return redirect()->route('pets');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id=$request->id;
        $pets=DB::table('pets')
        ->where('id', $id)
        ->get();
        $breeds=DB::table('breeds')
        ->get();
        return view('pets.edit',['pets'=>$pets, 'breeds'=>$breeds]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=$request->id;

        $request->validate([

            'name'=>'required|string|max:255',
            'year'=>'required|date',
            'breed'=>'required|string',
        ]);

        $update_query=DB::table('pets')
        ->where('id',$id)
        ->update([
        'name'=>$request->name,
        'year'=>$request->year,
        'breed'=>$request->breed,
        'price'=>$request->price,
        ]);
        return redirect()->route('pets');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        //
    }
    public function delete(Request $request){
        $id->$request->id;
        Pet::destory($id);
        return redirect()->route('pets');
    }
}
