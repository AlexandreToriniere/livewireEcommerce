
@extends('layouts.master')
@section('content')

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
              <p class="mt-1 text-s text-gray-700">{{$item->price}}€</p>
            </div>
            <div class="mt-4 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
              <div class="flex items-center border-gray-100">
                <input disabled ="h-8 w-8 border bg-white text-center text-xs outline-none" type="text" value="{{ $item->quantity }}"  />
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
         </ul>
        </div>

        <!-- To do-->
        <div class="mb-2 flex justify-between">
            <p class="text-gray-700">Items du panier</p>
            <p class="text-gray-700">$129.99</p>
          </div>
        <!-------------------Taxe--------------------------->
         <div class="mb-2 flex justify-between">
          <p class="text-gray-700">Taxe</p>
          <p class="text-gray-700">$129.99</p>
        </div>
        {{-- <div class="flex justify-between">
          <p class="text-gray-700">objet</p>
          <p class="text-gray-700">{{Cart::getTotalQuantity()}}</p>
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
            <input type="hidden" name="productquantity" value="{{Cart::getTotalQuantity()}}">

            <button  type="submit" class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check out</button>
            <a href="{{route('products.index')}}"class="flex items-center border-gray-100">Continuez votre shopping</a>
        </form>
      </div>
    </div>
</div>

@stop

