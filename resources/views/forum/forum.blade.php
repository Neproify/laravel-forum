<div class="card">
	<div class="card-block">
		<div class="col-md-8">
		<h4 class="card-title"><a href="{{ $forum->getUrl() }}">{{ $forum->name }}</a></h4>
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