<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

class PlacesController extends Controller
{

    public function index()
    {
        $places = Place::all();
        return view('places.index', ['places' => $places]);
    }

    public function create()
    {
        return view('places.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'place_name' => 'required|string|max:100',
            'palce_address' => 'required|string|max:100',
            'lat' => 'required',
            'lng' => 'required'
        ]);

        /* we had set the $fillabe attribute on the Place Model
        so that we can use $request->all() safely
        */
        $place = new Place($request->all());
        $place->save();
        return redirect()
                        ->route('places.index')
                        ->with('success', 'place created successfully');
    }


    public function show(Place $place)
    {
        //
    }


    public function edit(Place $place)
    {
        //
    }

    public function update(Request $request, Place $place)
    {
        //
    }

    public function destroy(Place $place)
    {
        $place->delete();
        return back()->with('success', 'place deleted successfully');
    }
    
    public function dashboard(){
        $places = Place::latest()->paginate(4);
        $places_count = Place::all()->count();
        return view('places.dashboard', ['places' => $places, 'places_count' => $places_count]);
    }
}
