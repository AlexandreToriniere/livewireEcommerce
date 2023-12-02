@extends('layouts.master')
@section('content')
<!-- component -->
<section class="text-gray-700 body-font overflow-hidden bg-white">
    <div class="container px-5 py-24 mx-auto">
      <div class="lg:w-4/5 mx-auto flex flex-wrap">
        <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="{{ Storage::url($product->image) }}">
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          <h1 class="text-gray-900  text-center text-3xl title-font font-medium mb-1">{{$product->name}}</h1>
          <p class="leading-relaxed">Fam locavore kickstarter distillery. Mixtape chillwave tumeric sriracha taximy chia microdosing tilde DIY. XOXO fam indxgo juiceramps cornhole raw denim forage brooklyn. Everyday carry +1 seitan poutine tumeric. Gastropub blue bottle austin listicle pour-over, neutra jean shorts keytar banjo tattooed umami cardigan.</p>
          <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
            <div class="flex ml-6 items-center">
              <div class="relative">
                {{-- <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                    <path d="M6 9l6 6 6-6"></path>
                  </svg>
                </span> --}}
              </div>
            </div>
          </div>
          <div class="flex">
            <span class="title-font font-medium text-2xl text-gray-900">{{$product->price}}€</span>
              <form action="{{route('checkout.store')}}" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{$product->id}}">
              <input type="hidden" name="name" value="{{$product->name}}">
              <input type="hidden" name="price" value="{{$product->price}}">
              <input type="number" max="10" name="quantity" >
              <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Ajouter au panier</button>
          </div>
        </div>
      </div>
    </div>
  </section>

 @stop
