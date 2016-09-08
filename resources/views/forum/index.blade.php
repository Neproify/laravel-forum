@extends('layouts.app')
@section('title', 'Strona główna')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @each('forum.forum', $forums, 'forum')
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Aktywni użytkownicy
                </div>
                <div class="panel-body">
                    @if(!$activeUsers->isEmpty())
                        @foreach($activeUsers as $user)
                            <a href="{{ $user->getUrl() }}">{{ $user->name . " " }}</a>
                        @endforeach
                    @else
                        Brak
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
