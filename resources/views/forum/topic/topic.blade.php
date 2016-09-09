<div class="card">
	<div class="card-block">
		<h4 class="card-title"><a href="{{ $topic->getUrl() }}">{{ $topic->name }}</a></h4>
		<div class="col-md-8">
		{!! substr($topic->content, 0, 128) !!}
		</div>
		<div class="col-md-2">
			<a href="{{ $topic->author->getUrl() }}">{{ $topic->author->name }}</a><br />
			{{ $topic->created_at }}
		</div>
		<div class="col-md-2">
			@if ($topic->getNewestPost())
				Ostatnia odpowiedź: <br />
				{{ $topic->getNewestPost()->created_at }} <br />
				<a href="{{ $topic->getNewestPost()->author->getUrl() }}">{{ $topic->getNewestPost()->author->name }}</a>
			@else
				Brak odpowiedzi.
			@endif
		</div>
	</div>
</div>