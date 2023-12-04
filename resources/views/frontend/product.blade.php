@extends('layouts.master')
@section('content')


    <main class="my-8">
        <div class="container mx-auto px-6">
            <div class="mt-16">
                <h3 class=" flex justify-center text-gray-600 text-2xl font-medium">Produits</h3>
                <div class=" ml-20 grid gap-7 grid-cols- sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    <!-- Produits boucle-->
                    @foreach ($products as $product)
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('{{ Storage::url($product->image) }}')">
                        </div>
                        <div class="px-5 py-3">
                            <a href="{{route('products.show', $product->slug )}}"class="text-gray-700 uppercase">{{$product->name}}</a>
                            <span class="text-gray-500 mt-2">{{$product->price}}€</span>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Produits boucle-->
                </div>
            </div>
        </div>
    </main>
@stop
