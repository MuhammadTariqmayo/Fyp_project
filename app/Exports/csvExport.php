<?php

namespace App\Exports;

use App\Models\user;
use Maatwebsite\Excel\Concerns\FromCollection;

class csvExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return user::all();
    }
}
