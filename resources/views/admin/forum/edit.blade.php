@extends('layouts.app')
@section('title', 'Edycja forum')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Edycja forum <a href="$forum->getUrl()">{{ $forum->name }}</a></h4>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/forum/update') }}">
                        {{ csrf_field() }}

                        <input name="forum" type="hidden" value="{{ $forum->id }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Nazwa</label>

                            <input id="name" type="text" class="form-control" name="name" value="{{ $forum->name }}" autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                            <label for="content" class="control-label">Opis</label>

                            <input id="description" type="text" style="resize: vertical;" class="form-control" name="description" value="{{ $forum->description }}" autofocus>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Edytuj forum
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
