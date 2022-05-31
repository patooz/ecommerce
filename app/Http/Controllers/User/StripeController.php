<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    {
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51L2ZO8H3fDYOvUrAE0Q9S8lTjmMGqs32GcUFM50w1iXWrSCk7PY6zK6grkpygHaeTOLvDWr1rLbSWTNMtK775E2P003gXvEBtW');

        // Token is created using Stripe Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
        'amount' => 999*100,
        'currency' => 'usd',
        'description' => 'Ndonyo Online Shop',
        'source' => $token,
         'metadata'=>['order_id'=>'6735']
        ]);
        dd($charge);
            }
}
