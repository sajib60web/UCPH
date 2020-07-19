<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        return view('admin.payments.index');
    }

    public function paymentReceiptPrint(Request $request)
    {
        return 'Payment Receipt Print';
    }

    public function collectPayment()
    {
        $data['customers'] = DB::table('tblregister')->get();
        return view('admin.payments.collect-payment', $data);
    }

    public function selectCustomerInfo($id)
    {
        $customer = Customer::find($id);
        return $customer;
    }
}
