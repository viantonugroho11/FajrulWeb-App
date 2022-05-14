<?php

namespace App\Exports\Acara;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TemplatePesertaImport implements WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    //headings
    public function headings():array
    {
        return[
            'NAMA',
            'EMAIL',
            'EVENT_ID',
        ];
    }
}
