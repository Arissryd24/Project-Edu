<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Exports\TransactionsExport;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    public function index(): View
    {
        $transactions = Transaction::with('user')->latest()->paginate(20);
        return view('transactions.index', compact('transactions'));
    }

    public function create(): View
    {
        // choose marketing users as possible owners
        $users = User::where('is_marketing', true)->get();
        return view('transactions.create', compact('users'));
    }

    public function store(TransactionRequest $request): RedirectResponse
    {
        Transaction::create($request->validated());
        return redirect()->route('transactions.index')->with('success', 'Transaction created.');
    }

    public function show(Transaction $transaction): View
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction): View
    {
        $users = User::where('is_marketing', true)->get();
        return view('transactions.edit', compact('transaction', 'users'));
    }

    public function update(TransactionRequest $request, Transaction $transaction): RedirectResponse
    {
        $transaction->update($request->validated());
        return redirect()->route('transactions.index')->with('success', 'Transaction updated.');
    }

    public function destroy(Transaction $transaction): RedirectResponse
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted.');
    }

    public function export()
    {
    return Excel::download(new TransactionsExport, 'transactions.xlsx');
    }
}
