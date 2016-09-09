@extends('layouts.app')
@section('title', 'Panel administratora')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title"><i class="fa fa-users fa-2x" aria-hidden="true"></i> Użytkownicy</h4>
                    Zarejestrowani użytkownicy: <b>{{ $users }}</b>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title"><i class="fa fa-comment fa-2x" aria-hidden="true"></i> Tematy</h4>
                    Napisane tematy: <b>{{ $topics }}</b>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title"><i class="fa fa-comments fa-2x" aria-hidden="true"></i> Odpowiedzi</h4>
                    Napisane odpowiedzi: <b>{{ $posts }}</b>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
