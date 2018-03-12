<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
    	'id_barang', 'nama', 'nama_barang', 'harga', 'qty', 'tujuan', 'id_customer'
    ];

    


}
