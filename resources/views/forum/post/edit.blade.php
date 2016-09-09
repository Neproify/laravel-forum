@extends('layouts.app')
@section('title', 'Edycja odpowiedzi')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Edycja odpowiedzi w temacie <a href="{{ $topic->getUrl() }}">{{ $topic->name }}</a></h4>
                    <form class="form" role="form" method="POST" action="{{ url('/post/update') }}">
                        {{ csrf_field() }}

                        <input name="post" type="hidden" value="{{ $id }}">

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">

                            <textarea id="content" type="text" style="resize: vertical;" class="form-control" name="content" autofocus>{{ $post->content }}</textarea>

                            @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Edytuj odpowiedź
                            </button>
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
