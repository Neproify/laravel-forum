@extends('layouts.app')
@section('title', 'Użytkownik ' . $user->name)

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
		  	<div class="card">
				<div class="card-block">
					<h4 class="card-title">Profil użytkownika {{ $user->name }}</h4>
					Dołączył: {{ $user->created_at }} <br />
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
