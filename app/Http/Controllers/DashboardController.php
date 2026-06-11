<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalUsers = User::count();
        $marketingUsers = User::where('is_marketing', true)->count();
        $totalTransactions = Transaction::count();
        $totalRevenue = Transaction::sum('amount');

        return view('dashboard', compact('totalUsers', 'marketingUsers', 'totalTransactions', 'totalRevenue'));
    }
}
