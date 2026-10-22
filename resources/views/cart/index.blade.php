@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">🛒 Keranjang Belanja</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (count($cart) > 0)
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $id => $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity"
                                        value="{{ $item['quantity'] }}"
                                        min="1" max="99"
                                        class="form-control" style="width: 85px">
                                    <button class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                            <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST"
                                    onsubmit="return confirm('Hapus produk ini dari keranjang?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total Harga</th>
                        <th colspan="2">Rp {{ number_format($total, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <a href="{{ route('instruments.index') }}" class="btn btn-secondary">
            Lanjut Belanja
        </a>
        <button type="button" class="btn btn-success" onclick="alert('Fitur checkout akan dibuat pada langkah berikutnya.')">
            Checkout
        </button>
    @else
        <div class="alert alert-info">
            Keranjang masih kosong. Silakan pilih alat musik terlebih dahulu.
        </div>
        <a href="{{ route('instruments.index') }}" class="btn btn-primary">
            Lihat Produk
        </a>
    @endif
</div>
@endsection