<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use Auth;
use DB;

class ManageBanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = DB::table('banks')
        ->latest()
        ->get();

        return view('manageBanks.banks')
        ->with('banks', $banks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manageBanks.addbank');
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
            'bankname' => 'required|string',
        ]);

        $banks = new Bank();
        $banks->bank_name = $request->bankname;
        $st = $banks->save();
        if (!$st) {
            return redirect('/admin/manage/banks/create')->with('message', 'Failed to insert Bank');
        }
        return redirect('/admin/manage/banks/create')->with('message', 'Bank is successfully added');
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
        $bank = Bank::findOrFail($id);

        return view('manageBanks.editbank')->with('banks', $bank);
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
        $bank = Bank::findOrFail($id);
        $this->validate(request(), [
            'bankname' => 'required',
        ]);

        $bank->bank_name = $request->bankname;
        $st = $bank->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to Update Bank data');
        }

        return redirect('/admin/manage/banks')->with('message', 'Bank is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $uid = \Auth::id();
        $bank = Bank::findOrFail($id);
        $bank->delete();

        $request->session()->flash('message', 'Bank is successfully deleted');
        return back();
    }
}
