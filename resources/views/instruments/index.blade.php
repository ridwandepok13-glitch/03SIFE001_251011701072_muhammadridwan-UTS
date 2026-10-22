 @extends('layouts.app')

@section('content')
<div style="background:#f5f1eb;padding:25px;border-radius:18px;color:#292524;">

    {{-- HEADER --}}
    <nav style="background:#242424;color:white;padding:18px 5%;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px;border-radius:12px;">
        <strong style="font-size:24px;">🎵 Toko Alat Musik</strong>

        <div style="display:flex;gap:10px;flex-wrap:wrap;">
            <a href="{{ route('cart.index') }}"
               style="background:#16a34a;color:white;text-decoration:none;padding:12px 20px;border-radius:9px;font-weight:bold;">
                🛒 Keranjang
            </a>

            <a href="{{ route('instruments.create') }}"
               style="background:#8b7355;color:white;text-decoration:none;padding:12px 20px;border-radius:9px;font-weight:bold;">
                + Tambah Produk
            </a>
        </div>
    </nav>

    {{-- LOBBY --}}
    <section style="max-width:1250px;margin:30px auto;">
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:25px;align-items:center;background:#e9e3da;padding:30px;border-radius:18px;">
            <div>
                <p style="color:#8b7355;font-weight:bold;letter-spacing:3px;">SELAMAT DATANG DI</p>

                <h1 style="font-family:Georgia,serif;font-size:clamp(40px,5vw,65px);line-height:1.1;margin:15px 0;">
                    TOKO ALAT<br>MUSIK
                </h1>

                <p style="font-size:17px;line-height:1.8;color:#57534e;">
                    Temukan alat musik favoritmu, mulai dari gitar, drum, keyboard, hingga berbagai alat musik lainnya.
                </p>

                <a href="#produk"
                   style="display:inline-block;background:#292524;color:white;padding:14px 24px;border-radius:9px;text-decoration:none;">
                    Lihat Koleksi →
                </a>
            </div>

            <div>
                <img
                    src="https://images.unsplash.com/photo-1511379938547-c1f69419868d?auto=format&fit=crop&w=1000&q=85"
                    alt="Studio alat musik"
                    onerror="this.onerror=null;this.src='https://placehold.co/800x450/e9e3da/57534e?text=Toko+Alat+Musik';"
                    style="width:100%;height:320px;object-fit:cover;border-radius:14px;">
            </div>
        </div>
    </section>

    {{-- DAFTAR PRODUK --}}
    <section id="produk" style="max-width:1250px;margin:35px auto;">
        <p style="color:#8b7355;font-weight:bold;letter-spacing:3px;">KOLEKSI KAMI</p>
        <h2 style="font-family:Georgia,serif;font-size:34px;margin-bottom:25px;">Daftar Produk</h2>

        {{-- PESAN SUKSES --}}
        @if (session('success'))
            <div style="background:#dcfce7;color:#166534;padding:15px;border-radius:10px;margin-bottom:20px;">
                {{ session('success') }}
            </div>
        @endif

        {{-- PESAN ERROR --}}
        @if ($errors->any())
            <div style="background:#fee2e2;color:#991b1b;padding:15px;border-radius:10px;margin-bottom:20px;">
                @foreach ($errors->all() as $error)
                    <p style="margin:0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(230px,1fr));gap:24px;">

            @forelse ($instruments as $instrument)

                <div style="background:white;padding:18px;border-radius:16px;box-shadow:0 5px 20px #00000010;display:flex;flex-direction:column;">

                    {{-- FOTO PRODUK --}}
                    <div style="height:210px;background:#f5f5f4;border-radius:12px;display:flex;align-items:center;justify-content:center;overflow:hidden;">
                        @if ($instrument->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($instrument->image))
                            <img
                                src="{{ asset('storage/' . $instrument->image) }}"
                                alt="{{ $instrument->name }}"
                                style="width:100%;height:100%;object-fit:contain;">
                        @else
                            <img
                                src="https://placehold.co/400x250/e7e5e4/57534e?text=Alat+Musik"
                                alt="Foto belum tersedia"
                                style="width:100%;height:100%;object-fit:contain;">
                        @endif
                    </div>

                    {{-- INFORMASI PRODUK --}}
                    <div style="padding-top:16px;flex:1;">
                        <p style="font-size:13px;color:#8b7355;margin-bottom:8px;">
                            {{ $instrument->type }} · {{ $instrument->brand }}
                        </p>

                        <h3 style="font-size:22px;margin-bottom:10px;overflow-wrap:anywhere;">
                            {{ $instrument->name }}
                        </h3>

                        <p style="color:#78716c;line-height:1.7;min-height:45px;">
                            {{ \Illuminate\Support\Str::limit($instrument->description, 90) }}
                        </p>

                        <h3 style="font-size:24px;color:#8b5e3c;margin:15px 0;">
                            Rp {{ number_format($instrument->price, 0, ',', '.') }}
                        </h3>
                    </div>

                    {{-- TOMBOL KERANJANG --}}
                    <form action="{{ route('cart.add', $instrument->id) }}"
                          method="POST"
                          style="margin:0 0 10px;">
                        @csrf

                        <button type="submit"
                                style="width:100%;background:#16a34a;color:white;padding:12px;border:0;border-radius:10px;font-weight:bold;cursor:pointer;">
                            🛒 Tambah ke Keranjang
                        </button>
                    </form>

                    {{-- TOMBOL DETAIL, EDIT, HAPUS --}}
                    <div style="display:flex;flex-direction:column;gap:10px;margin-top:5px;">

                        <a href="{{ route('instruments.show', $instrument) }}"
                           style="display:block;text-align:center;background:#292524;color:white;padding:12px;border-radius:10px;text-decoration:none;font-weight:bold;">
                            👁 Lihat Detail
                        </a>

                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">

                            <a href="{{ route('instruments.edit', $instrument) }}"
                               style="display:block;text-align:center;background:#fef3c7;color:#92400e;padding:11px 5px;border:1px solid #fde68a;border-radius:10px;text-decoration:none;font-weight:bold;">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('instruments.destroy', $instrument) }}"
                                  method="POST"
                                  style="margin:0;"
                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        style="width:100%;background:#fee2e2;color:#b91c1c;padding:11px 5px;border:1px solid #fecaca;border-radius:10px;font-weight:bold;cursor:pointer;">
                                    🗑 Hapus
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

            @empty
                <div style="grid-column:1/-1;background:white;padding:40px;text-align:center;border-radius:15px;">
                    <div style="font-size:55px;">🎸</div>
                    <h3>Belum Ada Produk</h3>
                    <p style="color:#78716c;">Tambahkan produk alat musik pertama kamu.</p>

                    <a href="{{ route('instruments.create') }}"
                       style="display:inline-block;background:#292524;color:white;padding:12px 20px;border-radius:9px;text-decoration:none;">
                        + Tambah Produk
                    </a>
                </div>
            @endforelse

        </div>
    </section>

    {{-- FOOTER --}}
    <footer style="background:#242424;color:#d6d3d1;text-align:center;padding:25px;border-radius:12px;">
        © {{ date('Y') }} Toko Alat Musik · Temukan Irama Favoritmu 🎶
    </footer>

</div>
@endsection