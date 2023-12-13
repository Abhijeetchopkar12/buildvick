<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

class CashfreePaymentController extends Controller
{
     public function create(Request $request)
     {
          return view('frontend.payment-create');
     }

     public function store(Request $request)
     {
          $validated = $request->validate([
               'first_name' => 'required|min:3',
               'last_name'=> 'required',
               'email' => 'required',
               'mobile' => 'required',
               'address' => 'required',
          ]);
               
          $url = "https://sandbox.cashfree.com/pg/orders";

          $headers = array(
               "Content-Type: application/json",
               "x-api-version: 2022-01-01",
               "x-client-id: ".env('CASHFREE_API_KEY'),
               "x-client-secret: ".env('CASHFREE_API_SECRET')
          );

          $data = json_encode([
               'order_id' =>  'order_'.rand(1111111111,9999999999),
               // 'order_id' =>  'order_id',
               'order_amount' => 'price',
               "order_currency" => "INR",
               "customer_details" => [
                    "customer_id" => 'customer_'.rand(111111111,999999999),
                    "customer_first_name" => $validated['first_name'],
                    "customer_last_name" => $validated['last_name'],
                    "customer_address" => $validated['address'],
                    "customer_email" => $validated['email'],
                    "customer_phone" => $validated['mobile'],
               ],
               "order_meta" => [
                    "return_url" => 'http://127.0.0.1:8000/cashfree/payments/success/?order_id={order_id}&order_token={order_token}'
               ]
          ]);

          $curl = curl_init($url);

          curl_setopt($curl, CURLOPT_URL, $url);
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

          $resp = curl_exec($curl);

          curl_close($curl);

          return redirect()->to(json_decode($resp)->payment_link);
     }

     public function success(Request $request)
     {
          dd($request->all()); // PAYMENT STATUS RESPONSE
     }
}