<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $customers = DB::table('tblregister')->orderBy('id', 'ASC')->get();
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $customers = DB::table('tblregister')
            ->orderByRaw('id', 'DESC')
            ->get();
        $customerId = '';
        foreach ($customers as $customer){
            $customerId = $customer->id + 1;
        }

        if ($customerId){
            $customer_id = $customerId;
        }else{
            $customer_id = 1;
        }
        $data['customer_id'] = str_pad($customer_id, 6, "0", STR_PAD_LEFT);
        return view('admin.customers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'AcNo' => 'required',
            'CEName' => 'required',
            'CEAddress' => 'required',
            'CEIdCard' => 'required',
            'CECity' => 'required',
            'CEPhone' => 'required',
        ]);

        DB::table('tblregister')->insert([
            'AcNo' => $request->AcNo,
            'CEName' => $request->CEName,
            'CEAddress' => $request->CEAddress,
            'CEIdCard' => $request->CEIdCard,
            'CECity' => $request->CECity,
            'CEPhone' => $request->CEPhone,
            'CDName' => $request->CDName,
            'CDAddress' => $request->CDAddress,
            'RegDate' => date('Y-m-d H:i:s'),
        ]);
        $this->setSuccess('Customer Create Successfully');
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $customer = DB::table('tblregister')->where('id', $id)->first();
        return view('admin.customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'AcNo' => 'required',
            'CEName' => 'required',
            'CEAddress' => 'required',
            'CEIdCard' => 'required',
            'CECity' => 'required',
            'CEPhone' => 'required',
        ]);

        DB::table('tblregister')->where('id', $id)->update([
            'AcNo' => $request->AcNo,
            'CEName' => $request->CEName,
            'CEAddress' => $request->CEAddress,
            'CEIdCard' => $request->CEIdCard,
            'CECity' => $request->CECity,
            'CEPhone' => $request->CEPhone,
            'CDName' => $request->CDName,
            'CDAddress' => $request->CDAddress,
            'RegDate' => date('Y-m-d H:i:s'),
        ]);
        $this->setSuccess('Customer Update Successfully');
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        DB::table('tblregister')->where('id',  $id)->delete();
        $this->setSuccess('Customer Delete Successfully');
        return redirect()->route('customers.index');
    }
}
