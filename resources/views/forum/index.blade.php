@extends('layouts.app')
@section('title', 'Strona główna')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @each('forum.forum', $forums, 'forum')
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Aktywni użytkownicy</h4>
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
