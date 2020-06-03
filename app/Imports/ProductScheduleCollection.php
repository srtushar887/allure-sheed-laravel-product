<?php

namespace App\Imports;

use App\product_schedule;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductScheduleCollection implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    use Importable;
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if (!isset($row['id'])) {
                return null;
            }

            product_schedule::updateOrCreate([
                'id' => $row['id'],
            ], [
                'schedule_name' => $row['schedule_name'],
                'category_name' => $row['category_name'],
                'regular_price' => $row['regular_price'],
                'sale_price' => $row['sale_price'],
                'width' => $row['width'],
                'length' => $row['length'],
            ]);
        }
    }
}
