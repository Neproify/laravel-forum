@extends('layouts.app')
@section('title', $topic->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (Auth::check())
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ url('post/new', [$topic->id]) }}" role="button">Odpowiedz</a>
                </div>
                <div class="clearfix"></div>
            @endif
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">
                        {{ $topic->name }}
                        <div class="pull-right">
                            Napisane przez <a href="{{ $topic->author->getUrl() }}">{{ $topic->author->name }}</a>, {{ $topic->created_at }}
                        </div>
                    </h4>
                    {!! $topic->content !!}<br />
                    @if ($topic->canEdit() == true)
                        <a class="btn btn-primary" href="{{ url('topic/update', [$topic->id]) }}">Edytuj</a>
                    @endif
                    @if ($topic->canEdit() == true)
                        <a class="btn btn-danger" href="{{ url('topic/delete', [$topic->id]) }}">Usuń</a>
                    @endif
                </div>
            </div>
            @each('forum.post.post', $posts, 'post')
            @if($posts->count() > 0)
                {{ $posts->links() }}
            @endif
        </div>
    </div>
</div>
@endsection
