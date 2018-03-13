<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = 
    [
    	'nama', 'alamat', 'src'
    ];

    protected function product()
    {
    	return $this->hasMany(Product::class);
    }   
}
