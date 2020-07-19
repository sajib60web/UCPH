<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Meter;

class MeterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $customers = DB::table('tblregister')->orderBy('id', 'ASC')->get();
        return view('admin.meters.index', compact('customers'));
    }


    public function changeOwnerShip()
    {
        $data['current_owners'] = DB::table('tblmeter')
            ->join('tblregister', 'tblmeter.AcNo', '=', 'tblregister.AcNo')
            ->select('tblmeter.*', 'tblregister.CEName')
            ->get();

        $data['replacing_owners'] = DB::table('tblregister')->get();
       // return $data['current_owners'];
        return view('admin.meters.change-owner-ship', $data);
    }

    public function selectCurrentOwnerInfo($id)
    {
        $meter = Meter::with('customer')->find($id);
        return $meter;
    }

    public function selectReplacingOwnerInfo($id)
    {
        $customer = Customer::find($id);
        return $customer;
    }

    public function saveChangeOwnerShip(Request $request)
    {
        $this->validate($request, [
            'MeterNo' => 'required',
            'rAcNo' => 'required',
            'EServingAdd' => 'required',
            'TrCode' => 'required|not_in:0',
        ]);

        $meter = Meter::where('MeterNo', $request->MeterNo)->first();
        $meter->AcNo = $request->rAcNo;
        $meter->EServingAdd = $request->EServingAdd;
        $meter->TrCode = $request->TrCode;
        $meter->save();
        $this->setSuccess('Change Owner Ship Successfully');
        return redirect()->route('change.owner.ship');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        return $request;
        $this->validate($request, [
            'AcNo' => 'required',
            'MeterNo' => 'required',
            'PrevRead' => 'required',
            'PrevRDate' => 'required',
            'EServingAdd' => 'required',
            'DServingAdd' => 'required',
            'TrCode' => 'required|not_in:0',
        ]);

        DB::table('tblmeter')->insert([
            'AcNo' => $request->AcNo,
            'MeterNo' => $request->MeterNo,
            'PrevRead' => $request->PrevRead,
            'PrevRDate' => $request->PrevRDate,
            'EServingAdd' => $request->EServingAdd,
            'DServingAdd' => $request->DServingAdd,
            'TrCode' => $request->TrCode,
            'Status' => 1,
        ]);
        $this->setSuccess('Meter Create Successfully');
        return redirect()->route('meters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $customer = DB::table('tblregister')->where('id', $id)->first();
        return view('admin.meters.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
