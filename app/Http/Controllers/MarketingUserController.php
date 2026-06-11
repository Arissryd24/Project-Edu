<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketingUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MarketingUserController extends Controller
{
    /**
     * Display a listing of marketing users.
     */
    public function index(): View
    {
        $users = User::where('is_marketing', true)->latest()->paginate(15);
        return view('marketing-users.index', compact('users'));
    }

    /**
     * Show the form for creating a new marketing user.
     */
    public function create(): View
    {
        return view('marketing-users.create');
    }

    /**
     * Store a newly created marketing user in storage.
     */
    public function store(MarketingUserRequest $request): RedirectResponse
    {
        // Validasi otomatis dilakukan oleh MarketingUserRequest
        $data = $request->validated();
        
        $data['is_marketing'] = true;

        $data['is_marketing'] = true;

    // 2. LOGIKA UPLOAD FOTO (Tambahkan di sini)
    if ($request->hasFile('image')) {
        // Simpan file ke folder storage/app/public/marketing
        $path = $request->file('image')->store('marketing', 'public');
        
        // Masukkan path file ke array data untuk disimpan ke database
        $data['image'] = $path;
    }
        
        // Hash password jika ada di dalam Request, jika tidak ada tambahkan default
        if (!isset($data['password'])) {
            $data['password'] = bcrypt('password123'); 
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        User::create($data);

        return redirect()->route('marketing-users.index')
                         ->with('success', 'Data Marketing Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $marketing_user): View
    {
        return view('marketing-users.show', ['user' => $marketing_user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $marketing_user): View
    {
        return view('marketing-users.edit', ['user' => $marketing_user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MarketingUserRequest $request, User $marketing_user): RedirectResponse
    {
        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        $data['is_marketing'] = true;
        $marketing_user->update($data);

        return redirect()->route('marketing-users.index')->with('success', 'Marketing user updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $marketing_user): RedirectResponse
    {
        $marketing_user->delete();

        return redirect()->route('marketing-users.index')->with('success', 'Marketing user deleted successfully.');
    }
} // Penutup Class