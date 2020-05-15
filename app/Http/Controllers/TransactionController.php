<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use App\Bank;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::all();
        return view('transactions.create', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'bank_id'=>'required',
            'description' =>'required',
            'deposit' =>'required',
            'withdraw' =>'required',
        ]);

        if($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $transaction = new Transaction();
        $transaction->bank_id = $request->input('bank_id');
        $transaction->description = $request->input('description');
        $transaction->deposit = $request->input('deposit');
        $transaction->withdraw = $request->input('withdraw');
        $transaction->save();

        Session::flash('confirmation_message', 'Transaction is done!');

        return redirect('transactions/create');
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
        $transaction = Transaction::findOrFail($id);
        $banks = Bank::all();
        return view('transactions.edit', compact('transaction', 'banks'));
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
        $validator = Validator::make($request->all(), [
            'bank_id'=>'required',
            'description' =>'required',
            'deposit' =>'required',
            'withdraw' =>'required',
        ]);

        if($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $transaction =Transaction::findOrFail($id);
        $transaction->bank_id = $request->input('bank_id');
        $transaction->description = $request->input('description');
        $transaction->deposit = $request->input('deposit');
        $transaction->withdraw = $request->input('withdraw');
        $transaction->save();

        Session::flash('update_message', 'Updated done!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return Redirect::to('transactions');
    }
}
