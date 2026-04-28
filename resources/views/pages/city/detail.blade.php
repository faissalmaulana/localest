<x-layout>
    <x-slot:title>
        {{$city->name}}
    </x-slot:title>


    <div class="flex gap-x-8">
        <div class="card bg-base-100 w-96 shadow-sm max-h-67">
            <div class="card-body">
                <h1 class="text-xl font-medium">Location</h1>
                <h2 class="text-2xl font-semibold">
                    {{ $city->name . ', ' . ($city->country?->name ?? 'UNK') }}
                </h2>
                <div class="divider m-0"></div>
                <div class="card-actions gap-y-4">
                    <a href="/cities/{{$city->id}}/edit" class="btn btn-neutral btn-outline btn-block">Edit City</a>
                    <form method="POST" action="/cities/{{$city->id}}" class="w-full">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-soft btn-error btn-block" type="submit" onclick="return confirm('Are you sure you want to delete this city ?')">
                            Delete City
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex-1">
            <div class="flex justify-between items-end">
                <h2 class="text-2xl font-semibold">Places</h2>
                <a href="/cities/{{$city->id}}/places/new" class="btn btn-primary">
                    New place
                </a>
            </div>
            <div class="divider"></div>

            <ul class="list rounded-box">
                @foreach($city->categoryGroups as $group)
                <li class="p-4 pb-2 text-lg opacity-60 tracking-wide">
                    {{ ucwords($group->category) }}
                </li>

                @foreach($group->items as $place)
                <li class="list-row">
                    <div></div>
                    <div>
                        <a href="/cities/{{$city->id}}/places/{{$place->id}}">{{ ucwords($place->name) }}</a>
                        <div class="text-xs uppercase font-semibold opacity-60">
                            {{ $place->description }}
                        </div>
                    </div>

                    <a href="/cities/{{$city->id}}/places/{{$place->id}}/edit" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pen-icon lucide-pen">
                            <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                        </svg>
                    </a>
                    <form method="POST" action="/places/{{$place->id}}">
                        @csrf
                        @method("DELETE")
                        <input
                            name="city_id"
                            value="{{$city->id}}" hidden />
                        <button class="btn btn-error btn-ghost" type="submit" onclick="return confirm('Are you sure you want to delete this place ?')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-icon lucide-trash">
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6" />
                                <path d="M3 6h18" />
                                <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                            </svg>
                        </button>
                    </form>
                </li>
                @endforeach
                @endforeach
            </ul>
        </div>
    </div>
</x-layout>