<?php

namespace App\Imports;

use App\product_schedule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductScheduleImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use Importable;

    public function model(array $row)
    {
        return new product_schedule([
            'schedule_name'        => $row['schedule_name'],
            'category_name'        => $row['category_name'],
            'regular_price'        => $row['regular_price'],
            'sale_price'        => $row['sale_price'],
            'width'        => $row['width'],
            'length'        => $row['length'],
        ]);
    }
}
