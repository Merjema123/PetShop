<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers=DB::table('customers')
            ->get();

        return view('customers.index', ['customers'=> $customers]);
    }
    public function file_add(Request $request){
        $id=$request->id;
        
        $customers = Customer::find($id);

        return view('customers.file_add', ['id' => $id , 'customers' => $customers]);
    }
    public function process(Request $request){
        $id=$request->id;
        $customers=Customer::find($id);
        $folder_to_save=$customers->code;
        $path=$request->file('file')->store($folder_to_save);
        return redirect()->route('customers');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workers = DB::table('workers')
        ->get();
        return view('customers.add',['radnik'=>$workers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'phonenumber' => 'required|integer',
        'worker' => 'required|integer', 
    ]);        
    
    try {
            DB::table('customers')->insert([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'radnik' => $request->worker,
        ]);

        return redirect()->route('customers')->with('success', 'Kupac uspješno dodan!');
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return redirect()->route('customers')->with('error', 'Došlo je do greške prilikom dodavanja kupca.');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id=$request->id;
        $customers=DB::table('customers')
        ->where('id',$id)
        ->get();

        $workers=DB::table('workers')
        ->get();

        return view('customers.edit',['customers'=>$customers, 'workers'=>$workers]);


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
            'email'=>'required|string|max:255',
            'phonenumber'=>'required|integer',
            'worker'=>'required|integer',
        ]);

        $update_query=DB::table('customers')
        ->where('id',$id)
        ->update([
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'phonenumber'=>$request->phonenumber,
            'radnik'=>$request->worker,
        ]);

        return redirect()->route('customers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
    public function delete(Request $request){
        $id=$request->id;
        Customer::destroy($id);
        return redirect()->route('customers');
    }
}
