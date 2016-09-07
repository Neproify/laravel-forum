<div class="panel panel-default">
	<div class="panel-heading">
		<a href="{{ $forum->getUrl() }}">{{ $forum->name }}</a>
	</div>
	<div class="panel-body">
		{{ $forum->description }}
		<div class="pull-right">
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