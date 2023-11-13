<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex  m-2 p-2">
            <a href="{{ route('admin.products.index')}}" class=" px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">product index</a>
        </div>
        <div class="m-2 p-2 bg-slate-100 rounded">
          <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
            <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                  <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                    <div class="mt-1">
                      <input type="text" id="name" value="{{$product->name}}" wire:model.lazy="name" name="name" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>

                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug </label>
                    <div class="mt-1">
                        <input type="text" id="slug" wire:model.lazy="slug" name="slug" value="{{$product->name}}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    <div>
                        <img class="w-32 h-32" src="{{ Storage::url($product->image)}}">
                    </div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Image </label>
                    <div class="mt-3">
                        <input type="file" id="image" wire:model="newImage" name="image" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                      </div>

                      <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                      <div class="mt-1">
                        <textarea id="description" rows="3" name="description" value="{{$product->description}}" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border  rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md  border-red-400 "> {{$product->description}}</textarea>
                      </div>

                    <div class=" mt-7 block text-sm font-medium text-gray-700">
                      <h4>SEO Tags</h4>
                    </div>

                    <label for="meta_title" class="block text-sm font-medium text-gray-700"> Meta_title</label>
                    <div class="mt-1">
                        <input type="text" id="meta_title" wire:model.lazy="meta_title" name="meta_title" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>

                    <label for="meta_key" class="block text-sm font-medium text-gray-700"> Meta_keyword</label>
                    <div class="mt-1">
                        <input type="text" id="meta_key" wire:model.lazy="meta_key" name="meta_key" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>

                    <label for="meta_description" class="block text-sm font-medium text-gray-700">Meta_description</label>
                    <div class="mt-1">
                      <textarea id="meta_description" rows="3" name="meta_description" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border  rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('description') border-red-400 @enderror"></textarea>
                    </div>

                    <label for="status" class="block text-sm font-medium text-gray-700"> Status</label>
                    <div class="mt-1">
                        <input type="checkbox" id="status" wire:model.lazy="status" name="status"  />
                    </div>
                  </div>
                  <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Update</button>
                </form>
              </div>
        </div>
    </div>
</x-admin-layout>
