@extends('layouts.app')
@section('title', 'Edycja tematu')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Edycja tematu <a href="$topic->getUrl()">{{ $topic->name }}</a></h4>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/topic/update') }}">
                        {{ csrf_field() }}

                        <input name="topic" type="hidden" value="{{ $id }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Nazwa</label>

                            <input id="name" type="text" class="form-control" name="name" value="{{ $topic->name }}" autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">

                            <textarea id="content" type="text" style="resize: vertical;" class="form-control" name="content" autofocus>{{ $topic->content }}</textarea>

                            @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Napisz temat
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
