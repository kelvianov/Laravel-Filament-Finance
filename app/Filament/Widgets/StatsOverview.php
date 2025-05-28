<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Transaction;


class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $pemasukan = Transaction::incomes()->get()->sum('amount');
        $pengeluaran = Transaction:: expenses()->get()->sum('amount');
        $saldo = $pemasukan - $pengeluaran;
        return [
            Stat::make('Total Incomes', $pemasukan)
                ->description('Incomes')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Total Expense', $pengeluaran)
                ->description('Expenses')
                ->descriptionIcon('heroicon-m-arrow-trending-down'),
            Stat::make('Total Balance', $saldo)
                ->description('Balance')
                ->descriptionIcon('heroicon-m-banknotes'),
          
        ];
    }
}
