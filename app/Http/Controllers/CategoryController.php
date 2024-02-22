<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=DB::table('categories')
            ->get();

        return view('categories.index',['categories'=>$categories]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
        ]);
        DB::table('categories')->insert([
            'name'=>$request->name,
        ]);
        return redirect()->route('categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $categories = DB::table('categories')
        ->where('id', $id)
        ->get();
        return view('categories.edit', ['categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $update_query=DB::table('categories')
        ->where('id',$id)
        ->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('categories');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
    public function delete(Request $request){
        $id=$request->id;
        Category::destroy($id);
        return redirect()->route('categories');
    }
}
