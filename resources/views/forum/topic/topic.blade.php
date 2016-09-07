<div class="panel panel-default clearfix">
	<div class="panel-heading">
		<a href="{{ $topic->getUrl() }}">{{ $topic->name }}</a>
	</div>
	<div class="panel-body">
		{!! substr($topic->content, 0, 64) !!}
		<div class="pull-right">
			@if ($topic->getNewestPost())
				Ostatnia odpowiedź: <br />
				{{ $topic->getNewestPost()->created_at }} <br />
				przez: <br />
				<a href="{{ $topic->getNewestPost()->author->getUrl() }}">{{ $topic->getNewestPost()->author->name }}</a>
			@else
				Brak odpowiedzi.
			@endif
		</div>
	</div>
</div>