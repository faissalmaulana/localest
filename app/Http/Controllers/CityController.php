<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $countries = Country::get(["id", "name"]);
            return view("pages.city.create", ["countries" => $countries]);
        } catch (\Throwable $e) {
            report($e);

            return back()->withErrors([
                "error" => "Something went wrong",
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "country_id" => "required|uuid|exists:countries,id",
        ]);

        try {
            $request->user()->cities()->create($validated);
        } catch (\Throwable $e) {
            report($e);

            return back()->withErrors([
                "error" => "Something went wrong",
            ]);
        }


        return redirect('/')->with('success', 'City created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
