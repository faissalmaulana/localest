<x-layout>
    <x-slot:title>
        {{$city->name}}
    </x-slot:title>


    <div class="flex">
        <div class="card bg-base-100 w-96 shadow-sm">
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
                        <button class="btn btn-soft btn-error btn-block" type="submit">Delete City</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>