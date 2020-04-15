<?php

namespace App\Imports;

use App\product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductCollection implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    use Importable;

    public function collection(Collection $collection)
    {
//        return product::all();


        foreach ($collection as $row) {
            if (!isset($row['id'])) {
                return null;
            }

            product::updateOrCreate([
                'id' => $row['id'],
            ], [
                'schedule_name' => $row['schedule_name'],
                'product_name' => $row['product_name'],
                'product_image' => $row['product_image'],
                'long_description' => $row['long_description'],
                'short_description' => $row['short_description'],
                'category' => $row['category'],
                'tags' => $row['tags'],
            ]);
        }
    }
}
