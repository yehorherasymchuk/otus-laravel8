<?php
/**
 * Description of SessionCreate.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Http\Controllers\Payments\Stripe\Checkout;


use Illuminate\Routing\Controller;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class SessionCreate extends Controller
{

    public function __invoke()
    {

        Stripe::setApiKey('sk_test_51HpF3yEQMEXGYahWkgReeyEIOS9j1prfTm0OimYjfMtIYZwYT3GJe2RjRq51WbYDMAWx41Wd25S6Of752Z6vVBI7004DqOTXSa');

        $checkout_session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => 2000,
                    'product_data' => [
                        'name' => 'Stubborn Attachments',
                        'images' => ["https://i.imgur.com/EHyR2nP.png"],
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => config('app.url') . '/success.html',
            'cancel_url' => config('app.url') . '/cancel.html',
        ]);

        return response()->json(['id' => $checkout_session->id]);
    }

}
