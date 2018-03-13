<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'description', 'src', 'store_id'
    ];

    public function store()
    {
    	return $this->belongsTo(Store::class);
    }
}
