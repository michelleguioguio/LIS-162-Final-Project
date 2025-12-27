<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\MerchandiseType;


class MerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchandise = Merchandise::with(['user', 'merchandiseType'])->get();



        return view('merchandise.index', compact('merchandise'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $events = Event::all();
    $merchandise_types = MerchandiseType::all();

    return view('merchandise.create', compact('events', 'merchandise_types'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'events' => 'nullable|array',
        'events.*' => 'exists:events,id',
        'merchandise_type_id' => 'required|exists:merchandise_types,id',
    ]);
        $data['user_id'] = auth()->id();
    // Create merchandise
    $merch = Merchandise::create($data);

    // Attach events
    if(isset($data['events'])){
        $merch->events()->attach($data['events']);
    }

    return redirect()->route('merchandise.index')->with('success', 'Merchandise added!');
}





    /**
     * Display the specified resource.
     */
    public function show(Merchandise $merchandise)
    {
        return view('merchandise.show', compact('merchandise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merchandise $merchandise)
    {
        $events = Event::all();
    $merchandise_types = MerchandiseType::all();

    return view('merchandise.edit', compact('merchandise', 'events', 'merchandise_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merchandise $merchandise)
    {
        $data = $request->validate([
    'name' => 'required|string|max:255',
    'price' => 'required|numeric|min:0',
    'stock' => 'required|integer|min:0',
    'merchandise_type_id' => 'required|exists:merchandise_types,id'
    ]);

        $merchandise->update($data);
        
        return redirect (route('merchandise.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchandise $merchandise)
    {
        $merchandise->delete();
        return redirect (route('dashboard'));
    }
}
