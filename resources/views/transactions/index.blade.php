@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Transactions</h1>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Create Transaction</a>
    <table class="table">
        <thead>
            <tr><th>ID</th><th>User</th><th>Description</th><th>Amount</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach($transactions as $t)
            <tr>
                <td>{{ $t->id }}</td>
                <td>{{ $t->user->name ?? '—' }}</td>
                <td>{{ $t->description }}</td>
                <td>{{ $t->amount }}</td>
                <td>
                    <a href="{{ route('transactions.edit', $t) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('transactions.destroy', $t) }}" method="POST" style="display:inline-block">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $transactions->links() }}
</div>
@endsection
