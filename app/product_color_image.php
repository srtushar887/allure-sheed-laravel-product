<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_color_image extends Model
{
    protected $fillable=['product_id','color_name','color_image'];
}
