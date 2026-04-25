<x-layout>
    <x-slot:title>
        Add New City
    </x-slot:title>

    <div class="max-w-xl mx-auto mt-10">
        <div class="card bg-base-100 shadow-md">
            <div class="card-body">

                <h2 class="card-title text-2xl font-semibold">
                    Add City
                </h2>
                <p class="text-sm text-base-content/70">
                    Add Your Favorite City.
                </p>

                <form method="POST" action="/cities">
                    @csrf

                    {{-- City Name --}}
                    <div class="form-control mt-6">
                        <label class="label">
                            <span class="label-text font-medium">City Name</span>
                        </label>
                        <input
                            type="text"
                            name="name"
                            placeholder="e.g., Los Angeles"
                            class="input input-bordered w-full"
                            required />
                    </div>

                    {{-- Country Select --}}
                    <div class="form-control mt-4">
                        <label class="label">
                            <span class="label-text font-medium">Country</span>
                        </label>
                        <select name="country_id" class="select select-bordered w-full" required>
                            <option disabled selected>Select a country</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}">
                                {{ $country->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Actions --}}
                    <div class="flex justify-end gap-3 mt-8">
                        <a href="/" class="btn btn-ghost">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Add City
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-layout>