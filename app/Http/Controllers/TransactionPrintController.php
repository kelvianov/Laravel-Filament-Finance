<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class TransactionPrintController extends Controller
{
    public function show(Transaction $record)
    {
       
        return view('print.transaction', compact('record'));
    }

    public function index()
    {
       
        $transactions = Transaction::all();
        return view('print.transaction-print-all', compact('transactions'));
    }
}
