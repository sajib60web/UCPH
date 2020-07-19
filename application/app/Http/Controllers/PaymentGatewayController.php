<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentGatewayController extends Controller
{
    public function index()
    {
        return view('admin.payment-gateway.index');
    }
}
