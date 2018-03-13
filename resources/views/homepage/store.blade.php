@extends('layout')

@section('content')
	
	<h1 align="center">Tempat Makan</h1>
	
<div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>

	@foreach ($stores->chunk(3) as $chunk)
    		<div class="row" style="padding-top: 16px">
        		@foreach ($chunk as $store)
            		<div class="col-sm-4">
						<div class="panel panel-default">
			  				<div class="panel-body">
			  					<center>
			  						<img src="{{ asset($store->src) }}" class="img-responsive" style="max-height: 150px; max-width: 150px">	
			  						<h3>{{ $store->nama }}</h3>
			  							<form method="get" action="{{ route('cart.goto', ['id' => $store->id]) }}">
											<div class="row">
												<center>
													<h5>{{ $store->alamat }}</h5>
			  											<button type="submit" name="submit" class="btn btn-default">Pilih Tempat</button>		
												</center>
			  								</div>
										</form>	
			  					</center>
			  				</div>
						</div>	
					</div>
            	@endforeach
    		</div>
	@endforeach
@endsection