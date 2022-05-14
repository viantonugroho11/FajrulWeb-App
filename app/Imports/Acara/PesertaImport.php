<?php

namespace App\Imports\Acara;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PesertaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }
}
