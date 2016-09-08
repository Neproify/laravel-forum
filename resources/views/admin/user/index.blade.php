@extends('layouts.app')
@section('title', 'Zarządzanie użytkownikami')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @each('admin.user.user', $users, 'user')
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection