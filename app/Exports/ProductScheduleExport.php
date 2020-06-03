<?php

namespace App\Exports;

use App\product_schedule;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductScheduleExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    public function collection()
    {
        return DB::table('product_schedules')->select('id','schedule_name','category_name','regular_price','sale_price','width','length')->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'Schedule Name',
            'Category Name',
            'Regular Price',
            'Sale Price',
            'Width',
            'Length',
        ];
    }
}
