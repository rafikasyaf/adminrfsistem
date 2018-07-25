<?php

namespace App\Exports;
use App\Transaction;

use Maatwebsite\Excel\Concerns\FromCollection;

class DataExport implements FromCollection
{
    public function collection()
    {
        return Transaction::all();
    }
}