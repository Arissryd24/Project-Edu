@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Transaction</h1>
    <form action="{{ route('transactions.update', $transaction) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Marketing User</label>
            <select name="user_id" class="form-control">
                @foreach($users as $u)
                    <option value="{{ $u->id }}" @if($transaction->user_id == $u->id) selected @endif>{{ $u->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input name="description" class="form-control" value="{{ old('description', $transaction->description) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input name="amount" class="form-control" value="{{ old('amount', $transaction->amount) }}">
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
