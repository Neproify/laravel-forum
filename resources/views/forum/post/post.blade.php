<div class="panel panel-default">
	<div class="panel-heading clearfix">
        Odpowiedź do: {{ $post->topic->name }}
        <div class="pull-right">
            Napisane przez <a href="{{ $post->author->getUrl() }}">{{ $post->author->name }}</a>, {{ $post->created_at }}
        </div>
    </div>
	<div class="panel-body">
		{!! $post->content !!} <br />
        @if ($post->canEdit() == true)
            <a class="btn btn-primary" href="{{ url('post/update', [$post->id]) }}">Edytuj</a>
        @endif
        @if ($post->canEdit() == true)
            <a class="btn btn-danger" href="{{ url('post/delete', [$post->id]) }}">Usuń</a>
        @endif
	</div>
</div>