@extends('layouts.app')
@section('title', 'Nowy temat')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nowa odpowiedź do tematu <a href="{{ $topic->getUrl() }}">{{ $topic->name }}</a>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/post/new') }}">
                        {{ csrf_field() }}

                        <input name="topic" type="hidden" value="{{ $id }}">

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <textarea id="content" type="text" style="resize: vertical;" class="form-control" name="content" value="{{ old('content') }}" autofocus></textarea>

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
                                    Wyślij odpowiedź
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
