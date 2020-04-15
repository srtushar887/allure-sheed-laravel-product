<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_schedule extends Model
{
    protected $fillable =['schedule_name','regular_price','sale_price','width','length'];
}
