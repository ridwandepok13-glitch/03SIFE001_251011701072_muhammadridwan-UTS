@extends('layouts.app')

@section('content')
<div style="max-width:800px;margin:auto;background:#f5f1eb;padding:25px;border-radius:15px;color:#292524;">

    <h1>Tambah Produk Alat Musik</h1>
    <p>Masukkan informasi produk dengan lengkap.</p>

    @if ($errors->any())
        <div style="background:#fee2e2;color:#991b1b;padding:15px;border-radius:10px;margin-bottom:20px;">
            <strong>Data belum valid:</strong>
            <p>{{ $errors->first() }}</p>
        </div>
    @endif

    <form action="{{ route('instruments.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <label for="name">Nama Produk</label>
        <input id="name" type="text" name="name"
               value="{{ old('name') }}" required
               style="display:block;box-sizing:border-box;width:100%;padding:12px;margin:8px 0 18px;">

        <label for="type">Jenis Alat Musik</label>
        <select id="type" name="type" required
                style="display:block;box-sizing:border-box;width:100%;padding:12px;margin:8px 0 18px;">
            <option value="">-- Pilih Jenis --</option>
            @foreach (['Gitar','Drum','Piano/Keyboard','Bass','Biola','Alat Musik Lainnya'] as $jenis)
                <option value="{{ $jenis }}" {{ old('type') == $jenis ? 'selected' : '' }}>
                    {{ $jenis }}
                </option>
            @endforeach
        </select>

        <label for="brand">Merek</label>
        <input id="brand" type="text" name="brand"
               value="{{ old('brand') }}" required
               style="display:block;box-sizing:border-box;width:100%;padding:12px;margin:8px 0 18px;">

        <label for="price">Harga (Rp)</label>
        <input id="price" type="number" name="price"
               value="{{ old('price') }}" min="0" step="any" required
               style="display:block;box-sizing:border-box;width:100%;padding:12px;margin:8px 0 18px;">

        <label for="image">Foto Produk (JPG, PNG, WEBP; maksimal 2 MB)</label>
        <input id="image" type="file" name="image"
               accept=".jpg,.jpeg,.png,.webp" required
               style="display:block;box-sizing:border-box;width:100%;padding:12px;margin:8px 0 18px;">

        <img id="preview" alt="Preview foto"
             style="display:none;max-width:100%;max-height:250px;margin-bottom:18px;">

        <label for="description">Deskripsi Produk</label>
        <textarea id="description" name="description" rows="5" required
                  style="display:block;box-sizing:border-box;width:100%;padding:12px;margin:8px 0 20px;">{{ old('description') }}</textarea>

        <button type="submit"
                style="background:#292524;color:white;padding:13px 22px;border:0;border-radius:8px;cursor:pointer;">
            Simpan Produk
        </button>

        <a href="{{ route('instruments.index') }}"
           style="margin-left:12px;color:#57534e;text-decoration:none;">
            Batal
        </a>
    </form>
</div>

<script>
document.getElementById('image').addEventListener('change', function () {
    const file = this.files[0];
    const preview = document.getElementById('preview');

    if (!file) {
        preview.style.display = 'none';
        preview.removeAttribute('src');
        return;
    }

    const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

    if (!allowedTypes.includes(file.type)) {
        alert('Pilih foto berformat JPG, PNG, atau WEBP.');
        this.value = '';
        preview.style.display = 'none';
        return;
    }

    if (file.size > 2 * 1024 * 1024) {
        alert('Ukuran foto maksimal 2 MB.');
        this.value = '';
        preview.style.display = 'none';
        return;
    }

    preview.src = URL.createObjectURL(file);
    preview.style.display = 'block';
});
</script>
@endsection