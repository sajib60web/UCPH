<?php

namespace App\Http\Controllers;

use App\Meter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillingController extends Controller
{
    public function index()
    {
        return view('admin.billing.index');
    }

    public function createBill()
    {
        $data['current_owners'] = DB::table('tblmeter')
            ->join('tblregister', 'tblmeter.AcNo', '=', 'tblregister.AcNo')
            ->select('tblmeter.*', 'tblregister.CEName')
            ->get();
        return view('admin.billing.create-bill', $data);
    }

    public function selectCreateBillInfo($id)
    {
        $meter = Meter::with('customer')->find($id);
        return $meter;
    }

    public function dueBill()
    {
        return view('admin.billing.due-bill');
    }

    public function billPrintAndDelete(Request $request)
    {
        if ($request->printBill == 'printBill'){
            $this->setSuccess('Bill Print Successfully');
            return redirect()->route('manage.bill');
        }else{
            $this->setSuccess('Bill Delete Successfully');
            return redirect()->route('manage.bill');
        }
    }
}
