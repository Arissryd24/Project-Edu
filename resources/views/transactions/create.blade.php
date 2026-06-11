@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Transaction</h1>
    @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Marketing User</label>
            <select name="user_id" class="form-control">
                @foreach($users as $u)
                    <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->email }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input name="description" class="form-control" value="{{ old('description') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input name="amount" class="form-control" value="{{ old('amount') }}">
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
