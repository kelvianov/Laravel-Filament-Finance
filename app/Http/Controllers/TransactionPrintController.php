<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class TransactionPrintController extends Controller
{
    public function show(Transaction $record)
    {
        // contoh menampilkan satu data transaksi
        return view('print.transaction', compact('record'));
    }

    public function index()
    {
        // contoh menampilkan semua data transaksi
        $transactions = Transaction::all();
        return view('print.transaction-print-all', compact('transactions'));
    }
}
