@extends('layouts.app')

@section('title', 'Edit Alat Musik')

@section('content')
<div class="container py-4">
    <h1 class="fw-bold mb-4">Edit Produk Alat Musik</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('instruments.update', $instrument) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $instrument->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Alat Musik</label>
                    <input type="text" name="type" class="form-control"
                           value="{{ old('type', $instrument->type) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Merek</label>
                    <input type="text" name="brand" class="form-control"
                           value="{{ old('brand', $instrument->brand) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" name="price" class="form-control"
                           value="{{ old('price', $instrument->price) }}"
                           min="0" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama File Gambar</label>
                    <input type="text" name="image" class="form-control"
                           value="{{ old('image', $instrument->image) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control"
                              rows="4" required>{{ old('description', $instrument->description) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('instruments.index') }}"
                   class="btn btn-secondary">
                    Batal
                </a>
            </form>
        </div>
    </div>
</div>
@endsection