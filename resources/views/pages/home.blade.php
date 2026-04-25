<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>

    <div class="max-w-6xl mx-auto mt-10 px-4">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 border-b border-b-gray-300 pb-8">
            <div>
                <h1 class="text-3xl font-semibold">My Places</h1>
                <p class="text-base-content/70 mt-1">
                    Your collection of favorite places.
                </p>
            </div>

            <div class="flex items-center gap-2">
                <a href="/add-new-city" class="btn btn-primary">
                    New City
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">

            @auth
            @forelse ($cities as $city)
            <div class="card bg-base-100 border shadow-sm">
                <div class="card-body">
                    <div class="flex justify-between">
                        <h2 class="text-lg font-medium">
                            {{ $city->name . ', ' . ($city->country?->iso2_code ?? 'UNK') }}
                        </h2>
                        <span class="badge badge-secondary">34 Places</span>
                    </div>
                    <p class="text-sm text-base-content/70 mt-6">
                        Last updated {{ $city->updated_at->format('M Y') }}
                    </p>
                </div>
            </div>
            @empty
            <div class="col-span-full">
                <div class="flex flex-col items-center justify-center text-center py-16">
                    <h2 class="text-lg font-medium">No cities yet</h2>
                    <p class="text-base-content/70 mt-2">
                        Start building your collection by adding your first city.
                    </p>
                </div>
            </div>
            @endforelse
            @endauth

            @guest
            <div class="col-span-full">
                <div class="flex flex-col items-center justify-center text-center py-16">
                    <h2 class="text-lg font-medium">Welcome</h2>
                    <p class="text-base-content/70 mt-2 max-w-md">
                        Log in to start saving your favorite cities.
                    </p>
                </div>
            </div>
            @endguest
        </div>
    </div>
</x-layout>