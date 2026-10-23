@extends('layouts.app')

@section('title', $instrument->name)

@section('content')
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('instruments.index') }}">Beranda</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            {{ $instrument->name }}
        </li>
    </ol>
</nav>

<div class="card border-0 shadow-sm overflow-hidden rounded-4">
    <div class="row g-0">
        <div class="col-lg-6 bg-white d-flex align-items-center justify-content-center p-4 p-lg-5">

            @if ($instrument->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($instrument->image))
                <img
                    src="{{ asset('storage/' . $instrument->image) }}"
                    alt="{{ $instrument->name }}"
                    class="img-fluid"
                    style="width:100%; max-height:420px; object-fit:contain;">
            @else
                <div class="text-center text-secondary">
                    <p>Gambar produk belum tersedia.</p>
                </div>
            @endif

        </div>

        <div class="col-lg-6">
            <div class="card-body p-4 p-lg-5">
                <span class="badge text-bg-warning mb-3">
                    {{ $instrument->type }}
                </span>

                <p class="text-secondary mb-2">
                    {{ $instrument->brand }}
                </p>

                <h1 class="display-6 fw-bold mb-3">
                    {{ $instrument->name }}
                </h1>

                <div class="price fs-3 mb-4">
                    Rp {{ number_format($instrument->price, 0, ',', '.') }}
                </div>

                <h2 class="h6 fw-bold">Deskripsi Produk</h2>

                <p class="text-secondary lh-lg">
                    {{ $instrument->description }}
                </p>

                <hr class="my-4">

                <a href="{{ route('instruments.index') }}"
                   class="btn btn-dark px-4">
                    ← Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection