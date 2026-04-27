<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            /** @var \App\Models\User $user */
            $user = Auth::user();

            $cities = $user?->cities()
                ->select('id', 'name', 'country_id', 'updated_at')
                ->with('country:id,iso2_code')
                ->get();


            return view('pages.home', ["cities" => $cities]);
        } catch (\Throwable $e) {
            report($e);

            return back()->withErrors([
                "error" => "Something went wrong",
            ]);
        }
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
            "country_id" => "uuid|exists:countries,id",
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
    public function show(City $city)
    {
        return view("pages.city.detail", ["city" => $city]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $this->authorize("update", $city);

        $countries = Country::get(["id", "name"]);

        return view("pages.city.edit", ["city" => $city, "countries" => $countries]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $this->authorize("update", $city);

        $validated = $request->validate([
            "name" => "required|string|max:255",
            "country_id" => "uuid|exists:countries,id",
        ]);

        try {
            $city->updateOrFail($validated);
        } catch (\Throwable $e) {
            report($e);

            return back()->withErrors([
                "error" => "Something went wrong",
            ]);
        }

        return redirect('/')->with('success', 'City updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $this->authorize("delete", $city);

        try {
            $city->delete();
        } catch (\Throwable $e) {
            report($e);

            return back()->withErrors([
                "error" => "Something went wrong",
            ]);
        }

        return redirect('/')->with('success', 'City deleted!');
    }
}
