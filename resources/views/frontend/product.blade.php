<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/90e5d45df5.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
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
                                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Acceuil</a>
                                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="{{route('products.index') }}">Produits</a>
                                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Contact</a>
                            </div>
                        </nav>
                    </div>
                </header>
                <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-medium text-gray-700">Your cart</h3>
                        <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                    <hr class="my-3">
                    <div class="flex justify-between mt-6">
                        <div class="flex">
                            <img class="h-20 w-20 object-cover rounded" src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80" alt="">
                            <div class="mx-3">
                                <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
                                <div class="flex items-center mt-2">
                                    <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </button>
                                    <span class="text-gray-700 mx-2">2</span>
                                    <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <span class="text-gray-600">20$</span>
                    </div>
                    <div class="flex justify-between mt-6">
                        <div class="flex">
                            <img class="h-20 w-20 object-cover rounded" src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80" alt="">
                            <div class="mx-3">
                                <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
                                <div class="flex items-center mt-2">
                                    <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </button>
                                    <span class="text-gray-700 mx-2">2</span>
                                    <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <span class="text-gray-600">20$</span>
                    </div>
                    <div class="flex justify-between mt-6">
                        <div class="flex">
                            <img class="h-20 w-20 object-cover rounded" src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80" alt="">
                            <div class="mx-3">
                                <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
                                <div class="flex items-center mt-2">
                                    <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </button>
                                    <span class="text-gray-700 mx-2">2</span>
                                    <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <span class="text-gray-600">20$</span>
                    </div>
                    <a href="{{route('checkout.index')}}" class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                        <span>Chechout</span>
                        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
                <main class="my-8">
                    <div class="container mx-auto px-6">
                        <div class="mt-16">
                            <h3 class=" flex justify-center text-gray-600 text-2xl font-medium">Produits</h3>
                            <div class=" ml-20 grid gap-7 grid-cols- sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                                <!-- Produits boucle-->
                                @foreach ($products as $product)
                                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                                    <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('{{ Storage::url($product->image) }}')">
                                        <button @click="cartOpen = !cartOpen" class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>                
                                        </button>
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
                        <div class="mt-16 ">
                            <h3 class=" flex justify-center text-gray-600 text-2xl font-medium">Fashions</h3>
                            <div class=" ml-20 grid gap-7 grid-cols- sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                                    <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://images.unsplash.com/photo-1590664863685-a99ef05e9f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=345&q=80')">
                                        <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                        </button>
                                    </div>
                                    <div class="px-5 py-3">
                                        <h3 class="text-gray-700 uppercase">woman mix</h3>
                                        <span class="text-gray-500 mt-2">$12</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            
                <footer class="bg-gray-200">
                    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
                        <a href="#" class="text-xl font-bold text-gray-500 hover:text-gray-400">Brand</a>
                        <p class="py-2 text-gray-500 sm:py-0">All rights reserved</p>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>
