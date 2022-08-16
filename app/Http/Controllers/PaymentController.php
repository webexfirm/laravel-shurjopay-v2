<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;

class PaymentController extends Controller
{
    public function initiatePayment(Request $request)
    {
        $info = array( 
            'currency' => "BDT",
            'amount' => 120, 
            'order_id' => "Sh556HJjdP", 
            'discount_amount' =>0 , 
            'disc_percent' =>0 , 
            'client_ip' => "127.0.0.1", 
            'customer_name' => "Sabbir Alam", 
            'customer_phone' => "01700000000", 
            'email' => "test@gmail.com", 
            'customer_address' => "Daben babu road", 
            'customer_city' => "Khulna", 
            'customer_state' => "Khulna", 
            'customer_postcode' => "1212", 
            'customer_country' => "BD",
        );

        $shurjopay_service = new ShurjopayController();
        return $shurjopay_service->checkout($info);
    }



    public function verifyPayment(Request $request)
    {
       
        $order_id = $request->order_id;
        $shurjopay_service = new ShurjopayController();
        $data = $shurjopay_service->verify($order_id);
        return view('success-page');

    }
}
