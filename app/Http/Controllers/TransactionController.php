<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //  $current_date = Carbon::now()->toDateTimeString();
       $person = Person::findOrFail($id);
    //    return $current_date;
       return view('pages.person-transaction',[
           'title' => 'transaction',
           'person' => $person
       ]);
    }

    public function create_expense()
    {
        //  $current_date = Carbon::now()->toDateTimeString(); 

       return view('pages.transaction-expense',[
           'title' => 'transaction',
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_expense(Request $request)
    {
        $data=$request->all();
        $data['date_transaction'] = Carbon::now()->toDateTimeString();
        return $data;
        // Transaction::create($data);

        // return redirect()->route('history');
    }

    public function store(Request $request)
    {
        $data=$request->all();
        $data['date_transaction'] = Carbon::now()->toDateTimeString();
       
        Transaction::create($data);

        return redirect()->route('person');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
