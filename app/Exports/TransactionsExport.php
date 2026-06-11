<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Transaction::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'User ID',
            'Description',
            'Amount',
            'Created At',
            'Updated At',
        ];
    }
}