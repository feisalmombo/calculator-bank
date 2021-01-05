<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Bank;
use App\AccountTypes;
use App\Currency;
use Session;

class CalculateBankChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function calculateBankCharges()
    {
        $banks = DB::table("banks")->pluck("bank_name","id");

        return view('calculateCharges.calculateBankCharges')
        ->with('banks', $banks);
    }

    public function getAllAccountTypeList(Request $request)
    {
        $accountTypes = DB::table("account_types")
        ->where("bank_id",$request->bank_id)
        ->pluck("accountType_name","id");

        return $accountTypes;
        return response()->json($accountTypes);
    }

    public function getAllCurrencyList(Request $request)
    {
        $currencies = DB::table("currencies")
            ->where("accountTypes_id",$request->accountType_id)
            ->pluck("currency_name","id");
            return response()->json($currencies);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'bank_id' => 'required',
            'accountType_id' => 'required',
            'currency' => 'required',
            'atmwithkcb' => 'required',
            'atmwithnonkcb' => 'required',
           'atmwithstmt'  =>  'required',
            // 'dailylimit' => 'required',
            // 'atmcardissuance' => 'required',
            'minimumwith' => 'required',
            'atmcardreplace' => 'required',
            'cardrenewal' => 'required',
            'withinkcb' => 'required',
            'outotherbanks' => 'required',
            'setupstandingorder' => 'required',
            'unpaidpenalty' => 'required',
        ]);

        $banks = Bank::all();

        $bankData = $request->bank_id;
        $accountTypeData = $request->accountType_id;
        $currencyData = $request->currency;

        $atmWithKcb = $request->atmwithkcb; // 800
        $atmWithNonKcb = $request->atmwithnonkcb; // 2500
        $atmWithStmt = $request->atmwithstmt; // 550

        $dailyLimit = $request->dailylimit; // 1000000 kutoa kiasi hiki
        $atmCardIssuance = $request->atmcardissuance; // Free

        $minimumWith = $request->minimumwith; // 5000
        $atmCardReplace = $request->atmcardreplace; // 15000
        $cardRenewal = $request->cardrenewal; // 15000
        $withInKcb = $request->withinkcb; // 2500
        $outOtherBanks = $request->outotherbanks; // 5000
        $setupStandingOrder = $request->setupstandingorder; // 6500
        $unpaidPenalty = $request->unpaidpenalty; // 10000

        $banks = Bank::with(['account_type'])
                    ->get();
        
        if (count($banks) > 0) {
            $inst_banks = [];

            foreach ($banks as $key => $item) {
                $data = $inputCalculateData = $this->inputCalculate($request->atmwithkcb, $request->atmwithnonkcb,
                $request->atmwithstmt, $request->minimumwith,
                $request->atmcardreplace,
                $request->cardrenewal,
                $request->withinkcb, 
                $request->outotherbanks, $request->setupstandingorder,
                $request->unpaidpenalty, $request->bank_id);

                $inst_products[$key] = [
                    'total_fee' => $data
                ];
            }
        }else {
            return redirect()->back()->with('message', 'No selection selected');
        }
        $sort_data = collect($data)->values()->all();

        return redirect('/calculate/bank/charges')->with('sort_data', $sort_data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    private function inputCalculate($atmwithkcb,$atmwithnonkcb, $atmwithstmt, $minimumwith,
    $atmcardreplace, $cardrenewal, $withinkcb, $outotherbanks, $setupstandingorder, $unpaidpenalty, $bank_id)
    {
        return ($atmwithkcb * 800) + ($atmwithnonkcb * 2500) + ($atmwithstmt * 550)
        + ($minimumwith * 5000) + ($atmcardreplace * 15000) + ($cardrenewal * 15000)
        + ($withinkcb * 2500) + ($outotherbanks * 5000) + ($setupstandingorder * 6500) 
        + ($unpaidpenalty * 10000);
    }
}
