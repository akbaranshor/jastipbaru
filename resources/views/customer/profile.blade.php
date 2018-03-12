@extends('layout')

@section('content')

<div class="row">
	<div class="col-xs-8 col-xs-offset-2">
		<h1>Tambahan Informasi</h1>
		<hr>
		<form method="POST" action="{{ route('profile') }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="usr">No HP:</label>
				<div class="input-group">	
					<span class="input-group-addon">+62</span>
			  		<input type="text" class="form-control" id="usr" name="nohp" value="{{ $a->nohp }}" placeholder="Masukkan No HP" maxlength="11" required>   	
				</div>
			</div>
			<div class="form-group">
			  <label>Alamat:</label>
			  <input type="textarea" class="form-control" name="alamat" value="{{ $a->alamat }}" placeholder="Masukkan alamat" required>
			</div>
			<center>
				<button type="submit" class="btn btn-default">Perbarui Info</button>	
			</center>			
		</form>		
	</div>
</div>

@endsection