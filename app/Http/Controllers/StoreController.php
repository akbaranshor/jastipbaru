<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Store;
use App\Product;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();
    	return view('homepage.store', compact('stores'));
    }

    public function goToProducts($id)
    {
    	$products = Store::find($id)->product;

    	return view('homepage.index', compact('products'));
    }
}
