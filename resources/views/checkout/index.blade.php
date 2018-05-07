@extends('layout')

@section('scripts')
  <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="<VT-client-F5JPur0hBJN44vJX>"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
@endsection

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
       <p>Apakah anda ingin tujuan alamat baru?</p>
                                  <!-- route('checkout.store') -->
          <form id="payment-form" method="POST" action="{{ route('snapfinish') }}">
           <input type="hidden" name="_token" value="{!! csrf_token() !!}">
           <input type="hidden" name="result_type" id="result-type" value="">
           <input type="hidden" name="result_data" id="result-data" value="">
            <div class="form-group">
              <label class="radio-inline">
              <input type="radio" name="optradio" id="ya"onclick="document.getElementById('alamat').disabled = false;" checked>Ya
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" id="tidak" onclick="document.getElementById('alamat').disabled = true;">Tidak
            </label> 
            </div>

          <div class="form-group">
            <label>Alamat : </label>
            <input type="text" class="form-control" name="alamat" id="alamat">
          </div>
          <button id="pay-button" type="submit" class="btn btn-success pull-left"><i class="fa fa-money" aria-hidden="true"></i> Bayar</button>
          </form>
        </div>
      </div>
    

  <!--<a href="{{ url('cart/list') }}" class="btn btn-danger pull-left"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
    <a href="{{ route('checkout.store1', ['alamat' => Auth::user()->alamat ]) }}" class="btn btn-success pull-right"><i class="fa fa-money" aria-hidden="true"></i> Bayar</a> 

    <div class="form-group">
       <form id="payment-form" method="POST" action="{{ route('snapfinish') }}">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <input type="hidden" name="result_type" id="result-type" value=""></div>
      <input type="hidden" name="result_data" id="result-data" value=""></div>
      <button id="pay-button" type="submit" class="btn btn-success pull-right"><i class="fa fa-money" aria-hidden="true"></i> Bayar</button>
    </form>   
    </div>-->
     
  
    <script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");
    
    $.ajax({
      
      url: './snaptoken',
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

  </script>
@endsection