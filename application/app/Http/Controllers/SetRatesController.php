<?php

namespace App\Http\Controllers;

use App\FuelRate;
use App\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetRatesController extends Controller
{
    public function index()
    {
        $data['code_types'] = DB::table('tblcodetype')->get();
        return view('admin.set-rates.index', $data);
    }

    public function saveCodeType(Request $request)
    {
        $this->validate($request, [
            'CodeType' => 'required|unique:tblcodetype',
            'ShortCode' => 'required|unique:tblcodetype',
        ]);

        DB::table('tblcodetype')->insert([
            'CodeType' => $request->CodeType,
            'ShortCode' => $request->ShortCode,
        ]);
        DB::table('tblfuelrate')->insert([
            'FRatePerLtr' => number_format(0,2),
            'FRatePerUnit' => number_format(0,2),
            'CodeType' => $request->CodeType,
        ]);
        $this->setSuccess('Code Type Create Successfully');
        return redirect()->route('set.rates');
    }

    public function saveRate(Request $request)
    {
        $this->validate($request, [
            'TCode' => 'required|not_in:0',
            'FRate' => 'required',
            'TRate' => 'required',
            'Rate' => 'required',
        ]);

        DB::table('tblrates')->insert([
            'TCode' => $request->TCode,
            'FRate' => $request->FRate,
            'TRate' => $request->TRate,
            'Rate' => $request->Rate,
        ]);
        $this->setSuccess('Rate Create Successfully');
        return redirect()->route('set.rates');
    }

    public function addFuelSurCharge(Request $request)
    {
        $this->validate($request, [
            'tariff_code' => 'required|not_in:0',
            'FRatePerLtr' => 'required',
            'FRatePerUnit' => 'required',
        ]);
        $fuel_rate = FuelRate::where('CodeType', $request->tariff_code)->first();
//        return $fuel_rate;
        DB::table('tblruelrate')->where('CodeType', $request->tariff_code)->update([
            'FRatePerLtr' => $fuel_rate->FRatePerLtr + $request->FRatePerLtr,
            'FRatePerUnit' => $fuel_rate->FRatePerUnit + $request->FRatePerUnit,
        ]);
        $this->setSuccess('Fuel Rate Create Successfully');
        return redirect()->route('set.rates');
    }

    public function selectLtrUnit($CodeType)
    {
        $fuel_rate = FuelRate::where('CodeType', $CodeType)->first();
        return $fuel_rate;
    }

    public function selectCodeRangeRate($CodeType)
    {
        $fuel_rate = Rate::where('TCode', $CodeType)->get();
        return $fuel_rate;
    }

    public function deleteCodeType(Request $request)
    {
        if (!empty($request->TrCode)){
            DB::table('tblcodetype')
                ->where('CodeType',  $request->TrCode)
                ->delete();
            DB::table('tblfuelrate')
                ->where('CodeType',  $request->TrCode)
                ->delete();
            $this->setSuccess('Code Type Delete Successfully');
            return redirect()->route('set.rates');
        }else{
            $this->setError('Code Type Not Selected');
            return redirect()->route('set.rates');
        }
    }
}
