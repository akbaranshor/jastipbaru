<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
    	'id_barang', 'nama', 'nama_barang', 'harga', 'qty', 'tujuan', 'user_id'
    ];

    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public function store()
    {
    	return $this->belongsTo(Store::class);
    }

}
