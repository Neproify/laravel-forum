<div class="card">
	<div class="card-block">
		<a href="{{ $forum->getUrl() }}">{{ $forum->name }}</a>
        <div class="pull-right">
            <a href="{{ url('/admin/forum/update', [$forum->id]) }}" style="color: black;"><i class="fa fa-edit fa-2x" aria-hidden="true"></i></a>
            <a href="{{ url('/admin/forum/delete', [$forum->id]) }}" style="color: red;"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
        </div>
	</div>
</div>