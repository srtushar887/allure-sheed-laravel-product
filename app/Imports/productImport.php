<?php

namespace App\Imports;

use App\category;
use App\product;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class productImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use Importable;

    public function model(array $row)
    {
        return new product([
            'schedule_name'        => $row['schedule_name'],
            'product_name'         => $row['product_name'],
            'product_image'        => $row['product_image'],
            'long_description'     => $row['long_description'],
            'short_description'    => $row['short_description'],
            'category'             => $row['category'],
            'tags'                 => $row['tags'],
        ]);



    }
}
