<?php

namespace App\Exports;

use App\product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class productExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function collection()
    {
        return DB::table('products')->select('id','schedule_name','product_name','product_image','long_description','short_description','category','tags')->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'Schedule Name',
            'Product Name',
            'Product Image',
            'Long Description',
            'Short Description',
            'Category',
            'Tags',
        ];
    }
}
