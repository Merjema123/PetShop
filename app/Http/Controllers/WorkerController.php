<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use DB;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers=DB::table('workers')
            ->get();
        return view('workers.index', ['workers'=>$workers]);
    }
    public function file_add(Request $request){
        $id=$request->id;
        
        $workers = Worker::find($id);

        return view('workers.file_add', ['id' => $id , 'workers' => $workers]);
    }
    public function process(Request $request){
        $id = $request->id;
    
        $workers = Worker::find($id);
    
        $folder_to_save = $workers->code;

        $file=$request->file('file');

        $filename = $workers->id . time() . '.' . $file->getClientOriginalExtension();
    
        $path = $file->storeAs($folder_to_save, $filename);
    
        return redirect()->route('workers');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shops = DB::table('shops')->get();
        $customers = DB::table('customers')->get();
       
    
        return view('workers.add', ['shops' => $shops, 'customers' => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'lastname'=>'required|string',
            'smjena'=>'required|integer',
            'shop'=>'required|integer',
            'customer'=>'required|integer',
            
        ]);
        try {
            DB::table('workers')->insert([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'smjena' => $request->smjena,
            'shop' => $request->shop,
            'customer' => $request->customer,
            
        ]);

        return redirect()->route('workers')->with('success', 'Prodavnica uspjesno dodana!');
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return redirect()->route('workers')->with('error', 'Došlo je do greške prilikom dodavanja kupca.');
    }
}
    

    /**
     * Display the specified resource.
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id=$request->id;
        $workers=DB::table('workers')
        ->where('id',$id)
        ->get();

        $shops = DB::table('shops')->get();
        $customers = DB::table('customers')->get();
       
    
        return view('workers.add', ['shops' => $shops, 'customers' => $customers]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=$request->id;

        $request->validate([
            'name'=>'required|string|max:255',
            'lastname'=>'required|string|max:255',
            'smjena'=>'required|integer',
            'shop'=>'required|integer',
            'customer'=>'required|integer',
        ]);

        $update_query=DB::table('workers')
        ->where('id',$id)
        ->update([
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'smjena'=>$request->smjena,
            'shop'=>$request->shop,
            'customer'=>$request->customer,
        ]);

        return redirect()->route('workers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {
        //
    }
    public function delete(Request $request){
        $id=$request->id;
        Worker::destroy($id);
        return redirect()->route('workers');
    }
}
