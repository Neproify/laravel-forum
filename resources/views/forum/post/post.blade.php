<div class="card">
	<div class="card-block">
        <h4 class="card-title">
            Odpowiedź do: {{ $post->topic->name }}
            <div class="pull-right">
                Napisane przez <a href="{{ $post->author->getUrl() }}">{{ $post->author->name }}</a>, {{ $post->created_at }}
            </div>
        </h4>
		{!! $post->content !!} <br />
        @if ($post->canEdit() == true)
            <a class="btn btn-primary" href="{{ url('post/update', [$post->id]) }}">Edytuj</a>
        @endif
        @if ($post->canEdit() == true)
            <a class="btn btn-danger" href="{{ url('post/delete', [$post->id]) }}">Usuń</a>
        @endif
	</div>
</div>