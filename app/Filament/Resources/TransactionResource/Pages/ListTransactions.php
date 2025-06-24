<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\CreateAction;
use Filament\Actions\Action;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

  
    public function printOptions(int $id)
    {
        $this->dispatchBrowserEvent('showPrintOptions', ['id' => $id]);
    }

    protected function getTableActions(): array
    {
        return [
      
        ];
    }

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
      
            Action::make('printAll')
                ->label('Print All')
                ->icon('heroicon-o-printer')
                ->url(route('transactions.print.all')) 
                ->openUrlInNewTab(), 
        ];
    }
}
