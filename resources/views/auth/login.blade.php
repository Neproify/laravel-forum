@extends('layouts.app')
@section('title', 'Logowanie')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4 offset-md-4">
			<div class="card">
				<div class="card-block">
					<h4 class="card-title">Zaloguj się</h4>
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="control-label">Adres E-Mail</label>

							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="control-label">Hasło</label>

							<input id="password" type="password" class="form-control" name="password">
							@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="remember"> Zapamiętaj mnie
								</label>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary">
								Zaloguj
							</button>

							<a class="btn btn-link" href="{{ url('/password/reset') }}">
								Zapomniałeś hasła?
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection