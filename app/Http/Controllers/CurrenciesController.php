<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Currency;

class CurrenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = DB::table('currencies')
        ->join('account_types','currencies.accountTypes_id','=','account_types.id')

        ->select(
        'currencies.id',
        'currencies.currency_name',
        'account_types.accountType_name',
        'currencies.created_at',
        )
        ->latest()
        ->get();

        return view('manageCurrency.currency')
        ->with('currencies', $currencies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accountTypes = DB::table('account_types')
        ->join('banks','account_types.bank_id','=','banks.id')

        ->select(
        'account_types.id',
        'account_types.accountType_name',
        'banks.bank_name',
        'account_types.created_at',
        )
        ->get();

        return view('manageCurrency.addCurrency')
        ->with('accountTypes', $accountTypes);
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
            'currencyName' => 'required',
            'accountType' => 'required',
        ]);

        $accountTypeId  = DB::table('account_types')->select('id')->where('accountType_name', '=', $request->accountType)->value('id');

        $currencies = new Currency();
        $currencies->currency_name = $request->currencyName;
        $currencies->accountTypes_id = $accountTypeId;
        $st = $currencies->save();
        if (!$st) {
            return redirect('/admin/manage/currency/create')->with('message', 'Failed to insert Currency');
        }
        return redirect('/admin/manage/currency/create')->with('message', 'Currency is successfully added');
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
        $uid = \Auth::id();
        $currency = Currency::findOrFail($id);
        $currency->delete();

        $request->session()->flash('message', 'Currency is successfully deleted');
        return back();
    }
}
