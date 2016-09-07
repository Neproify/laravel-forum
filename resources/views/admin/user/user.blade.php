<div class="panel panel-default">
	<div class="panel-body">
		<a href="{{ $user->getUrl() }}">{{ $user->name }}</a>
        <!--<div class="pull-right">
            <a href="{{ url('/admin/user/update', [$user->id]) }}" style="color: black;"><i class="fa fa-edit fa-2x" aria-hidden="true"></i></a>
        </div>-->
	</div>
</div>