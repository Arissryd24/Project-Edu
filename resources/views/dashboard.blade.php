@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- Statistics Cards -->
<div class="row">
    <!-- Total Users Card -->
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="small-box bg-info stat-card">
            <div class="inner">
                <h3>{{ $totalUsers }}</h3>
                <p>Total Users</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('marketing-users.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Marketing Users Card -->
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="small-box bg-success stat-card">
            <div class="inner">
                <h3>{{ $marketingUsers }}</h3>
                <p>Marketing Users</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-tie"></i>
            </div>
            <a href="{{ route('marketing-users.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Total Transactions Card -->
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="small-box bg-warning stat-card">
            <div class="inner">
                <h3>{{ $totalTransactions }}</h3>
                <p>Total Transactions</p>
            </div>
            <div class="icon">
                <i class="fas fa-exchange-alt"></i>
            </div>
            <a href="{{ route('transactions.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Total Revenue Card -->
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="small-box bg-danger stat-card">
            <div class="inner">
                <h3>Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</h3>
                <p>Total Revenue</p>
            </div>
            <div class="icon">
                <i class="fas fa-money-bill"></i>
            </div>
            <a href="{{ route('transactions.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Actions</h3>
            </div>
            <div class="card-body">
                <div class="btn-group" role="group">
                    <a href="{{ route('marketing-users.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> New Marketing User
                    </a>
                    <a href="{{ route('transactions.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> New Transaction
                    </a>
                    <a href="{{ route('marketing-users.index') }}" class="btn btn-info">
                        <i class="fas fa-list"></i> View All Users
                    </a>
                    <a href="{{ route('transactions.index') }}" class="btn btn-warning">
                        <i class="fas fa-list"></i> View All Transactions
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection