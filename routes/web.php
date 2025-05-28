<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionPrintController;
use App\Http\Controllers\TransactionController;


Route::get('/', function () {
return redirect('/admin');
});

// Route print letakkan di luar route '/'
Route::get('/admin/transactions/{record}/print', [TransactionPrintController::class, 'show'])->name('transactions.print');
Route::get('/admin/transactions/print', [TransactionPrintController::class, 'index'])->name('transactions.print.all');
use App\Filament\Pages\Auth\LoginCustom;



