@extends('layout')
@section('content')
	@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

	@foreach ($products->chunk(3) as $chunk)
    		<div class="row" style="padding-top: 30px">
        		@foreach ($chunk as $product)
            		<div class="col-sm-4">
						<div class="panel panel-default">
			  				<div class="panel-body">
			  					<center>
			  						<img src="{{ asset($product->src) }}" class="img-responsive" style="max-height: 150px; max-width: 150px">	
			  						<h3>{{ $product->name }}</h3>
			  							<form method="get" action="{{ route('cart.create', ['id' => $product->id]) }}">
											<div class="row">
			  									<div class="col-sm-4 col-sm-offset-2">
			  										<input type="number" name="qty" class="form-control" min="1" placeholder="Qty" required="">	
			  									</div>
			  									<div class="col-sm-4">
			  										<button type="submit" name="submit" value="Add to Cart" class="btn btn-default"><i class="fa fa-cart-plus" aria-hidden="true"></i> Tambah</button>		
			  									</div>
			  								</div>

			  								<h4 style="padding-top: 15px; color: green">Rp. {{ $product->price }}</h4>
			  								<br>
			  								<p style="margin-right: 20px; margin-left: 20px">{{ $product->description }}</p>
										</form>	
			  					</center>
			  				</div>
						</div>	
					</div>
            	@endforeach
    		</div>
	@endforeach
	</div>
@endsection
