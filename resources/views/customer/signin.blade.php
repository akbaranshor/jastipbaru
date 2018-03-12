@extends('layout')

@section('content')

@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif

<div class="row">
	<div class="col-xs-4 col-xs-offset-4">
		<form method="POST" action="{{ route('signin') }}">
		<h1>Sign In</h1>
		{{ csrf_field() }}
		<div class="form-group">
		  <label>Email:</label>
		  <input type="email" class="form-control" name="email" required>
		</div>
		<div class="form-group">
		  <label for="pwd">Password:</label>
		  <input type="password" class="form-control" id="pwd" name="password" required>
		</div>
		<button type="submit" class="btn btn-default pull-left">Masuk</button>
		<a href="{{ url('login/facebook') }}" class="btn btn-primary pull-right"><i class="fa fa-facebook" aria-hidden="true"></i> Masuk menggunakan Facebook</a>
		</form>
	</div>
</div>



@endsection