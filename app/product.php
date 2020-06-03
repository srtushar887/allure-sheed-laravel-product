<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = ['schedule_name','product_name', 'product_image', 'long_description','short_description','category','tags'];

    public function product_shcedule()
    {
        return $this->hasMany(product_schedule::class,'schedule_name','schedule_name');
    }

}
