<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Cart as Cart;
use App\Product;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
        return view('cart.index', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $product = Product::find($id);

        $cart = Cart::add($id, $product->name, $request->qty, $product->price);
        
        Session::flash('alert-success', 'Anda telah menambahkan '.$request->qty.' '.$product->name);
        return redirect()->route('cart.list');
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
                 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        Cart::update($rowId, $request->qty);
        $item = Cart::get($rowId);
        Session::flash('alert-success', 'Anda telah memperbarui pesanan');
        return redirect()->route('cart.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($rowId)
    {
        $item = Cart::get($rowId);
        Session::flash('alert-danger', 'Anda telah menghapus '. $item->name.' dari pesanan');
        Cart::remove($rowId);
        
        return redirect()->route('cart.list');
    }

    public function empty()
    {
        Cart::destroy();
        return redirect()->route('cart.list');
    }
}
