@extends('layout')

@section('content')
	@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
  <h1>Checkout</h1>
  <hr>
	<table class="table table-hover">
    <thead>
      <tr>
        <th>Nama Barang</th>
        <th><center>Jumlah</center></th>
        <th><center>Harga</center></th>
      </tr>
    </thead>
    <tbody>
   	@foreach ($cart as $c)
   		<tr>
        	<td width="900px">{{ $c->name }}</td>
        	<td><center>{{ $c->qty }}</center></td>
          <td><center>Rp. {{ $c->price*$c->qty }}</center></td>
        </tr>
   	@endforeach
      
    </tbody>
    <tfoot>
    <tr>
      <td style="font-weight: bold;">Total</td>
      <td><center>{{ Cart::count() }}</center></td>
      <td><center>Rp. {{ Cart::total() }}</center></td>
    </tr>
  </tfoot>
  </table>

<div class="panel panel-default">
  <div class="panel-heading">Alamat Tujuan Baru</div>
  <div class="panel-body">
    <form method="POST" action="{{ route('checkout.store') }}">
  {{ csrf_field() }}

  
  <div class="form-group">
    <label>Alamat : </label>
    <input type="text" class="form-control" name="alamatbaru">
  </div>
  
  <button type="submit" class="btn btn-default pull-left"><i class="fa fa-money" aria-hidden="true"></i> Bayar</button>
  <p class="text-muted pull-right">*Jika anda ingin alamat tujuan baru. Isi alamat dan tekan tombol bayar di dalam panel ini!<br>*Jangan tekan tombol bayar di bawah panel ini! Jika anda ingin alamat baru</p>
</form>
  </div>

</div>



    <a href="{{ url('cart/list') }}" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
    <a href="{{ route('checkout.store1', ['alamat' => Auth::user()->alamat ]) }}" class="btn btn-success pull-right"><i class="fa fa-money" aria-hidden="true"></i> Bayar</a>
    
@endsection