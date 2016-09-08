<div class="panel panel-default">
	<div class="panel-heading">
		<a href="{{ $forum->getUrl() }}">{{ $forum->name }}</a>
	</div>
	<div class="panel-body">
		<div class="col-md-8">
		{{ $forum->description }}
		</div>
		<div class="col-md-4">
			@if ($forum->getNewestTopic())
				Ostatni temat: <br />
				<a href="{{ $forum->getNewestTopic()->getUrl() }}">{{ $forum->getNewestTopic()->name }}</a><br />
				<!--stworzony przez:-->
				<a href="{{ $forum->getNewestTopic()->author->getUrl() }}">{{ $forum->getNewestTopic()->author->name }}</a>
			@else
				Brak tematów.
			@endif
		</div>
	</div>
</div>