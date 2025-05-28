<?php
namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class DashboardWidget extends ChartWidget
{
protected static ?string $heading = 'Incomes Chart'; 

    protected function getData(): array
    {
        $incomes = \App\Models\Transaction::selectRaw("MONTH(date) as month, SUM(amount) as total")
            ->whereHas('category', fn($q) => $q->where('is_expense', false)) 
            ->groupByRaw("MONTH(date)")
            ->orderByRaw("MONTH(date)")
            ->pluck('total', 'month'); 

       
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[] = $incomes[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Incomes',
                    'data' => $data,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)', 
                    'borderColor' => 'rgba(75, 192, 192, 1)',       
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