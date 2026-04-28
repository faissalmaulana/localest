<x-layout>
    <x-slot:title>
        Detail Page
    </x-slot:title>

    <a href="/cities/{{$place->city_id}}" class="inline-flex items-center gap-2 text-md hover:underline">
        <span class="shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left-icon lucide-arrow-left">
                <path d="m12 19-7-7 7-7" />
                <path d="M19 12H5" />
            </svg>
        </span>
        <span>Back</span>
    </a>

    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="w-full overflow-hidden">
            @if($place->image_url)
            <img
                src="{{asset($place->image_url)}}"
                alt="Place Image"
                class="w-full h-[320px] object-cover">
            @else
            <img
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/LizzyMcAlpine-byPhilipRomano.jpg/960px-LizzyMcAlpine-byPhilipRomano.jpg"
                alt="Alternative Place Image"
                class="w-full h-[320px] object-cover">
            @endif
        </div>

        <div class="mt-6">
            <div class="flex items-end gap-2 text-sm text-base-content/60">
                <div class="badge badge-outline badge-primary">{{ucfirst($place->category ?? 'Uncategorized')}}</div>
                <div class="flex gap-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-icon lucide-calendar">
                        <path d="M8 2v4" />
                        <path d="M16 2v4" />
                        <rect width="18" height="18" x="3" y="4" rx="2" />
                        <path d="M3 10h18" />
                    </svg>
                    <span>{{$place->created_at->format('M D Y')}}</span>
                </div>
            </div>

            <h1 class="text-2xl font-semibold mt-4">
                {{ucwords($place->name)}}
            </h1>

            <div class="text-sm text-base-content/70 mt-1 flex items-start gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-icon lucide-map-pin">
                    <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                    <circle cx="12" cy="10" r="3" />
                </svg>
                <span>
                    {{ implode(', ', array_filter([
                        $place?->address,
                        $place?->city?->name,
                        $place?->city?->country?->name,
                    ])) }}
                </span>
            </div>
        </div>

        <div class="divider"></div>

        @if(!empty($place->description))
        <div class=" mt-6">
            <h2 class="text-xs font-semibold tracking-wide text-base-content/60 mb-2">
                DESCRIPTION
            </h2>
            <div class="p-4 bg-base-100 shadow-sm rounded-sm">
                <p class="text-sm leading-relaxed text-base-content/80">
                    {{ $place->description }}
                </p>
            </div>
        </div>
        @endif

        @if(!empty($place->notes))
        <div class="mt-6">
            <h2 class="text-xs font-semibold tracking-wide text-base-content/60 mb-2">
                NOTES
            </h2>
            <div class="p-4 bg-base-100 shadow-sm rounded-sm">
                <p class="text-sm  leading-relaxed text-base-content/80">
                    {{ $place->notes }}
                </p>
            </div>
        </div>
        @endif

    </div>
</x-layout>