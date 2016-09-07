@extends('layouts.app')
@section('title', 'Użytkownik ' . $user->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">Profil użytkownika {{ $user->name }}</div>
            <div class="panel-body">
                Dołączył: {{ $user->created_at }} <br />
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
