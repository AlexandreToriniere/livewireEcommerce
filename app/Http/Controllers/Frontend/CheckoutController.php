<?php

namespace App\Http\Controllers\frontend;

use Stripe\Stripe;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartTotalQuantity = \Cart::getTotalQuantity();
        return view('frontend/checkout', compact('cartTotalQuantity'));
    }


 //Stripe Payment
    public function session(Request $request)
    {
        $productname = $request->get('productname');
        $totalprice = $request->get('total');
        $two0 = "00";
        $total = "$totalprice$two0";
        $session = Session::create([
            $stripe =Stripe::setApiKey("sk_test_51L315DE6SA4XJlM8r0szc44DOR5AZVJqvKGQxEYFxS38MuEy3KTdMngyNxcFlHVV3WPw3G5XszWxCA1DyQymNf3h00MogXWg03"),
            'line_items'  => [
                [
                    'price_data' => [
                        //  session()->has('coupon') ? \Cart::getTotal() - session()->get('coupon')['discount'] : \Cart::getTotal(),
                        'currency'     => 'EUR',
                        'product_data' => [
                            "name" => $productname,
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity'   => 1,
                ],

            ],
            'mode'        => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url'  => route('checkout.index'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        \Cart::clear();
        return "Thanks for your order. You have just completed your payment. The seeler will reach out to you as soon as possible";
    }


    public function store(Request $request)
    {
        \Cart::add($request->id, $request->name,$request->price, 1, array())->associate('App\Models\Product');
        return redirect()->route('checkout.index')->with('success_message', 'Produit ajouté à votre panier');
    }

    public function destroy($rowId)
    {
        \Cart::remove($rowId);
        return back()->with('success', 'Le produit a bien été supprimer du panier');
    }

    public function reset(){
        \Cart::clear();
    }
}
