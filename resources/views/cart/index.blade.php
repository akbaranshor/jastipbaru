@extends('layout')

@section('content')



<h1><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</h1>

<div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>
<div class="panel-group">
	@foreach ($cart as $c)
		<div class="panel panel-default">
			<div class="panel-body">
				<label style="padding-left: 15px">{{ $c->name }}</label>
				<form method="GET" action="{{ route('cart.update', ['rowId' => $c->rowId ]) }}">
					<div class="col-xs-1">
						<input type="number" name="qty" class="form-control" value="{{ $c->qty }}" min="1">
					</div>
					<button class="btn btn-success" type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
					<a href="{{ route('cart.remove', ['rowId' => $c->rowId ]) }}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
				</form>
			</div>
		</div>
	@endforeach
</div>
@if (Cart::count() > 0)
	<a href="{{ route('cart.empty') }}" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus Cart</a>
	<div class="pull-right">
		<a href="{{ route('checkout.index') }}" class="btn btn-primary"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Checkout</a>
	</div>
@else
	<h1>Keranjang Kosong</h1>
@endif

@endsection