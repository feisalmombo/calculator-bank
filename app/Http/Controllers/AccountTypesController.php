<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\AccountTypes;
use App\Bank;

class AccountTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountTypes = DB::table('account_types')
        ->join('banks','account_types.bank_id','=','banks.id')

        ->select(
        'account_types.id',
        'account_types.accountType_name',
        'banks.bank_name',
        'account_types.created_at',
        )
        ->latest()
        ->get();

        return view('manageAccountType.accountType')
        ->with('accountTypes', $accountTypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = DB::table('banks')
        ->select('id', 'bank_name')
        ->get();

        return view('manageAccountType.addAccountType')
        ->with('banks', $banks);
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
            'accountType' => 'required|string',
            'bank_id' => 'required',
        ]);

        $bankId  = DB::table('banks')->select('id')->where('bank_name', '=', $request->bank_id)->value('id');

        $accountTypes = new AccountTypes();
        $accountTypes->accountType_name = $request->accountType;
        $accountTypes->bank_id = $bankId;
        $st = $accountTypes->save();
        if (!$st) {
            return redirect('/admin/manage/account/types/create')->with('message', 'Failed to insert Account Type');
        }
        return redirect('/admin/manage/account/types/create')->with('message', 'Account Type is successfully added');
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
    public function edit(Request $request, $id)
    {
        $accountType = AccountTypes::findOrFail($id);

        $banks = DB::table('banks')
        ->select('banks.id', 'banks.bank_name')
        ->get();

        return view('manageAccountType.editAccountType')
        ->with('accountTypes', $accountType)
        ->with('banks', $banks);
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
        $accountType = AccountTypes::findOrFail($id);
        $this->validate(request(), [
            'accountType' => 'required',
            'bankID' => 'required',
        ]);

        $accounTypeData  = DB::table('account_types')->select('id', 'accountType_name')->where('id', '=', $request->bankID)->value('id');

        $accountType->accountType_name = $request->accountType;
        $accountType->bank_id = $accounTypeData;
        $st = $accountType->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to Update Account Type data');
        }

        return redirect('/admin/manage/account/types')->with('message', 'Account Type is successfully updated');
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
        $accountType = AccountTypes::findOrFail($id);
        $accountType->delete();

        $request->session()->flash('message', 'Account Type is successfully deleted');
        return back();
    }
}
