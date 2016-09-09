@extends('layouts.app')
@section('title', 'Nowy temat')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Nowy temat w <a href="{{ $forum->getUrl() }}">{{ $forum->name }}</a></h4>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/topic/new') }}">
                        {{ csrf_field() }}

                        <input name="forum" type="hidden" value="{{ $id }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Nazwa</label>

                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <textarea id="content" type="text" style="resize: vertical;" class="form-control" name="content" value="{{ old('content') }}" autofocus></textarea>

                            @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Napisz temat
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
