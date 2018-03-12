<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Cart as Cart;
use Auth;
use App\Transaction;
use DB;
use Nexmo;
use App\User;

class CheckoutController extends Controller
{
    public function index()
    {
        
        if (Auth::user()->alamat == null) {
            $a = User::find(Auth::user()->id);    
            return view('customer.profile', compact('a'));
        } else {
            $cart = Cart::content();
            return view('checkout.index', compact('cart'));
        }
    }
    public function store(Request $request)
    {
		$cart = Cart::content();
        $dataSet = [];
        foreach ($cart as $c) {
            $dataSet[] = [
                'id_barang' => $c->id,
                'nama' => Auth::user()->nama,
                'nama_barang' => $c->name,
                'harga' => $c->price*$c->qty,
                'qty' => $c->qty,
                'tujuan' => $request->alamatbaru,
                
            ];
        }

        DB::table('transactions')->insert($dataSet);
        
        Nexmo::message()->send([
            'to'   => '+62'.Auth::user()->nohp,
            'from' => 'Kartikasari',
            'text' => 'Terima kasih '.Auth::user()->nama.', anda telah berhasil melakukan pemesanan. Untuk pesanan, bisa anda tunggu di '.$request->alamatbaru.''
        ]);
        Cart::destroy();
        return redirect('/');
    }
    public function store1($alamat)
    {
        $cart = Cart::content();
        $dataSet = [];
        foreach ($cart as $c) {
            $dataSet[] = [
                'id_barang' => $c->id,
                'nama' => Auth::user()->nama,
                'nama_barang' => $c->name,
                'harga' => $c->price*$c->qty,
                'qty' => $c->qty,
                'tujuan' => $alamat,
            ];
        }

        DB::table('transactions')->insert($dataSet);
        
        Nexmo::message()->send([
            'to'   => '+62'.Auth::user()->nohp,
            'from' => 'Kartikasari',
            'text' => 'Terima kasih '.Auth::user()->nama.', anda telah berhasil melakukan pemesanan. Untuk pesanan, bisa anda tunggu di '.$alamat.''
        ]);
        Cart::destroy();
        return redirect('/');
    }
    
}
