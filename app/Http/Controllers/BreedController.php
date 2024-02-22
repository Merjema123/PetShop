<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use Illuminate\Http\Request;
use DB;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breeds=DB::table('breeds')
        ->orderBy('country')
        ->get();

        return view('breeds.index',['breeds'=>$breeds]);
        
    }

    public function file_add(Request $request)
    {
        $id=$request->id;
        
        $breeds = Breed::find($id);

        return view('breeds.file_add', ['id' => $id , 'breeds' => $breeds]);

    }

    public function process(Request $request){
        $id=$request->id;
        $breeds=Breed::find($id);
        $folder_to_save=$breeds->code;
        $path=$request->file('file')->store($folder_to_save);
        return redirect()->route('breeds');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')
        ->get();
        return view('breeds.add',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
        ]);
        DB::table('breeds')->insert([
            'name'=>$request->name,
            'country'=>$request->country,
            'category'=>$request->category,
        ]);
        return redirect()->route('breeds');
    }

    /**
     * Display the specified resource.
     */
    public function show(Breed $breed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id=$request->id;
        $breeds=DB::table('breeds')
        ->where('id',$id)
        ->get();

        $categories=DB::table('categories')
        ->get();
        return view('breeds.edit',['breeds'=>$breeds, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=$request->id;

        $request->validate([
            'name'=>'required|string|max:255',
            'country'=>'required|string|max:255',
            'category'=>'required|integer',
        ]);

        $update_query=DB::table('breeds')
        ->where('id',$id)
        ->update([
            'name'=>$request->name,
            'country'=>$request->country,
            'category'=>$request->category,
        ]);

        return redirect()->route('breeds');

        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Breed $breed)
    {
        //
    }
    
    public function delete(Request $request){
        $id=$request->id;

        Breed::destroy($id);

        return redirect()->route('breeds');
    }

}
