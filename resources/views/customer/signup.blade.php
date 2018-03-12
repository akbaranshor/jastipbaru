@extends('layout')

@section('content')

@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif

<div class="row">
	<div class="col-xs-8 col-xs-offset-2">
		<h1>Sign Up</h1>
		<form method="POST" action="{{ route('signup') }}">
			{{ csrf_field() }}
			<div class="form-group">
			  <label for="usr">Nama:</label>
			  <input type="text" class="form-control" id="usr" name="nama" required>
			</div>
			<div class="form-group">
			  <label>Email:</label>
			  <input type="email" class="form-control" name="email" required>
			</div>
			<div class="form-group">
			  <label for="pwd">Password:</label>
			  <input type="password" class="form-control" id="pwd" name="password" required>
			</div>
			<div class="form-group">
			  <label for="pwd">Confirm Password:</label>
			  <input type="password" class="form-control" id="pwd" name="password_confirmation" required>
			</div>

			<div class="form-group">
				<label for="usr">No HP:</label>
				<div class="input-group">	
					<span class="input-group-addon">+62</span>
			  		<input type="text" class="form-control" id="usr" name="nohp" maxlength="11" required>   	
				</div>
			</div>

			<div class="form-group">
			  <label>Alamat:</label>
			  <input type="textarea" class="form-control" name="alamat" required>
			</div>
			<center>
				<button type="submit" class="btn btn-default">Daftar</button>	
			</center>			
		</form>		
	</div>
</div>



@endsection