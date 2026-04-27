<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Place;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class PlaceController extends Controller
{
    use AuthorizesRequests;

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
    public function create(City $city)
    {
        return view("pages.place.create", ["city" => $city]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "city_id" => "required|exists:cities,id",
            "name" => "required|string|max:255",
            "description" => "nullable|string|max:255",
            "category" => "nullable|string|max:255",
            "notes" => "nullable|string|max:255",
            "image_url" => "nullable|image|max:2048",
        ]);

        $city = $request->user()
            ->cities()
            ->findOrFail($validated['city_id']);

        $this->authorize("update", $city);

        $imagePath = null;

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('images');

            if ($imagePath === false) {
                return back()->withErrors([
                    "image_url" => "Failed to upload image.",
                ]);
            }
        }

        try {
            $city->places()->create([
                "name" => $validated["name"],
                "description" => $validated["description"],
                "category" => $validated["category"],
                "notes" => $validated["notes"],
                "image_url" => $imagePath,
            ]);
        } catch (\Throwable $err) {
            report($err);

            // cleanup only if the image was stored
            if (is_string($imagePath)) {
                Storage::disk('local')->delete($imagePath);
            }

            return back()->withErrors([
                "error" => "Something went wrong",
            ]);
        }

        return redirect("/cities/{$validated['city_id']}")->with('success', 'Place created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        //
    }
}
