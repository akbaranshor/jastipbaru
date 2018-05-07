<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Veritrans\Midtrans;
use DB;
use \Cart as Cart;
use Illuminate\Support\Facades\Input;
use Nexmo;
use Session;

class SnapController extends Controller
{
    private $alamat;

    public function __construct()
    {   
        Midtrans::$serverKey = 'VT-server-YxFSwEl1J6aagkze2yBeCNmG';
        //set is production to true for production mode
        Midtrans::$isProduction = false;
        $this->alamat = "";
    }

    public function snap()
    {
        return view('snap_checkout');
    }

    public function token() 
    {
       error_log('masuk ke snap token dri ajax');
        /*
        if (Request::input('alamatbaru') == "") {
            $alamat = Request::input('alamatbaru');    
        } else $alamat = Auth::user()->alamat;
        */
        
        //$alamat = Input::get('alamat', Auth::user()->alamat);
        //$alamat = Input::get('alamat', 'Anjing');
        $alamat = $this->getter();
        $midtrans = new Midtrans;
        $transaction_details = array(
            'order_id'      => uniqid(),
            'gross_amount'  => Cart::total()
        );
        // Populate items
        $cart = Cart::content();
        $items = [];
        foreach ($cart as $c) {
            $items[] = [
                'id' => 'item'.$c->id,
                'price' => $c->price,
                'quantity' => $c->qty,
                'name' => $c->name
            ];
        }

        //$this->sms($alamat);
                  

        // Populate customer's billing address
        $billing_address = array(
            'first_name'    => Auth::user()->nama,
            'last_name'     => "",
            'address'       => $alamat,
            'city'          => "",
            'postal_code'   => "",
            'phone'         => '+62'.Auth::user()->nohp,
            'country_code'  => 'IDN'
            );
        // Populate customer's shipping address
        $shipping_address = array(
            'first_name'    => Auth::user()->nama,
            'last_name'     => "",
            'address'       => $alamat,
            'city'          => "",
            'postal_code'   => "",
            'phone'         => '+62'.Auth::user()->nohp,
            'country_code'  => 'IDN'
            );
        // Populate customer's Info
        $customer_details = array(
            'first_name'      => Auth::user()->nama,
            'last_name'       => "",
            'email'           => Auth::user()->email,
            'phone'           => '+62'.Auth::user()->nohp,
            'billing_address' => $billing_address,
            'shipping_address'=> $shipping_address
            );
        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;
        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit'       => 'hour', 
            'duration'   => 2
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $items,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

    
        try
        {
            $snap_token = $midtrans->getSnapToken($transaction_data);
            //$this->sms($alamat);
            //return redirect('/');
            echo $snap_token;
        } 
        catch (Exception $e) 
        {   
            return $e->getMessage;
        }
    }

    public function sms($alamat)
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
                'user_id' => Auth::user()->id,
            ];
        }

        DB::table('transactions')->insert($dataSet);



        /*
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
                'user_id' => Auth::user()->id,
            ];
        }

        DB::table('transactions')->insert($dataSet);
        */

        
        Nexmo::message()->send([
            'to'   => '+62'.Auth::user()->nohp,
            'from' => 'Kartikasari',
            'text' => 'Terima kasih '.Auth::user()->nama.', anda telah berhasil melakukan pemesanan. Untuk pesanan, bisa anda tunggu di '.$alamat.''
        ]);

        
        Cart::destroy();
        //Session::flash('alert-success', 'Anda berhasil melakukan transaksi');
    }

    public function finish(Request $request)
    {
        /*if ($request->input('alamatbaru') != null ) {
            $this->alamat = $request->input('alamatbaru');    
        } else $this->alamat = Auth::user()->alamat;
        */

        $alamat = $request->input('alamat', Auth::user()->alamat);
        $result = $request->input('result_data');
        $this->setter($alamat);
        $result = json_decode($result);
        
        echo $result->status_message . '<br>';
        echo 'RESULT <br><pre>';
        var_dump($result);
        echo '</pre>' ;
        $this->sms($alamat);
        Session::flash('alert-success', 'Anda berhasil melakukan transaksi');
        return redirect('/');
        
    }

    public function setter($alamat)
    {
        return $this->$alamat = $alamat;
    }

    public function getter()
    {
        return $this->alamat;
    }



    public function notification()
    {
        $midtrans = new Midtrans;
        echo 'test notification handler';
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);

        if($result){
        $notif = $midtrans->status($result->order_id);
        }

        error_log(print_r($result,TRUE));

        /*
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
          // For credit card transaction, we need to check whether transaction is challenge by FDS or not
          if ($type == 'credit_card'){
            if($fraud == 'challenge'){
              // TODO set payment status in merchant's database to 'Challenge by FDS'
              // TODO merchant should decide whether this transaction is authorized or not in MAP
              echo "Transaction order_id: " . $order_id ." is challenged by FDS";
              } 
              else {
              // TODO set payment status in merchant's database to 'Success'
              echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
              }
            }
          }
        else if ($transaction == 'settlement'){
          // TODO set payment status in merchant's database to 'Settlement'
          echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
          } 
          else if($transaction == 'pending'){
          // TODO set payment status in merchant's database to 'Pending'
          echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
          } 
          else if ($transaction == 'deny') {
          // TODO set payment status in merchant's database to 'Denied'
          echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        }*/
   
    }
}    