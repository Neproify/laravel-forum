@extends('layouts.app')
@section('title', $forum->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (Auth::check())
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('topic/new', [$forum->id]) }}" role="button">Nowy temat</a>
            </div>
            <div class="clearfix"></div>
            @endif
            @if ($topics->count() == 0)
                <div class="card">
                    <div class="card-block">
                        @if (Auth::check())
                            To forum nie posiada jeszcze żadnego tematu. <a href="{{ url('topic/new', [$forum->id]) }}">Może stworzysz pierwszy?</a>
                        @else
                            To forum nie posiada jeszcze żadnego tematu. <a href="{{ url('topic/new', [$forum->id]) }}">Zaloguj się aby stworzyć pierwszy.</a>
                        @endif
                    </div>
                </div>
            @else
                @each('forum.topic.topic', $topics, 'topic')
            @endif
            @if ($topics->count() > 0)
                {{ $topics->links() }}
            @endif
        </div>
    </div>
</div>
@endsection
