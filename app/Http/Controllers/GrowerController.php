<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grower;
use DB;


class GrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Grower::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Grower::all();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Grower::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $grower=Grower::find($id);
        $grower->update($request->all());
        return $grower;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        return Grower::destroy($id);
    }
}
