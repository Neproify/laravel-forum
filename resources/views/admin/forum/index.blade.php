@extends('layouts.app')
@section('title', 'Zarządzanie forum')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('admin/forum/create') }}" role="button">Stwórz nowe forum</a>
            </div>
            <div class="clearfix"></div>
            @each('admin.forum.forum', $forums, 'forum')
        </div>
    </div>
</div>
@endsection
