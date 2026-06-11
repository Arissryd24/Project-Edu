@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Marketing User: {{ $user->name }}</h1>

    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Created:</strong> {{ $user->created_at }}</p>

    <a href="{{ route('marketing-users.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
