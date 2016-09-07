@extends('layouts.app')
@section('title', 'Edycja odpowiedzi')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edycja odpowiedzi w temacie <a href="{{ $topic->getUrl() }}">{{ $topic->name }}</a>
                </div>
                <div class="panel-body">
                    <form class="form" role="form" method="POST" action="{{ url('/post/update') }}">
                        {{ csrf_field() }}

                        <input name="post" type="hidden" value="{{ $id }}">

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <textarea id="content" type="text" style="resize: vertical;" class="form-control" name="content" autofocus>{{ $post->content }}</textarea>

                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edytuj odpowiedź
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        CKEDITOR.replace('content');
    };
</script>
@endsection
