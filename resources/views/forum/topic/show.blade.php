@extends('layouts.app')
@section('title', $topic->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (Auth::check())
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ url('post/new', [$topic->id]) }}" role="button">Odpowiedz</a>
                </div>
                <div class="clearfix"></div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    {{ $topic->name }}
                    <div class="pull-right">
                        Napisane przez <a href="{{ $topic->author->getUrl() }}">{{ $topic->author->name }}</a>, {{ $topic->created_at }}
                    </div>
                </div>
                <div class="panel-body">
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
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
