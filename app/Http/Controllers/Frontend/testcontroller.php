<?php

namespace App\Http\Controllers\frontend;

use Stripe\Stripe;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Http\Controllers\Controller;

class testcontroller extends Controller
{
    public function index()
    {
        return view('frontend/test');
    }

    public function session(Request $request)
    {
        Stripe::setApiKey(\getenv('STRIPE_SECRET'));

        $productname = $request->get('productname');
        $totalprice = $request->get('total');
        $two0 = "00";
        $total = "$totalprice$two0";

        $session = Session::create([
            'line_items'  => [
                [
                    'price_data' => [
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
            'success_url' => route('test.success'),
            'cancel_url'  => route('test.index'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return "Thanks for your order. You have just completed your payment. The seeler will reach out to you as soon as possible";
    }


    public function store(Request $request)
    {
        \Cart::add($request->id, $request->name,$request->price, 1, array())->associate('App\Models\Product');
        return redirect()->route('test.index')->with('success_message', 'Produit ajouté à votre panier');
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
