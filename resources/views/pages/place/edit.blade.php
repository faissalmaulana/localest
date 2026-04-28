<x-layout>
    <x-slot:title>
        Edit Place
    </x-slot:title>

    <div class="max-w-4xl mx-auto mt-10">
        <div class="card bg-base-100 shadow-md">
            <div class="card-body">

                <h2 class="card-title text-2xl font-semibold">
                    Edit Place
                </h2>
                <form method="POST" action="/places/{{$place->id}}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <input name="city_id" value="{{$city->id}}" hidden />
                    <div class="grid grid-cols-2 gap-x-2">
                        <div class="form-control mt-6">
                            <label class="label">
                                <span class="label-text font-medium">Place Name<span class="text-red-500">*</span> </span>
                            </label>
                            <input
                                type="text"
                                autofocus
                                name="name"
                                value="{{old('name',$place->name)}}"
                                placeholder="e.g., Kopi Kenangan"
                                class="input input-bordered w-full"
                                required />

                            @error('name')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-control mt-6">
                            <label class="label">
                                <span class="label-text font-medium">Category</span>
                            </label>
                            <input
                                type="text"
                                name="category"
                                placeholder="e.g., Coffee Shop"
                                value="{{old('category',$place->category)}}"
                                class="input input-bordered w-full" />

                            @error('category')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-control mt-6 self-center">
                            <label class="label">
                                <span class="label-text font-medium">Description</span>
                            </label>
                            <input
                                type="text"
                                name="description"
                                value="{{old('description',$place->description)}}"
                                placeholder="e.g., Cozzy Coffee Shop"
                                class="input input-bordered w-full" />

                            @error('description')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-control mt-6 self-center">
                            <label class="label">
                                <span class="label-text font-medium">Address</span>
                            </label>
                            <input
                                type="text"
                                name="address"
                                value="{{old('address',$place->address)}}"
                                placeholder="e.g., 123 Main St"
                                class="input input-bordered w-full" />

                            @error('address')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-control mt-9.5">
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Upload an Image File</legend>
                                <input type="file" class="file-input" name="image_url" />
                                <label class="label">Max size 2MB</label>

                                @error('image_url')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        @if(isset($place->image_url))
                        <div class="col-span-full mt-9.5">
                            <img src="{{asset($place->image_url)}}" class="w-full max-h-[500px] object-contain mx-auto" />
                        </div>
                        @endif
                    </div>

                    <div class="form-control mt-6">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Note</legend>
                            <textarea class="textarea h-24 w-full" name="notes">{{ old('notes', $place->notes) }}</textarea>

                            @error('notes')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </fieldset>
                    </div>


                    {{-- Actions --}}
                    <div class="flex justify-end gap-3 mt-8">
                        <a href="/cities/{{$city->id}}" class="btn btn-ghost">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to edit this place ?')">
                            Edit Place
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-layout>