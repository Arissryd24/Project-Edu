@extends('layouts.app')

@section('title', 'Marketing Users')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Marketing Users</h3>

        <a href="{{ route('marketing-users.create') }}" class="btn btn-primary float-right">
            <i class="fas fa-plus"></i> Create New
        </a>
    </div>

    <div class="card-body">
        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('success') }}
            </div>
        @endif

        <!-- Notifikasi Error Validation (Penting untuk ngetes yang salah tadi) -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Ups! Ada kesalahan:</h5>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th> <th>Name</th>
            <th>Email</th>
            <th width="150">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user) 
        <tr>
            <td>{{ $user->id }}</td>
            
            <td class="text-center">
                @if($user->image)
                    <img src="{{ asset('storage/' . $user->image) }}" alt="User Photo" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                @else
                    <img src="https://via.placeholder.com/50" alt="No Photo" style="width: 50px; border-radius: 5px;">
                @endif
            </td>

            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('marketing-users.edit', $user) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                </a>

                <form action="{{ route('marketing-users.destroy', $user) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Data marketing belum tersedia.</td>
        </tr>
        @endforelse
    </tbody>
</table>

        <div class="mt-3">
            {{ $users->links() }}
        </div>
    </div>
</div>

@endsection