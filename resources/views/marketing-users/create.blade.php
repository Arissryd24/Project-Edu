@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Marketing User</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('marketing-users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Foto Profile</label>
            <input type="file" name="image" class="form-control">
            <small class="text-muted">Gunakan format jpeg, png, jpg. Maksimal 2MB.</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Dokumen (Opsional)</label>
            <input type="file" name="document" class="form-control">
        </div>

        <button class="btn btn-primary">Save</button>
        <a href="{{ route('marketing-users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
    // Jika ada error dari Laravel, hapus paksa backdrop yang bikin layar gelap
    @if ($errors->any())
        $(document).ready(function(){
            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
            $('body').css('padding-right', '0');
        });
    @endif
</script>
@endsection