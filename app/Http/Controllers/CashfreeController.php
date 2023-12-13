<?php

namespace App\Http\Controllers;

use Cashfree\CfPaymentService;

class CashfreeController extends Controller
{
    public function initiatePayment(Request $request)
    {
        $orderId = $request->get('orderId');
        $orderAmount = $request->get('orderAmount');
        $orderCurrency = 'INR';

        $cfPaymentService = new CfPaymentService($api_key, $api_secret_key, $env);
        $tokenData = $cfPaymentService->getTokenData();
        $token = $tokenData['cftoken'];

        $postData = array(
            'appId' => $app_id,
            'orderId' => $orderId,
            'orderAmount' => $orderAmount,
            'orderCurrency' => $orderCurrency,
            'customerName' => 'John Doe',
            'customerEmail' => 'johndoe@example.com',
            'customerPhone' => '9876543210',
            'notifyUrl' => url('cashfree/response'),
            'returnUrl' => url('cashfree/response'),
            'tokenData' => $token
        );

        $paymentLink = $cfPaymentService->getPaymentLink($postData);

        return redirect($paymentLink);
    }

    public function handlePaymentResponse(Request $request)
    {
        $cfPaymentService = new CfPaymentService($api_key, $api_secret_key, $env);
        $paymentStatus = $cfPaymentService->getOrderStatus($request->get('orderId'));

        if ($paymentStatus['orderStatus'] == 'PAID') {
            return 'Payment successful!';
        } else {
            return 'Payment failed!';
        }
    }
}
