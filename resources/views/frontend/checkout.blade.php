<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        @layer utilities {
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }
      }
    </style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<!-- component -->
<!-- Create By Joker Banny -->
<body>
  <header>
    <div class="container mx-auto px-6 py-3">
        <div class="flex  justify-between">
            <div class=" flex justify-end w-full text-gray-700 md:text-center text-2xl font-semibold">
                Hoopers Island 974
            </div>
           <a>

           </a>
            <div class="flex items-center justify-end w-full">
                <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none mx-4 sm:mx-0">
                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </button>

                <div class="flex sm:hidden">
                    <button @click="isOpen = !isOpen" type="button" class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500" aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                            <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-4">
            <div class="flex flex-col sm:flex-row">
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Accueil</a>
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="{{route('products.index') }}">Produits</a>
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Contact</a>
            </div>
        </nav>
    </div>
</header>
  <div class="h-screen bg-gray-100 pt-20">
    @if($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{$message}}
      </div>
    @endif
    <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
      <div class="rounded-lg md:w-2/3">
        @foreach (Cart::getContent() as $item)
        <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
          <img src="{{ Storage::url($item->model->image) }}" alt="product-image" class="w-full rounded-lg sm:w-40" />
          <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
            <div class="mt-5 sm:mt-0">
              <h2 class="text-lg font-bold text-gray-900">{{$item->name}}</h2>
              <p class="mt-1 text-xs text-gray-700">{{$item->price}}€</p>
              <h1 class="text-lg  text-gray-900">{{$item->model->description}}</h1>
            </div>
            <div class="mt-4 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
              <div class="flex items-center border-gray-100">
                <input disabled ="h-8 w-8 border bg-white text-center text-xs outline-none" type="text" value="{{ $item->quantity }}" min="1" />
              </div>
              <div class="flex">
                <td >
                  <form action="{{route('checkout.destroy', $item->id)}}" method="POST">
                      @csrf
                      @method("DELETE")
                      <button type="submit">Effacer</button>
                  </form>
                  <div class="flex items-center space-x-4">
                    <a href="{{route('checkout.reset')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                  </div>
                </td>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        {{dump(Cart::getContent())}};
      </div>

      <!-- Sub total -->
      <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
        <div class="mb-2 flex justify-between">
        <ul>
            <li class="text-gray-700">Subtotal: {{ Cart::getSubTotal()}}€</li>

            @if(session()->has('coupon'))
                <li class="text-gray-700 ">Discount {{session()->get('coupon')['name']}} - {{session()->get('coupon')['discount']}}€</li>
                <form action="{{ route('coupon.destroy') }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit">Effacer coupon</button>
                    <button>
                </form>
            @endif
            {{-- <li class="text-sm text-gray-700">including VAT</li> --}}
         </ul>
        </div>
        {{-- <div class="mb-2 flex justify-between">
          <p class="text-gray-700">Taxe</p>
          <p class="text-gray-700">$129.99</p>
        </div> --}}
        {{-- <div class="flex justify-between">
          <p class="text-gray-700">Shipping</p>
          <p class="text-gray-700">$4.99</p>
        </div> --}}
        <hr class="my-4" />
        <div class="flex justify-between">
          <p class="text-lg font-bold">Total: </p>
            {{session()->has('coupon')
                ? Cart::getTotal() - session()->get('coupon')['discount']
                : Cart::getTotal()
            }}€
        </div>


        <form action="{{route('coupon.store')}}" method="POST">
            {{ csrf_field() }}
            <div>
                <input class="mt-6 w-full rounded-md bg-grey-500 py-1.5 font-medium text-black-50 hover:bg-grey-600" type="text" name="coupon" id="coupon" placeholder="Coupon code">
                <button type="submit" class="mt-6 w-full"  placeholder="Coupon Code?">
                    Envoyer
                </button>
            </div>
        </form>
        <form action="/session" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="total" value={{session()->has('coupon')
            ? Cart::getTotal() - session()->get('coupon')['discount']
            : Cart::getTotal()
        }}>
            <input type="hidden" name="productname" value="Cookie">
            <button  type="submit" class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check out</button>
            <a href="{{route('products.index')}}"class="flex items-center border-gray-100">Continuez votre shopping</a>
        </form>
      </div>
    </div>
  </div>
</body>
