<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name',
    	'sku',
    	'type_id',
    	'visible',
    	'status',
    ];
}
