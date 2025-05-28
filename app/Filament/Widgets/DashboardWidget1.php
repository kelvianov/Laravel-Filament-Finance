<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\ChartWidget;

class DashboardWidget1 extends ChartWidget
{
    protected static ?string $heading = 'Expenses Chart';

    protected function getData(): array
    {
      
        $expenses = Transaction::selectRaw('MONTH(date) as month, SUM(amount) as total')
            ->whereHas('category', fn($query) => $query->where('is_expense', true))
            ->groupByRaw('MONTH(date)')
            ->orderByRaw('MONTH(date)')
            ->pluck('total', 'month');

   
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[] = $expenses[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Expenses',
                    'data' => $data,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)', 
                    'borderColor' => 'rgba(255, 99, 132, 1)',        
                    'borderWidth' => 2,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar'; 
    }
}
