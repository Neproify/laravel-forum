@extends('layouts.app')
@section('title', 'Panel administratora')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-users fa-2x" aria-hidden="true"></i> Użytkownicy
                </div>
                <div class="panel-body">
                    Zarejestrowani użytkownicy: <b>{{ $users }}</b>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-comment fa-2x" aria-hidden="true"></i> Tematy
                </div>
                <div class="panel-body">
                    Napisane tematy: <b>{{ $topics }}</b>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-comments fa-2x" aria-hidden="true"></i> Odpowiedzi
                </div>
                <div class="panel-body">
                    Napisane odpowiedzi: <b>{{ $posts }}</b>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
