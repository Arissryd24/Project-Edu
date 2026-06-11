@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Transaction #{{ $transaction->id }}</h1>
    <p><strong>User:</strong> {{ $transaction->user->name ?? '—' }}</p>
    <p><strong>Description:</strong> {{ $transaction->description }}</p>
    <p><strong>Amount:</strong> {{ $transaction->amount }}</p>
    <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
