<?php

namespace App\Imports;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TestImport implements ToCollection, WithHeadingRow
{
    private $rows = [];
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        // foreach($rows as $key => $row){
            // $rows[$key]['id'] = (int)$row['id'];
            // $rows[$key]['date'] = Carbon::createFromFormat('d/m/Y', $row['date'])->format('d-m-Y');
            // $rows[$key]['first_in_time'] = Carbon::createFromFormat('H:i', $row['first_in_time'])->format('H:i');
            // $rows[$key]['last_out_time'] = Carbon::createFromFormat('H:i', $row['last_out_time'])->format('H:i');
        // }

        $this->rows = $rows;

        return;
    }

    public function getRows()
    {
        return $this->rows;
    }
}
