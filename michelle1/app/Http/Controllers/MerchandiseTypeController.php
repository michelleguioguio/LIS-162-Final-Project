<?php

namespace App\Http\Controllers;

use App\Models\MerchandiseType;
use Illuminate\Http\Request;

class MerchandiseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchandise_types = MerchandiseType::get();


        return view('merchandise_types.index', compact('merchandise_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('merchandise_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'name' => 'required|string|max:255',
        'event_date' => 'nullable|date', // if this field exists
    ]);

    MerchandiseType::create($data);

    return redirect()->route('merchandise_types.index')
                     ->with('success', 'Merchandise Type added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MerchandiseType $merchandiseType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MerchandiseType $merchandiseType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MerchandiseType $merchandiseType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MerchandiseType $merchandiseType)
    {
        //
    }
}
